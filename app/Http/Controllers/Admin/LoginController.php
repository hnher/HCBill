<?php

namespace App\Http\Controllers\Admin;

use App\Events\LoginTimeShipped;
use App\Events\LogsShipped;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends AdminController
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/bill';

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $user = Auth::user();

            event(new LoginTimeShipped($user, $this->request));
            event(new LogsShipped($this->request, 9, 7));
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }



    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * 退出登陆
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        event(new LogsShipped($this->request, 8, 7));

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('admin/login');
    }
}
