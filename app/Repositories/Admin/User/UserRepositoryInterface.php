<?php

namespace App\Repositories\Admin\User;

use App\Models\User;

/**
 * @package App\Repositories\Admin\User
 */
interface UserRepositoryInterface {

    /**
     * @param array $validated
     * @return User
     */
    public function store(array $validated): User;

    /**
     * @param User $user
     * @param array $validated
     * @return User
     */
    public function update(User $user, array $validated): User;
}