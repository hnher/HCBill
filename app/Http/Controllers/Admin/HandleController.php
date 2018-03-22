<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\HandleRequest;
use App\Model\Handle;
use Illuminate\Http\Request;

class HandleController extends AdminController
{
    public function add(Handle $handle)
    {
        return view('admin.handle.add', compact('handle'));
    }

    public function store(Handle $handle, HandleRequest $request)
    {
        if($request->id) {
            $handle = $handle->findOrFail($request->id);
        }

        $handle->handle_name = $request->handle_name;

        $handle->save();

        return redirect('admin/handle')->with('status', [
           'code'=>'success',
           'msg'=>'成功',
        ]);
    }

    public function index()
    {
        $handles = (new Handle())->paginate(10);

        return view('admin.handle/index', compact('handles'));
    }

    public function edit(Request $request, Handle $handle)
    {
        $handle = $handle->findOrFail($request->id);

        return view('admin.handle.add',compact('handle'));
    }


    public function delete($id)
    {
        $handle = Handle::where('id', $id)->first();

        if (count($handle->debit)) {
            return redirect()->back()->with('status', [
                'code'=>'success',
                'msg'=>'账单列表使用中--不可删除',
            ]);
        }

        $handle->delete();

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'删除成功',
        ]);
    }

}
