<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\HrCompany;

/**
 * Class HrCompanyControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class HrCompanyControllerTest extends TestCase
{
    /**
     * @test
     */
    public function サービス利用会社管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.hr_company.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function サービス利用会社管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.hr_company.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function サービス利用会社管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $hrCompanyId = HrCompany::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.hr_company.edit', ['hr_company' => $hrCompanyId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function サービス利用会社管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'name' => 'テスト株式会社',
            'zipcode' => 1112222,
            'address' => 'テスト東京',
            'address_other' => '',
            'tel' => 00011112222,
            'email' => 'sample@sample.com',
            'representative' => '鈴木 たにし',
        ];

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.hr_company.index'))
            ->post(route('admin.hr_company.store'), $postData);

        $res->assertRedirect(route('admin.hr_company.index'));
    }

    /**
     * @test
     */
    public function サービス利用会社管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateHrCompany = HrCompany::query()->inRandomOrder()->first();

        $postData = [
            'name' => 'テスト株式会社',
            'zipcode' => 1112222,
            'address' => 'テスト東京',
            'address_other' => '',
            'tel' => 00011112222,
            'email' => 'sample@sample.com',
            'representative' => '鈴木 たにし',
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.hr_company.index'))
            ->put(route('admin.hr_company.update', ['hr_company' => $updateHrCompany->id]), $postData);

        $res->assertRedirect(route('admin.hr_company.index'));
    }
}