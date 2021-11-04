<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Services\Admin\NewsService;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * お知らせ管理のCRUD
 * Class NewsController
 * @package App\Http\Controllers\Admin
 */
class NewsController extends Controller
{
    private $uploadTo = 'uploads/news';
    private $utility;
    protected $newsService;

    /**
     * NewsController constructor.
     * @param UtilityService $utility
     * @param NewsService $newsService
     */
    public function __construct(UtilityService $utility, NewsService $newsService)
    {
        $this->utility     = $utility;
        $this->newsService = $newsService;
    }

    /**
     * 一覧表示
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $data = $this->newsService->index($request);

        return view('admin.news.index', $data);
    }

    /**
     * 新規作成 画面表示
     * @param News $news
     * @return View
     */
    public function create(News $news): View
    {
        $data = $this->newsService->create($news);

        return view('admin.news.create', $data);
    }

    /**
     * 編集画面表示
     * @param News $news
     * @return View
     */
    public function edit(News $news): View
    {
        $data = $this->newsService->edit($news);

        return view('admin.news.edit', $data);
    }

    /**
     * 登録処理
     * @param NewsPostRequest $request
     * @return RedirectResponse
     */
    public function store(NewsPostRequest $request):RedirectResponse
    {
        $validated = $request->validated();

        return $this->newsService->store($validated);
    }

    /**
     * 更新処理
     * @param NewsPostRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsPostRequest $request, News $news): RedirectResponse
    {
        $validated = $request->validated();

        return $this->newsService->update($validated, $news);
    }
}
