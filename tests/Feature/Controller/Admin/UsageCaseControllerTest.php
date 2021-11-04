<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\UsageCase;

/**
 * Class UsageCaseControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class UsageCaseControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 導入事例管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.usage_case.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 導入事例管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.usage_case.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 導入事例管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $usageCase = UsageCase::query()->inRandomOrder()->first();

        $this->actingAs($user, 'admin')
            ->get(route('admin.usage_case.edit', ['usage_case' => $usageCase->id]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 導入事例管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = $this->getPostData();

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.usage_case.index'))
            ->post(route('admin.usage_case.store'), $postData);

        $res->assertRedirect(route('admin.usage_case.index'));
    }

    /**
     * @test
     */
    public function 導入事例管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateUsageCase = UsageCase::query()->inRandomOrder()->first();

        $postData = $this->getPostData();

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.usage_case.index'))
            ->put(route('admin.usage_case.update', ['usage_case' => $updateUsageCase->id]), $postData);

        $res->assertRedirect(route('admin.usage_case.index'));
    }

    /**
     * @return array
     */
    private function getPostData(): array
    {
        $postData = [
            'title'    => 'テスト',
            'image'    => '',
            'introduction'  => 'aaaaaaaaaaaaaaaaaaaaaaaaa',
            'hr_company_id' => 1,
        ];

        return $postData;
    }
}