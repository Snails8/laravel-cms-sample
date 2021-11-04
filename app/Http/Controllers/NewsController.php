<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * おしらせについての表示処理
 */
class NewsController extends Controller
{
    /**
     * 一覧
     * @return View
     */
    public function index(): View
    {
        $newsLists = News::query()->get();
        $title = 'お知らせ一覧| サンプル';
        $description = 'お知らせ sample';

        $data = [
            'newsLists' => $newsLists,
            'title'    => $title,
            'description' => $description,
        ];

        return view('news.index', $data);
    }

    /**
     * 詳細
     * @param int $newsId
     * @return View
     */
    public function show(int $newsId): View
    {
        $news = News::query()->find($newsId);

        if (!$news) {
            Log::warning('存在しないニュースにアクセスされました。');
            abort('404', 'ページが見つかりません。');
        }

        $title = $news->title;

        $data = [
            'news' => $news,
            'title' => $title,
        ];

        return view('news.show', $data);
    }
}
