<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;

/**
 * Class UserControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function ユーザー管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.user.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function ユーザー管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.user.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function ユーザー管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $userId = User::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.user.edit', ['user' => $userId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function ユーザー管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'name' => 'テスト',
            'kana' => 'テストカナ',
            'email' => 'sample@gmail.com',
            'password' => 'password1234',
            'password_confirmation' => 'password1234',
            'role' => 'master',
            'post' => 'マネージャー',
            'office_id' => 1,
        ];

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.user.index'))
            ->post(route('admin.user.store'), $postData);

        $res->assertRedirect(route('admin.user.index'));
    }

    /**
     * @test
     */
    public function ユーザー管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateUser = User::query()->inRandomOrder()->first();

        $postData = [
            'name' => 'テスト',
            'kana' => 'テストカナ',
            'email' => 'sample@gmail.com',
            'password' => 'password1234',
            'password_confirmation' => 'password1234',
            'role' => 'master',
            'post' => 'マネージャー',
            'office_id' => 1,
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.user.index'))
            ->put(route('admin.user.update', ['user' => $updateUser->id]), $postData);

        $res->assertRedirect(route('admin.user.index'));
    }
}