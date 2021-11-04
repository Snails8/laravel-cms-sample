<?php
namespace App\Repositories\Admin\User;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * @package App\Repositories\Admin\User
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * データの作成
     *
     * @param array $validated
     * @return User
     */
    public function store(array $validated): User
    {
        $user = new User();
        $user->fill($validated)->save();

        return $user;
    }

    /**
     * データの更新
     *
     * @param User $user
     * @param array $validated
     * @return User
     */
    public function update(User $user, array $validated): User
    {
        $user->fill($validated)->save();

        return $user;
    }

    /**
     * 削除処理
     *
     * @param User $user
     * @return User
     */
    public function destroy(User $user): User
    {
        $user->delete();

        return $user;
    }
}