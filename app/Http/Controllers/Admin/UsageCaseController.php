<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsageCasePostRequest;
use App\Models\UsageCase;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * 導入事例 管理
 */
class UsageCaseController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

    /**
     * UsageCaseController constructor.
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
        $usageCases = $this->utility->getSearchResultAtPagerByColumn('UsageCase', $params, 'title',  self::SELECT_LIMIT, false);

        $title = '導入事例 一覧';

        $data = [
            'usageCases' => $usageCases,
            'params'     => $params,
            'title'      => $title,
        ];

        return view('admin.usage_cases.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  UsageCase  $usageCase
     * @return View
     */
    public function create(UsageCase $usageCase): View
    {
        $title = '導入事例 新規作成';

        $data = [
            'usageCase'   => $usageCase,
            'title'       => $title,
        ];

        return view('admin.usage_cases.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  UsageCase  $usageCase
     * @return View
     */
    public function edit(UsageCase $usageCase): View
    {
        $title = '導入事例 編集: '. $usageCase->title;

        $data = [
            'usageCase' => $usageCase,
            'title'     => $title,
        ];

        return view('admin.usage_cases.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param  UsageCasePostRequest  $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(UsageCasePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $usageCase = new UsageCase;
            $usageCase->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '新規作成が完了しました');

        return redirect()->route('admin.usage_case.index');
    }

    /**
     * アップデート
     * @Method PUT
     * @param  UsageCasePostRequest $request
     * @param  UsageCase  $usageCase
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(UsageCasePostRequest $request, UsageCase $usageCase): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $usageCase->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '更新が完了しました');

        return redirect()->route('admin.usage_case.index');
    }

    /**
     * 削除
     * @Method DELETE
     * @param  UsageCase  $usageCase
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(UsageCase $usageCase): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $usageCase->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $usageCase->title.'を削除しました');

        return redirect()->route('admin.usage_case.index');
    }
}
