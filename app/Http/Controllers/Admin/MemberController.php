<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogsShipped;
use App\Http\Requests\MemberRequest;
use App\Model\Logs;
use App\Model\Users;

class MemberController extends AdminController
{
    /**
     * 注册添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Users $users)
    {
        return view('admin.member.add', ['users' => $users]);
    }

    /**
     * 注册添加方法
     * @param Users $users
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Users $users, MemberRequest $request)
    {
        if ($this->request->id) {
            $users = $users->where('id', $this->request->id)->firstOrFail();
        }

        $users->name = $this->request->name;

        $users->email = $this->request->email;

        if ($this->request->password) {
            $users->password = bcrypt($this->request->password);
        }

        $users->save();

        if ($this->request->method() == "POST") {
            event(new LogsShipped($this->request,1,  7));
        } elseif ($this->request->method() == "PUT") {
            event(new LogsShipped($this->request, 2, 7));
        }

        return redirect('admin/member')->with('status', [
            'code' => 'success',
            'msg' => '操作成功',
        ]);
    }

    /**
     * 会员列表
     * @param Users $users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Users $users)
    {
        $query = $users->query();

        if ($this->request->keyword) {
            $query->where('name', 'like', '%' . $this->request->keyword . '%');
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(100);

        return view('admin.member.index', ['users' => $users]);
    }

    /**
     * 会员编辑
     * @param Users $users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Users $users)
    {
        if ($this->request->id) {
            $users = $users->where('id', $this->request->id)->firstOrFail();
        }

        return view('admin.member.add', ['users'=>$users]);
    }

    /**
     * 删除方法
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $users = Users::where('id', $id)->firstOrFail();

        if ($users->id == 1) {
            return redirect()->back()->with('status', [
                'code' => 'error',
                'msg' => '不可删除',
            ]);
        }

        $users->delete();

        event(new LogsShipped($this->request, 3, 7));

        return redirect()->back()->with('status', [
            'code' => 'success',
            'msg' => '删除成功',
        ]);
    }

    public function show(Logs $logs, $id)
    {
        $logs = $logs->where('users_id', $id)->with('user', 'status')->orderBy('created_at', 'desc')->paginate(100);

        return view('admin.member.show', ['logs'=>$logs]);
    }
}
