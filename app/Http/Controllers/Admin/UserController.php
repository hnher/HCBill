<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogsShipped;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends AdminController
{
    /**
     * 下面是用户登陆状态下自己修改密码
     */

    /**
     * 修改密码页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();

        return view('admin.user.edit', ['user'=>$user]);
    }

    /**
     * 修改密码提交
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        $users = Auth::user();

        $users->name = $this->request->name;

        $users->email = $this->request->email;

        if ($this->request->password) {
            if ($this->request->password != $this->request->confirm_password) {
                return redirect()->back()->with('status', [
                    'code'=>'success',
                    'msg'=>'新密码输入不一致',
                ]);
            }

            $users->password = bcrypt($this->request->password);

            $users->save();

            Auth::logout();
        }

        $users->save();

        event(new LogsShipped($this->request, 2 , 7));

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'账户修改成功',
        ]);
    }
}
