<?php

namespace Tests\Feature\Controller;

use App\Models\News;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お知らせ一覧ページのレスポンスは正常である()
    {
        $this->get(route('news.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お知らせ詳細ページのレスポンスは正常である()
    {
        $newsId = News::query()->inRandomOrder()->first('id');
        $this->get(route('news.show', ['newsId' => $newsId]))->assertStatus(200);
    }
}