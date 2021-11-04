<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class CompanyService
 * @package App\Services
 */
class CompanyService
{


//    /**
//     * @param array $params
//     * @param int $limit
//     * @return LengthAwarePaginator
//     */
//    public function getSearchResultAtPager(array $params, int $limit): LengthAwarePaginator
//    {
//        $query = Company::query();
//
//        if ($params['keyword']) {
//            $query->where('title', 'like', "%$params[keyword]%");
//        }
//
//        $companies = $query->orderBy('id', 'desc')
//            ->paginate($limit);
//
//        return $companies;
//    }
}