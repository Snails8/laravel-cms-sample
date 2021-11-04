<?php

namespace App\Repositories\Admin\Company;

use App\Models\Company;

/**
 * @package App\Repositories\Admin\Company
 */
interface CompanyRepositoryInterface {

    /**
     * @param Company $news
     * @param array $params
     * @return Company
     */
    public function update(Company $news, array $params): Company;
}