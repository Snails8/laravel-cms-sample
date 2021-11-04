<?php

namespace Tests\Unit\Service\Admin;

use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Enums\User as EnumUser;

class UserServiceTest extends TestCase
{
    protected $userService;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->userService = app()->make(UserService::class);
    }

    /**
     * @test
     */
    public function 一覧表示の返り値は正常である()
    {
        $request = $this->createRequest();
        $data = $this->userService->index($request);

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function 作成画面の返り値は正常である()
    {
        $user = new User();
        $data = $this->userService->create($user);

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function 編集画面の返り値は正常である()
    {
        $user = User::query()->inRandomOrder()->first();
        $data = $this->userService->edit($user);

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function 作成処理の返り値は正常である()
    {
        $postData = $this->getPostData();
        $user = $this->userService->store($postData);

        $this->assertInstanceOf(RedirectResponse::class, $user);
    }

    /**
     * @test
     */
    public function 編集処理の返り値は正常である()
    {
        $updateUser = User::query()->inRandomOrder()->first();

        $postData = $this->getPostData();

        $user = $this->userService->update($postData, $updateUser);

        $this->assertInstanceOf(RedirectResponse::class, $user);
    }

    /**
     * @test
     */
    public function 削除処理の返り値は正常である()
    {
        $user = User::query()->inRandomOrder()->first();

        $user = $this->userService->destroy($user);

        $this->assertInstanceOf(RedirectResponse::class, $user);
    }

    /**
     * @return Request
     */
    private function createRequest(): Request
    {
        $fileBag = [];

        $parameterBag = [];

        $symfonyRequest = Request::create(
            route('admin.user.index'), 'GET', $parameterBag,
            [], $fileBag, []);

        $request = Request::createFromBase($symfonyRequest);

        return $request;
    }

    /**
     * 送信テストデータ
     * @return array
     */
    private function getPostData(): array
    {
        $postData = [
            'office_id' => 1,
            'name'      => 'sample',
            'kana'      => 'sample kana',
            'email'     => 'test-test@test.com',
            'password'  => 'sample1234',
            'password_confirmation' => 'sample1234',
            'role'      => EnumUser::ROLES[1]
        ];

        return $postData;
    }
}