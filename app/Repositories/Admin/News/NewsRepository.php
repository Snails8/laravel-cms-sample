<?php
namespace App\Repositories\Admin\News;

use App\Models\News;
use Illuminate\Support\Collection;

/**
 * @package App\Repositories\Admin\News
 */
class NewsRepository implements NewsRepositoryInterface
{
    /**
     * データの作成
     *
     * @param array $validated
     * @param array $exceptKey
     * @return News
     */
    public function store(array $validated = [], array $exceptKey = []): News
    {
        $news = new News();

        $news->fill(collect($validated)->except($exceptKey)->toArray());
        $news->fill($validated)->save();
        $news->newsCategories()->sync($validated['news_categories']);

        return $news;
    }

    /**
     * データの更新
     *
     * @param News $news
     * @param array $validated
     * @param array $exceptKey
     * @return News
     */
    public function update(News $news, array $validated = [], array $exceptKey = []): News
    {
        $news->fill(collect($validated)->except($exceptKey)->toArray());
        $news->fill($validated)->save();
        $news->newsCategories()->sync($validated['news_categories']);

        return $news;
    }
}