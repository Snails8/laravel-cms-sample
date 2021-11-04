<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyPostRequest;
use App\Models\Company;
use App\Services\Admin\CompanyService;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

/**
 * 自社情報管理
 * Class CompanyController
 * @package App\Http\Controllers\Admin
 */
class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     * @param UtilityService $utility
     * @param CompanyService $companyService
     */
    public function __construct(UtilityService $utility, CompanyService $companyService)
    {
        $this->utility     = $utility;
        $this->companyService = $companyService;
    }

    /**
     * 編集画面表示
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        $data = $this->companyService->edit($company);

        return view('admin.companies.edit', $data);
    }

    /**
     * 更新処理
     * @param CompanyPostRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyPostRequest $request, Company $company): RedirectResponse
    {
        $validated = $request->validated();

        return $this->companyService->update($validated, $company);
    }
}
