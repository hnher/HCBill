<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DebitsExport;
use App\Helpers\Count;
use App\Http\Requests\BillRequest;
use App\Model\Debit;
use App\Model\Handle;
use App\Model\Project;
use Illuminate\Http\Request;
use Excel;

class BillController extends AdminController
{
    /**
     * 详情展示
     * @param Debit $debit
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Debit $debit, Request $request)
    {
        $query = $debit->query();

        if ($request->Keywordj) {
            $query->where('handle_id', 'like', '%' . $request->Keywordj . '%');
        }

        if ($request->Keywordx) {
            $query->where('project_id', 'like', '%' . $request->Keywordx . '%');
        }

        if ($request->start && $request->end)
        {
            $query->whereBetween('created_at', [strtotime($request->start),strtotime($request->end)]);
        }

        if ($request->keyword) {

            $query->orWhereHas('project', function ($query) use ($request){

                $query->Where('project_name', 'like', '%' . $request->keyword . '%');

            });

            $query->orWhereHas('handle', function ($query) use ($request){

                $query->Where('handle_name', 'like', '%' . $request->keyword . '%');

            });

            $query->orWhere('name', 'like', '%' . $request->keyword . '%');

            $query->orWhere('note', 'like', '%' . $request->keyword . '%');
        }

        if ($request->Excel) {

            $debut = $query->pluck('id')->toArray();

            $debut = $this->export($debut);

            return $debut;
        }

        $debits = $query->with('project', 'handle')->paginate(10);

        $handles = (new Handle())->get();

        $projects = (new Project())->get();

        //以下是统计
        $countProject = (new Project())->get()->count();//项目统计

        $countHandles = (new Handle())->get()->count();//品名统计

        $counts = new Debit();

        $countDisburses = $counts->pluck('cash_disburse')->sum();//现金支出总金额统计

        $countRecover = $counts->pluck('cash_recover')->sum();//现金回收总金额统计

        $oil_disburse = $counts->pluck('oil_disburse')->sum();//油卡支出总金额

        $oil_recover = $counts->pluck('oil_recover')->sum();//油卡支出总金额

        return view('admin.bill.index', [
            'debits'=>$debits,
            'handles'=>$handles,
            'projects'=>$projects,
            'countProject'=>$countProject,
            'countHandles'=>$countHandles,
            'countDisburses'=>$countDisburses,
            'countRecover'=>$countRecover,
            'oil_disburse'=>$oil_disburse,
            'oil_recover'=>$oil_recover,
        ]);
    }


    /**
     * 添加页面
     * @param Debit $debit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Debit $debit)
    {

        $handles = (new Handle())->get();

        $projects = (new Project())->get();

        return view('admin.bill.add', ['debit'=>$debit, 'handles'=>$handles, 'projects'=>$projects ]);
    }


    /**
     * 添加方法
     * @param BillRequest $request
     * @param Debit $debit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BillRequest $request, Debit $debit)
    {

        if($request->id){

            $debit = $debit->findOrFail($request->id);
        }

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

        return redirect('admin/bill')->with('status', [
           'code'=>'success',
           'msg'=>'操作成功',
        ]);
    }


    /**
     * 编辑修改
     * @param Debit $debit
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Debit $debit, Request $request)
    {
        $debit = $debit->findOrFail($request->id);

        $handles = (new Handle())->get();

        $projects = (new Project())->get();

        return view('admin.bill.add', ['debit'=>$debit, 'handles'=>$handles, 'projects'=>$projects ]);
    }


    /**
     * 删除方法
     * @param Debit $debit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Debit $debit)
    {
        $debit->destroy($this->request->id);

        return redirect()->back()->with('status', [
           'code'=>'success',
           'msg'=>'删除成功',
        ]);
    }


    /**
     * 下载表格方法
     * @param Debit $debit
     * @param Request $request
     * @return mixed
     */
    public function export($debut)
    {
        return Excel::download(new DebitsExport($debut), 'invoices.xlsx');
    }
}
