<?php

namespace App\Repositories\Admin\News;

use App\Models\News;

/**
 * @package App\Repositories\Admin\News
 */
interface NewsRepositoryInterface {

    /**
     * @param array $params
     * @return News
     */
    public function store(array $params): News;

    /**
     * @param News $news
     * @param array $params
     * @return News
     */
    public function update(News $news, array $params): News;
}