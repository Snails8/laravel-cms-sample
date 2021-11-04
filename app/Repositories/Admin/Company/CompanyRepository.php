<?php

namespace App\Repositories\Admin\Company;

use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * データの更新
     *
     * @param Company $company
     * @param array $validated
     * @return Company
     */
    public function update(Company $company, array $validated = []): Company
    {
        $company->fill($validated)->save();

        return $company;
    }
}