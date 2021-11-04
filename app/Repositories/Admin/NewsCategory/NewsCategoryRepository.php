<?php
namespace App\Repositories\Admin\NewsCategory;

use App\Models\NewsCategory;
use Illuminate\Support\Collection;

class NewsCategoryRepository implements NewsCategoryRepositoryInterface
{
    /**
     * データの作成
     * @param array $validated
     */
    public function store(array $validated = []): void
    {
        $news = new NewsCategory();
        $news->fill($validated)->save();
    }

    /**
     * データの更新
     * @param NewsCategory $news
     * @param array $validated
     */
    public function update(NewsCategory $news, array $validated = []): void
    {
        $news->fill($validated)->save();
    }

    /**
     * 削除処理
     * @param NewsCategory $newsCategory
     */
    public function destroy(NewsCategory $newsCategory): void
    {
       $newsCategory->delete();
    }
}