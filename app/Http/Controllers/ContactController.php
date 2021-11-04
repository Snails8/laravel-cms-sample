<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * お問い合わせ
 */
class ContactController extends Controller
{
    /**
     * お問い合わせフォーム 表示処理
     * @return View
     */
    public function showForm(): View
    {
        $title = 'お問い合わせ';

        $description = 'sample';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('contacts.index', $data);
    }

    /**
     * 送信処理
     * @param ContactPostRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $contact = new Contact();

            $contact->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical('データ保存中に本題が発生しました。ユーザー情報'. implode(' / ', $validated));
            abort('500', 'データ保存中に本題が発生しました。');
        }
        Mail::send(new ContactMail($validated));
        return redirect()->route('contact.thanks');
    }

    /**
     * Thanksページ
     * @return View
     */
    public function showThanks(): View
    {
        $title = 'Thanks';
        $description = 'sample Thanks';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('contacts.thanks', $data);
    }
}
