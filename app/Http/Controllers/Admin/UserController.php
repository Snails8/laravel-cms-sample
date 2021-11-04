<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use App\Services\Admin\UserService;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * ユーザー管理 CRUD
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    private $utility;
    private $userService;

    /**
     * @param UtilityService $utility
     * @param UserService $userService
     */
    public function __construct(UtilityService $utility, UserService $userService)
    {
        $this->utility = $utility;
        $this->userService = $userService;
    }

    /**
     * 一覧
     * @Method GET
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $data = $this->userService->index($request);

        return view('admin.users.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  User  $user
     * @return View
     */
    public function create(User $user): View
    {
        $data = $this->userService->create($user);

        return view('admin.users.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        $data = $this->userService->edit($user);

        return view('admin.users.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param  UserPostRequest  $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(UserPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return $this->userService->store($validated);
    }

    /**
     * アップデート
     * @Method PUT
     * @param  UserPostRequest $request
     * @param  User  $user
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(UserPostRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        return $this->userService->update($validated, $user);
    }

    /**
     * 削除
     * @Method DELETE
     * @param  User  $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userService->destroy($user);

        return redirect()->route('admin.user.index');
    }
}
