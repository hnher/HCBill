<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\BillRequest;
use App\Model\Bill;
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
    public function store(BillRequest $request, Bill $bill)
    {
        $actual_disburse = $this->request->cash_disburse + $this->request->oil_disburse - $this->request->cash_recover - $this->request->oil_recover;//实际开支

        $bill->project_id = $this->request->project_Id;

        $bill->name = $this->request->name;

        $bill->amount = $this->request->amount;

        $bill->handle_id = $this->request->handle_Id;

        $bill->price = $this->request->price;

        $bill->cash_disburse = $this->request->cash_disburse;

        $bill->cash_recover = $this->request->cash_recover;

        $bill->oil_disburse = $this->request->oil_disburse;

        $bill->oil_recover = $this->request->oil_recover;

        $bill->actual_disburse = $actual_disburse;

        $bill->remaining = $this->request->price - $actual_disburse;

        $bill->customize_time = strtotime($this->request->customize_time);

        $bill->note = $this->request->note;

        $bill->save();

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'操作成功',
        ]);
    }
}
