<?php

namespace Tests\Feature\Controller\Admin;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\News;

/**
 * Class NewsControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class NewsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お知らせ管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.news.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせ管理作成画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.news.create'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせ管理編集画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $newsId = News::query()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.news.edit', ['news' => $newsId]))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせ管理新規登録処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // formDataの用意
        $postData = [
            'title'       => 'テスト',
            'body'        => 'あああああああああああ',
            'public_date' => Carbon::now()->format('Y-m-d'),
            'image'       => '',
            'description' => 'test description',
        ];

        $res = $this->actingAs($user, 'admin')
            // fromでリファラーを指定しないとテストの仕様上、発見できずback()でホームに飛ばされる
            ->from(route('admin.news.index'))
            ->post(route('admin.news.store'), $postData);

        $res->assertRedirect(route('admin.news.index'));
    }

    /**
     * @test
     */
    public function お知らせ管理更新処理のレスポンスは正常である()
    {
        $user = User::factory()->create();
        // putなのでデータ取得用に
        $updateNews = News::query()->inRandomOrder()->first();

        $postData = [
            'title'       => 'テスト',
            'body'        => 'あああああああああああ',
            'public_date' => Carbon::now()->format('Y-m-d'),
            'image'       => '',
            'description' => 'test description',
        ];

        $res = $this->actingAs($user, 'admin')
            ->from(route('admin.news.index'))
            ->put(route('admin.news.update', ['news' => $updateNews->id]), $postData);

        $res->assertRedirect(route('admin.news.index'));
    }
}