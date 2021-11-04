<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;

/**
 * Class CompanyControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class CompanyControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 会社管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $companyId = Company::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.company.edit', ['company' => $companyId]))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function 会社管理のアップデート処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $companyId = Company::query()->first('id');

        $postData = [
            'name'          => 'テスト',
            'zipcode1'      => 000,
            'zipcode2'      => 1111,
            'address'       => 'テスト',
            'address_other' => '',
            'tel'           => 00011112222,
            'email'         => 'sample@sample.com',
            'ceo'           => 'テスト',
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.company.edit', ['company' => $companyId ]))
            ->put(route('admin.company.update', ['company' => $companyId]), $postData);

        $res->assertRedirect(route('admin.company.edit', ['company' => $companyId]));
    }
}