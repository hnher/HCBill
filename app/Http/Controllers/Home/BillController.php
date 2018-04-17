<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\BillRequest;
use App\Model\Debit;
use App\Model\Handle;
use App\Model\Project;
use Illuminate\Http\Request;

class BillController extends HomeController
{
    /**
     * 前台首页账单添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Handle $handle, Project $project)
    {
        $handles = $handle->get();

        $projects = $project->get();

        return view('home.add', ['handles'=>$handles, 'projects'=>$projects]);
    }

    /**
     * 前台添加方法
     * @param BillRequest $request
     * @param Debit $debit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BillRequest $request, Debit $debit)
    {
        $actual_disburse = $this->request->cash_disburse + $this->request->oil_disburse - $this->request->cash_recover - $this->request->oil_recover;

        $debit->project_id = $this->request->project_Id;

        $debit->name = $this->request->name;

        $debit->amount = $this->request->amount;

        $debit->handle_id = $this->request->handle_Id;

        $debit->price = $this->request->price;

        $debit->cash_disburse = $this->request->cash_disburse;

        $debit->cash_recover = $this->request->cash_recover;

        $debit->oil_disburse = $this->request->oil_disburse;

        $debit->oil_recover = $this->request->oil_recover;

        $debit->actual_disburse = $actual_disburse;

        $debit->remaining = $this->request->price - $actual_disburse;

        $debit->note = $this->request->note;

        $debit->save();

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'操作成功',
        ]);
    }
}
