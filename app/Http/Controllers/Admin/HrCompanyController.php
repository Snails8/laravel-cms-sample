<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\HrCompanyPostRequest;
use App\Models\HrCompany;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * サービス利用会社のCRUD
 * Class HrCompanyController
 * @package App\Http\Controllers
 */
class HrCompanyController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

    /**
     * HrCompanyController constructor.
     * @param UtilityService $utility
     */
    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * 一覧
     * @Method GET
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $hrCompanies = $this->utility->getSearchResultAtPagerByColumn('HrCompany', $params, 'name', self::SELECT_LIMIT, false);

        $title = '利用会社 一覧';

        $data = [
            'hrCompanies'  => $hrCompanies,
            'params' => $params,
            'title'  => $title,
        ];

        return view('admin.hr_companies.index', $data);
    }

    /**
     * 詳細
     * @Method GET
     * @param HrCompany $hrCompany
     * @return View
     */
    public function show(HrCompany $hrCompany): View
    {
        $hrCompany = HrCompany::query()->find($hrCompany->id);

        $title = '利用会社 一覧';

        $data = [
            'hrCompany'  => $hrCompany,
            'title'  => $title,
        ];

        return view('admin.hr_companies.show', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  HrCompany  $hrCompany
     * @return View
     */
    public function create(HrCompany $hrCompany): View
    {
        $title = '利用会社 新規作成';

        $data = [
            'hrCompany'     => $hrCompany,
            'title'    => $title,
        ];

        return view('admin.hr_companies.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  HrCompany  $hrCompany
     * @return View
     */
    public function edit(HrCompany $hrCompany): View
    {
        $title = '利用会社 編集: '. $hrCompany->name;

        $data = [
            'hrCompany'  => $hrCompany,
            'title' => $title,
        ];

        return view('admin.hr_companies.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param  HrCompanyPostRequest  $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(HrCompanyPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $hrCompany = new HrCompany;
            $hrCompany->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '新規作成が完了しました');

        return redirect()->route('admin.hr_company.index');
    }

    /**
     * アップデート
     * @Method PUT
     * @param   $request
     * @param  HrCompany  $hrCompany
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(HrCompanyPostRequest $request, HrCompany $hrCompany): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $hrCompany->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '更新が完了しました');

        return redirect()->route('admin.hr_company.index');
    }

    /**
     * 削除
     * @Method DELETE
     * @param  HrCompany  $hrCompany
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(HrCompany $hrCompany): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $hrCompany->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $hrCompany->name.'を削除しました');

        return redirect()->route('admin.hr_company.index');
    }
}
