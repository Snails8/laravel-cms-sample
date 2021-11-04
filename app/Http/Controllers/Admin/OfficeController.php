<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfficePostRequest;
use App\Models\Company;
use App\Models\Office;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * 事務所管理 CRUD
 * Class OfficeController
 * @package App\Http\Controllers\Admin
 */
class OfficeController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

    /**
     * OfficeController constructor.
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
        $offices = $this->utility->getSearchResultAtPagerByColumn('Office', $params, 'name',  self::SELECT_LIMIT, false);

        $title = '事務所 一覧';

        $data = [
            'offices' => $offices,
            'params'  => $params,
            'title'   => $title,
        ];

        return view('admin.offices.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  Office  $office
     * @return View
     */
    public function create(Office $office): View
    {
        $title = '事務所 新規作成';

        $data = [
            'office'   => $office,
            'title'    => $title,
        ];

        return view('admin.offices.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  Office  $office
     * @return View
     */
    public function edit(Office $office): View
    {
        $title = '事務所 編集: '. $office->name;

        $data = [
            'office'   => $office,
            'title'  => $title,
        ];

        return view('admin.offices.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param  OfficePostRequest  $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(OfficePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // 会社id 取得と保存処理 (念の為、文字列から数字にして保存)
        $company_id = implode(Company::query()->select(['id'])->first()->toArray());
        $validated['company_id'] = intval($company_id);

        DB::beginTransaction();
        try {
            $office = new Office;
            $office->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '新規作成が完了しました');

        return redirect()->route('admin.office.index');
    }

    /**
     * アップデート
     * @Method PUT
     * @param   $request
     * @param  Office  $office
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(OfficePostRequest $request, Office $office): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $office->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '更新が完了しました');

        return redirect()->route('admin.office.index');
    }

    /**
     * 削除
     * @Method DELETE
     * @param  Office  $office
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Office $office): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $office->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $office->name.'を削除しました');

        return redirect()->route('admin.office.index');
    }
}
