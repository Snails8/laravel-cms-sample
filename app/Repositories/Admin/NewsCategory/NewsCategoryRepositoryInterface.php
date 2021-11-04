<?php

namespace App\Repositories\Admin\NewsCategory;

use App\Models\NewsCategory;

/**
 * @package App\Repositories\Admin\NewsCategory
 */
interface NewsCategoryRepositoryInterface {

    /**
     * @param array $params
     */
    public function store(array $params): void;

    /**
     * @param NewsCategory $newsCategory
     * @param array $params
     */
    public function update(NewsCategory $newsCategory, array $params): void;

    /**
     * @param NewsCategory $newsCategory
     */
    public function destroy(newsCategory $newsCategory): void;
}