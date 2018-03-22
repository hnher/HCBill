<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends AdminController
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function index()
    {
        return view('admin.login.index');
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('admin/login');
    }
}
