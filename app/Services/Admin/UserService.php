<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\UserPostRequest;
use App\Models\User;
use App\Repositories\Admin\User\UserRepository;
use App\Services\UtilityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    const SELECT_LIMIT = 15;
    private $utility;
    protected $userRepository;

    /**
     * @param UtilityService $utility
     * @param UserRepository $userRepository
     */
    public function __construct(UtilityService $utility, UserRepository $userRepository)
    {
        $this->utility        = $utility;
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $users = $this->utility->getSearchResultAtPagerByColumn('User',$params, 'name',self::SELECT_LIMIT, false);

        $title = 'ユーザー 一覧';

        $data = [
            'users'  => $users,
            'params' => $params,
            'title'  => $title,
        ];

        return $data;
    }

    /**
     * @param User $user
     * @return array
     */
    public function create(User $user): array
    {
        $offices = $this->utility->getTargetColumnAssoc('Office', 'name', false, false, false);
        $offices = $this->utility->addEmptyRowToAssoc($offices,false);

        $title = 'ユーザー 新規作成';

        $data = [
            'offices'    => $offices,
            'user'     => $user,
            'title'    => $title,
        ];

        return $data;
    }

    /**
     * @param User $user
     * @return array
     */
    public function edit(User $user): array
    {
        $offices = $this->utility->getTargetColumnAssoc('Office', 'name', false, false, false);
        $offices = $this->utility->addEmptyRowToAssoc($offices,false);

        $title = 'ユーザー 編集: '. $user->name;

        $data = [
            'offices' => $offices,
            'user'    => $user,
            'title'   => $title,
        ];

        return $data;
    }

    /**
     * @param array $validated
     * @return RedirectResponse
     */
    public function store(array $validated): RedirectResponse
    {
        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $this->userRepository->store($validated);

            DB::commit();

            session()->flash('flash_message', '新規作成が完了しました');
            $res = redirect()->route('admin.user.index');

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
     * @param User $user
     * @return RedirectResponse
     */
    public function update(array $validated, User $user): RedirectResponse
    {
        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $this->userRepository->update($user, $validated);
            DB::commit();

            session()->flash('flash_message', '更新完了しました');
            $res = redirect()->route('admin.user.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }

    public function destroy(User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->userRepository->destroy($user);
            DB::commit();

            session()->flash('flash_message', $user->name.'を削除しました');
            $res = redirect()->route('admin.user.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }
}