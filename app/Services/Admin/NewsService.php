<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\NewsPostRequest;
use App\Models\News;
use App\Repositories\Admin\News\NewsRepository;
use App\Services\UtilityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsService
{
    const SELECT_LIMIT = 15;
    private $utility;
    protected $newsRepository;

    /**
     * @param UtilityService $utility
     * @param NewsRepository $newsRepository
     */
    public function __construct(UtilityService $utility, NewsRepository $newsRepository)
    {
        $this->utility        = $utility;
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $newsLists = $this->utility->getSearchResultAtPagerByColumn('News', $params, 'title', self::SELECT_LIMIT, false);

        $title = 'お知らせ 一覧';

        $data = [
            'params'    => $params,
            'newsLists' => $newsLists,
            'title'     => $title,
        ];

        return $data;
    }

    /**
     * @param News $news
     * @return array
     */
    public function create(News $news): array
    {
        // カテゴリ取得
        $newsCategories = $this->utility->getTargetColumnAssocWithSearch('NewsCategory', 'name', '','', false);

        $title = 'お知らせ 登録';

        $data = [
            'newsCategories' => $newsCategories,
            'news'  => $news,
            'title' => $title,
        ];

        return $data;
    }

    /**
     * @param News $news
     * @return array
     */
    public function edit(News $news)
    {
        // カテゴリ取得
        $newsCategories = $this->utility->getTargetColumnAssocWithSearch('NewsCategory', 'name', '','', false);

        $title = $news->title . '編集';

        $data = [
            'newsCategories' => $newsCategories,
            'title' => $title,
            'news'  => $news,
        ];

        return $data;
    }

    /**
     * @param array $validated
     * @return RedirectResponse
     */
    public function store(array $validated = []): RedirectResponse
    {
        $exceptKey = ['news_categories'];

        DB::beginTransaction();
        try {
            $this->newsRepository->store($validated, $exceptKey);

            DB::commit();

            session()->flash('flash_message', '新規作成が完了しました');
            $res = redirect()->route('admin.news.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }

    /**
     * 更新処理
     * @param array $validated
     * @param News $news
     * @return RedirectResponse
     */
    public function update(array $validated = [], News $news): RedirectResponse
    {
        $exceptKey = ['news_categories'];

        DB::beginTransaction();
        try {
            $this->newsRepository->update($news, $validated, $exceptKey);
            DB::commit();

            session()->flash('flash_message', '更新完了しました');
            $res = redirect()->route('admin.news.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }
}