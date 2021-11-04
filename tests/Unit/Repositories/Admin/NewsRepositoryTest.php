<?php

namespace Tests\Unit\Repositories\Admin;

use App\Models\News;
use App\Repositories\Admin\News\NewsRepository;
use Carbon\Carbon;
use Tests\TestCase;

class NewsRepositoryTest extends TestCase
{
    protected $newsRepository;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->newsRepository = app()->make(NewsRepository::class);
    }

    /**
     * @test
     */
    public function 新規作成の保存処理は正常である()
    {
        $postData = [
            'title'       => 'テスト',
            'body'        => 'あああああああああああ',
            'news_categories' => [1],
            'public_date' => Carbon::now()->format('Y-m-d'),
            'image'       => '',
            'description' => 'test description',
        ];

        $news = $this->newsRepository->store($postData);

        $this->assertInstanceOf(News::class, $news);
    }

//    /**
//     * @test
//     */
//    public function 更新の保存処理は正常である()
//    {
//        $postData = [
//            'title'       => 'テスト',
//            'body'        => 'あああああああああああ',
//            'news_categories' => [1],
//            'public_date' => Carbon::now()->format('Y-m-d'),
//            'image'       => '',
//            'description' => 'test description',
//        ];
//
//        // 更新データが存在しないので作成
//        $news = $this->newsRepository->store($postData);
//
//        $news = $this->newsRepository->update($postData, $news);
//
//        $this->assertTrue($news);
//    }
}