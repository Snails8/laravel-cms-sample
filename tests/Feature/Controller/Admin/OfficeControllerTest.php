<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Office;

/**
 * Class OfficeControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class OfficeControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 部署管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.office.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 部署管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.office.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 部署管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $officeId = Office::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.office.edit', ['office' => $officeId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 部署管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'name'    => 'テスト',
            'address' => 'テスト東京',
            'tel'     => 00011112222,
            'manager' => 'ホゲ',
            'post'    => '',
            'company_id' => 1,
        ];

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.office.index'))
            ->post(route('admin.office.store'), $postData);

        $res->assertRedirect(route('admin.office.index'));
    }

    /**
     * @test
     */
    public function 部署管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateOffice = Office::query()->inRandomOrder()->first();

        $postData = [
            'name'    => 'テスト',
            'address' => 'テスト東京',
            'tel'     => 00011112222,
            'manager' => 'ホゲ',
            'post'    => '',
            'company_id' => 1,
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.office.index'))
            ->put(route('admin.office.update', ['office' => $updateOffice->id]), $postData);

        $res->assertRedirect(route('admin.office.index'));
    }
}