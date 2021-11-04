<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberLoginPostRequest;
use App\Services\UtilityService;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * 表側の認証処理
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * LoginController constructor.
     * @param Request $request
     * @param UtilityService $utilityService
     */
    public function __construct(Request $request, UtilityService $utilityService)
    {
        parent::__construct($request, $utilityService);
        $this->middleware('guest')->except('logout');
    }


    /**
     * ログインフォーム
     * @Method GET
     * @return View
     */
    public function showLoginForm(): View
    {
        $title = 'ログイン';

        $data = [
            'title' => $title
        ];

        return view('auth.login', $data);
    }


    /**
     * ログイン処理
     * @Method POST
     * @param  MemberLoginPostRequest  $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws ValidationException
     */
    public function login(MemberLoginPostRequest $request)
    {
        $this->validateLogin($request);

        // ログイン処理
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // 試行回数を記録
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * ログアウト処理
     * @Method GET
     * @param  Request  $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }


    /**
     * Attempt to log the user into the application.
     * @param  MemberLoginPostRequest  $request
     * @return bool
     */
    private function attemptLogin(MemberLoginPostRequest $request): bool
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    /**
     * Get the needed authorization credentials from the request.
     * @param  MemberLoginPostRequest  $request
     * @return array
     */
    private function credentials(MemberLoginPostRequest $request): array
    {
        return $request->only('email', 'password');
    }


    /**
     * Send the response after the user was authenticated.
     * @param  MemberLoginPostRequest  $request
     * @return RedirectResponse
     */
    private function sendLoginResponse(MemberLoginPostRequest $request) : RedirectResponse
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->route('top');
    }


    /**
     * @param  MemberLoginPostRequest  $request
     * @throws ValidationException
     */
    private function sendFailedLoginResponse(MemberLoginPostRequest $request)
    {
        throw ValidationException::withMessages([
            'email' => 'メールアドレスかパスワードが間違っています',
        ]);
    }


    /**
     * Get the guard to be used during authentication.
     * こいつを記載しないとdefault のguard が走ってしますためguard を指定
     *
     * @return StatefulGuard
     */
    private function guard(): StatefulGuard
    {
        return Auth::guard('member');
    }
}
