<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Mail\RegisterMail;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * 無料お試し
 */
class RegisterController extends Controller
{
    /**
     * 無料お試し 表示処理
     * @return View
     */
    public function showForm(): View
    {
        $title = '無料お試し';

        $description = 'sample';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('registers.index', $data);
    }

    /**
     * 送信処理
     * @param RegisterPostRequest $request
     * @return RedirectResponse
     */
    public function submit(RegisterPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $customer = new Customer();

            $customer->fill($validated)->save();

            dd($validated);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical('データ保存中に本題が発生しました。ユーザー情報'. implode(' / ', $validated));
            abort('500', 'データ保存中に本題が発生しました。');
        }
        Mail::queue(new RegisterMail($validated));

        // Laravel において mailに関してのみ queue を指定するだけでjobを書かなくとも実行してくれる

        return redirect()->route('register.thanks');
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

        return view('registers.thanks', $data);
    }
}
