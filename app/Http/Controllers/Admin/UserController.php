<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * 修改密码页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.user.edit');
    }

    /**
     * 修改密码提交
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        $users = Auth::user();

        $user = Hash::check($this->request->old_password, $users->password);

        if (!$user) {
            return redirect()->back()->with('status', [
               'code'=>'success',
               'msg'=>'原密码错误',
            ]);
        } elseif ($this->request->password != $this->request->confirm_password) {
            return redirect()->back()->with('status', [
                'code'=>'success',
                'msg'=>'新密码输入不一致',
            ]);
        }

        $users->password = bcrypt($this->request->password);

        $users->save();

        Auth::logout();

        return redirect('admin/login')->with('status', [
            'code'=>'success',
            'msg'=>'修改成功密码成功,请从新登陆',
        ]);
    }
}
