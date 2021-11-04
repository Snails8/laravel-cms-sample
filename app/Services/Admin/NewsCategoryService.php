<?php

namespace App\Services\Admin;

use App\Models\NewsCategory;
use App\Repositories\Admin\NewsCategory\NewsCategoryRepository;
use App\Services\UtilityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsCategoryService
{
    const SELECT_LIMIT = 15;
    private $utility;
    protected $newsCategoryRepository;

    /**
     * @param UtilityService $utility
     * @param NewsCategoryRepository $newsCategoryRepository
     */
    public function __construct(UtilityService $utility, NewsCategoryRepository $newsCategoryRepository)
    {
        $this->utility = $utility;
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $newsCategories = $this->utility->getSearchResultAtPagerByColumn('NewsCategory', $params, 'name' ,self::SELECT_LIMIT, true);

        $title = 'お知らせカテゴリ 一覧';

        $data = [
            'newsCategories' => $newsCategories,
            'params'  => $params,
            'title'   => $title,
        ];

        return $data;
    }

    /**
     * @param NewsCategory $newsCategory
     * @return array
     */
    public function create(NewsCategory $newsCategory): array
    {
        $title = 'お知らせカテゴリ 新規作成';

        $data = [
            'newsCategory' => $newsCategory,
            'title'        => $title,
        ];

        return $data;
    }

    /**
     * @param NewsCategory $newsCategory
     * @return array
     */
    public function edit(NewsCategory $newsCategory): array
    {
        $title = 'お知らせカテゴリ 編集: '. $newsCategory->name;

        $data = [
            'newsCategory' => $newsCategory,
            'title'        => $title,
        ];

        return $data;
    }

    /**
     * @param array $validated
     * @return RedirectResponse
     */
    public function store(array $validated = []): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->newsCategoryRepository->store($validated);
            DB::commit();

            session()->flash('flash_message', '新規作成が完了しました');
            $res = redirect()->route('admin.news_category.index');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }

    /**
     * 更新処理
     * @param array $validated
     * @param NewsCategory $newsCategory
     * @return RedirectResponse
     */
    public function update(array $validated, NewsCategory $newsCategory): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->newsCategoryRepository->update($newsCategory, $validated);
            DB::commit();

            session()->flash('flash_message', '更新完了しました');
            $res = redirect()->route('admin.news_category.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }

    /**
     * @param NewsCategory $newsCategory
     * @return RedirectResponse
     */
    public function destroy(NewsCategory $newsCategory): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->newsCategoryRepository->destroy($newsCategory);
            DB::commit();

            session()->flash('flash_message', $newsCategory->name.'を削除しました');
            $res = redirect()->route('admin.news_category.index');

        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            $res =  redirect()->back()->withInput();
        }

        return $res;
    }
}