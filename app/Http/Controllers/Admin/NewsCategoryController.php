<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCategoryPostRequest;
use App\Models\NewsCategory;
use App\Services\Admin\NewsCategoryService;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * News Category
 * Class NewsCategoryController
 * @package App\Http\Controllers\Admin
 */
class NewsCategoryController extends Controller
{
    private $utility;
    private $newsCategoryService;

    public function __construct(UtilityService $utility, NewsCategoryService $newsCategoryService)
    {
        $this->utility             = $utility;
        $this->newsCategoryService = $newsCategoryService;
    }

    /**
     * 一覧
     * @Method GET
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $data = $this->newsCategoryService->index($request);

        return view('admin.news_categories.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  NewsCategory  $newsCategory
     * @return View
     */
    public function create(NewsCategory $newsCategory): View
    {
        $data = $this->newsCategoryService->create($newsCategory);

        return view('admin.news_categories.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  NewsCategory  $newsCategory
     * @return View
     */
    public function edit(NewsCategory $newsCategory): View
    {
        $data = $this->newsCategoryService->edit($newsCategory);

        return view('admin.news_categories.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param NewsCategoryPostRequest $request
     * @return RedirectResponse
     */
    public function store(NewsCategoryPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return $this->newsCategoryService->store($validated);
    }

    /**
     * アップデート
     * @Method PUT
     * @param  NewsCategoryPostRequest $request
     * @param  NewsCategory  $newsCategory
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(NewsCategoryPostRequest $request, NewsCategory $newsCategory): RedirectResponse
    {
        $validated = $request->validated();

        return $this->newsCategoryService->update($validated, $newsCategory);
    }

    /**
     * 削除
     * @Method DELETE
     * @param  NewsCategory  $newsCategory
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(NewsCategory $newsCategory): RedirectResponse
    {
        return $this->newsCategoryService->destroy($newsCategory);
    }
}
