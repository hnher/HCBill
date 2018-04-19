<?php
namespace App\Http\Controllers\Admin;
use App\Events\LogsShipped;
use App\Http\Requests\HandleRequest;
use App\Model\Handle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleController extends AdminController
{
    /**
     * 经手人添加
     * @param Handle $handle
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Handle $handle)
    {
        return view('admin.handle.add', ['handle'=>$handle]);
    }

    /**
     * 经手人添加方法
     * @param Handle $handle
     * @param HandleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Handle $handle, HandleRequest $request)
    {
        if($request->id) {
            $handle = $handle->findOrFail($request->id);
        }

        $handle->handle_name = $request->handle_name;

        $handle->save();

        if ($this->request->method() == "POST") {
            event(new LogsShipped($this->request,1,  4));
        } elseif ($this->request->method() == "PUT") {
            event(new LogsShipped($this->request, 2, 4));
        }

        return redirect('admin/handle')->with('status', [
           'code'=>'success',
           'msg'=>'成功',
        ]);
    }

    /**
     * 经手人列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Handle $handle)
    {
        $query = $handle->query();

        if ($this->request->name) {
            $query->where('handle_name', 'like', '%' . $this->request->name . '%');
        }

        $handles = $query->orderBy('created_at', 'desc')->paginate(100);

        return view('admin.handle/index', ['handles'=>$handles]);
    }

    /**
     * 编辑经手人
     * @param Request $request
     * @param Handle $handle
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Handle $handle)
    {
        $handle = $handle->findOrFail($request->id);

        return view('admin.handle.add', ['handle'=>$handle]);
    }

    /**
     * 删除经手人
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $handle = Handle::where('id', $id)->firstOrFail();

        if (count($handle->bill)) {
            return redirect()->back()->with('status', [
                'code'=>'error',
                'msg'=>'账单列表使用中--不可删除',
            ]);
        }

        $handle->delete();

        event(new LogsShipped($this->request, 3,  4));

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'删除成功',
        ]);
    }

}
