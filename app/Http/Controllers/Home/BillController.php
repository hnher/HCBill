<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\BillRequest;
use App\Model\Debit;
use App\Model\Handle;
use App\Model\Project;
use Illuminate\Http\Request;

class BillController extends HomeController
{
    public function index()
    {
        return view('home.bill.index');
    }

    public function add()
    {
        $handles = (new Handle())->get();

        $projects = (new Project())->get();

        return view('home.add', ['handles'=>$handles, 'projects'=>$projects]);
    }

    public function store(BillRequest $request, Debit $debit)
    {
        $actual_disburse = $request->cash_disburse + $request->oil_disburse - $request->cash_recover - $request->oil_recover;

        $debit->project_id = $request->project_Id;

        $debit->name = $request->name;

        $debit->amount = $request->amount;

        $debit->handle_id = $request->handle_Id;

        $debit->price = $request->price;

        $debit->cash_disburse = $request->cash_disburse;

        $debit->cash_recover = $request->cash_recover;

        $debit->oil_disburse = $request->oil_disburse;

        $debit->oil_recover = $request->oil_recover;

        $debit->actual_disburse = $actual_disburse;

        $debit->remaining = $request->price - $actual_disburse;

        $debit->note = $request->note;

        $debit->save();

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'操作成功',
        ]);
    }
}
