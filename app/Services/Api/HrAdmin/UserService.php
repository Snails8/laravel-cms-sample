<?php

namespace App\Services\Api\HrAdmin;

use App\Models\HrUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * HrUser 取得処理
 */
class UserService
{
    public function getHrUsers(): Collection
    {
        $hrUsers = HrUser::query()->get();

        return $hrUsers;
    }

    /**
     * Create HR User
     * @param array $validated
     * @return string[]
     */
    public function store(array $validated): array
    {
        DB::beginTransaction();
        try {
            $hrUser = new HrUser();
            $hrUser->fill($validated)->save();

            $res = ['msg' => 'API側でのデータの登録が完了しました'];
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical('HRService ユーザー作成中に問題が発生しました。情報'.implode(' / ', $validated));
            abort('500', 'データ保存中に本題が発生しました。');

            $res = ['msg' => 'データ登録中に問題が発生しました'];
        }

        return $res;
    }
}