<?php
namespace App\Services;

use App\Models\Shop;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class UtilityService
 * @package app\Services
 */
class UtilityService
{
    /**
     * S3へファイルをアップロード
     * @param  int  $id
     * @param  string  $uploadTo
     * @param  Request  $request
     * @return string
     */
    public function uploadFileToS3(int $id, string $uploadTo, Request $request): string
    {
        $path = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $id . '.' . $file->getClientOriginalExtension();

            $path = Storage::disk('s3')->putFileAs($uploadTo, $file, $fileName, 'public');
        } else {
            $path = '';
        }

        return $path;
    }

    /**
     * @param string $modelName
     * @param string $column
     * @param bool $isDisplay
     * @param bool $isPublic
     * @return array
     */
    public function getTargetColumnArray(string $modelName, string $column, bool $isDisplay = false , bool $isPublic = false): array
    {
        /** @var Model $model */
        $model = 'App\Models\\' . $modelName;

        $query = $model::query()->select(['id', $column]);

        if ($isDisplay) {
            $query->where('is_display', true);
        }

        if ($isPublic) {
            $query->where('is_public', true);
        }

        return $query->get()->pluck($column)->toArray();
    }

    /**
     * 特定のModelからIdと特定のColumnの配列とsort_noで調整を返す
     * @param string $modelName
     * @param string $column
     * @param bool $isDisplay
     * @param bool $isPublic
     * @param bool $sortNo
     * @return array
     */
    public function getTargetColumnAssoc(string $modelName, string $column, bool $isDisplay = false, bool $isPublic = false, bool $sortNo = false ): array
    {
        /** @var Model $model */
        $model = 'App\Models\\' . $modelName;

        $query = $model::query()->select(['id', $column]);

        if ($isDisplay) {
            $query->where('is_display', true);
        }

        if ($isPublic) {
            $query->where('is_public', true);
        }

        if ($sortNo) {
            $query->orderBy('sort_no');
        } else {
            $query->orderBy('id', 'desc');
        }

        return $query->get()->pluck($column, 'id')->toArray();
    }

    /**
     * 管理画面 各種 select,checkbox用の値加工(連想配列 = Assoc)に使用 => 選択肢として使える状態に
     *
     * Model を呼び出し、id と $column をselect する。
     * where(searchColumn = searchValue)で検索したあと 該当したものを 連想配列として返却
     * TODO::pluck 使うときってEnumのような定数系だけな気がする
     *
     * @param string $modelName
     * @param string $column
     * @param string $searchColumn
     * @param $searchValue
     * @param bool $isPluck
     * @return array
     */
    public function getTargetColumnAssocWithSearch(string $modelName, string $column, string $searchColumn, $searchValue, bool $isPluck = false): array
    {
        /** @var Model $model */
        $model = 'App\Models\\' . $modelName;

        $query = $model::query()->select(['id', $column]);

        // データ取得に条件をかけたい場合
        if ($searchColumn && $searchValue) {
            $query->where($searchColumn, $searchValue);
        }

        // pluck だとid が固有ではなくなる。foreach だとそのまま引き継がれる
        if ($isPluck) {
            $result = $query->get()->pluck($column)->toArray();
        } else {
            $tmps = $query->get()->toArray();
            foreach ($tmps as $tmp) {
                $result[$tmp['id']] = $tmp[$column];
            }
        }

        return $result;
    }

    /**
     * PullDown用の連想配列に空の行を追加
     * @param  array  $assocArray
     * @param  bool  $isInteger
     * @return array
     */
    public function addEmptyRowToAssoc(array $assocArray, bool $isInteger = false): array
    {
        if($isInteger) {
            $result = collect($assocArray)->prepend('選択してください', 0)->toArray();
        } else {
            $result = collect($assocArray)->prepend('選択してください', '')->toArray();
        }

        return $result;
    }

    /**
     * S3のファイルを削除
     * @param  string  $path
     * @return bool
     */
    public function deleteS3File(string $path): bool
    {
        return Storage::disk('s3')->delete($path);
    }

    /**
     * HasManySave用のデータ作成
     * @param string $targetColumn
     * @param array $values
     * @return array
     */
    public function getHasManySaveData(string $targetColumn, array $values): array
    {
        $result = [];

        foreach($values as $value) {
            $result[] = [$targetColumn => $value];
        }

        return $result;
    }

    /**
     * Admin CRUD 検索画面の初期化
     * @param Request $request
     * @return string[]
     */
    public function initIndexParamsForAdmin(Request $request): array
    {
        $params = [];
        if (empty($request->query())) {
            $params = [
                'keyword' => ''
            ];
        } else {
            $params = $request->query();
        }

        return $params;
    }

    /**
     * Admin 各種index　検索で使用
     * 特定のカラムで検索をし、idまたは指定のカラムで並び替えたあとPaginatorで返却
     * 使用例) getSearchResultAtPagerByColumn('User', $params, 'name', self::SELECT_LIMIT, 'sort_no'(またはfalse))
     * @param string $modelName
     * @param array $params
     * @param string $searchColumn
     * @param int $limit
     * @param string $sortColumn
     * @return LengthAwarePaginator
     */
    public function getSearchResultAtPagerByColumn(string $modelName, array $params, string $searchColumn, int $limit, string $sortColumn): LengthAwarePaginator
    {
        /** @var Model $model */
        $model = 'App\Models\\' . $modelName;
        $query = $model::query();

        if ($params['keyword']) {
            $query->where($searchColumn, 'like', "%$params[keyword]%");
        }

        if ($sortColumn) {
            $result = $query
                ->orderBy('sort_no')
                ->orderBy('id', 'desc')
                ->paginate($limit);
        } else {
            $result = $query
                ->orderBy('id', 'desc')
                ->paginate($limit);
        }

        return $result;
    }

    /**
     * @param  Collection  $collection
     * @param  string  $column
     * @return array
     */
    public static function getTargetColumnArrayByCollection(Collection $collection, string $column): array
    {
        return $collection->pluck($column)->toArray();
    }

    /**
     * 選択された内容を文字列に連結して返す
     * @param  string  $delimiter
     * @param  array  $intArray
     * @param  array  $assocArray
     * @return string
     */
    public static function getImplodeStr(string $delimiter = ' / ', array $intArray = [], array $assocArray = []): string
    {
        $str = '';
        $strArray = [];

        if (!empty($intArray) && !empty($assocArray)) {
            foreach($intArray as $int) {
                $strArray[] = $assocArray[$int];
            }

            $str = implode($delimiter, $strArray);
        }

        return $str;
    }

    /**
     * s3URL取得
     * @param string $path
     * @return string
     */
    public static function getS3Url($path = '')
    {
        $bucketName = env('AWS_BUCKET');
        $protocol   = env('APP_SCHEME') === 'https' ? 'https' : 'http';

        $url = $protocol . '://' . $bucketName . '.s3-ap-northeast-1.amazonaws.com/' . $path;

        return $url;
    }

    /**
     * SF:本番環境かどうか判定する
     * @return mixed
     */
    public static function isProduction()
    {
        return (env('APP_ENV') === 'production');
    }
}

