<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\NewsCategory;

/**
 * Class NewsCategoryControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class NewsCategoryControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お知らせカテゴリ管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_category.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_category.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $news_categoryId = NewsCategory::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.news_category.edit', ['news_category' => $news_categoryId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'name'    => 'テスト',
            'sort_no' => 1,
        ];

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.news_category.index'))
            ->post(route('admin.news_category.store'), $postData);

        $res->assertRedirect(route('admin.news_category.index'));
    }

    /**
     * @test
     */
    public function お知らせカテゴリ管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateNewsCategory = NewsCategory::query()->inRandomOrder()->first();

        $postData = [
            'name'    => 'テスト',
            'sort_no' => 1
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.news_category.index'))
            ->put(route('admin.news_category.update', ['news_category' => $updateNewsCategory->id]), $postData);

        $res->assertRedirect(route('admin.news_category.index'));
    }
}