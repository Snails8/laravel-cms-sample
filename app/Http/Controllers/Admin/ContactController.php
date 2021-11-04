<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

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
        $contacts = $this->utility->getSearchResultAtPagerByColumn('Contact', $params, 'company' ,self::SELECT_LIMIT, false);

        $title = 'お問い合わせ 一覧';

        $data = [
            'contacts' => $contacts,
            'params'   => $params,
            'title'    => $title,
        ];

        return view('admin.contacts.index', $data);
    }

    /**
     * 詳細画面
     * @param Contact $contact
     * @return View
     */
    public function show(Contact $contact): View
    {
        $title = 'お問い合わせ確認:'. $contact->company . ' '. $contact->name . '様';
        $data = [
            'title'   => $title,
            'contact' => $contact,
        ];

        return view('admin.contacts.show', $data);
    }

    /**
     * 削除
     * @Method DELETE
     * @param  Contact  $contact
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $contact->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $contact->name.'を削除しました');

        return redirect()->route('admin.contact.index');
    }
}
