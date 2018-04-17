<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DebitsExport;
use App\Helpers\billCount;
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
    public function index(Debit $debit, Request $request, Handle $handle, Project $project)
    {
        $query = $debit->query();


        if ($request->Keywordj) {
            $query->where('handle_id', $request->Keywordj);
        }

        if ($request->Keywordx) {
            $query->where('project_id',$request->Keywordx);
        }

        if ($request->start && $request->end) {
            $query->whereBetween('created_at', [strtotime($request->start),strtotime($request->end)]);
        }

        if ($request->start) {
            $query->where('created_at', '>=', strtotime($request->start));
        } elseif ($request->end) {
            $query->where('created_at', '<=', strtotime($request->end));
        }

        if ($request->keyword) {

            $query->where(function ($query) use ($request) {

                $query->orWhereHas('project', function ($query) use ($request){

                    $query->Where('project_name', 'like', '%' . $request->keyword . '%');
                });
                $query->orWhereHas('handle', function ($query) use ($request){

                    $query->Where('handle_name', 'like', '%' . $request->keyword . '%');
                });
                $query->orWhere('name', 'like', '%' . $request->keyword . '%');

                $query->orWhere('note', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->Excel) {

            $debut = $query->pluck('id')->toArray();

            $debut = $this->export($debut);

            return $debut;
        }

        $debits = $query->with('project', 'handle')->paginate(10);

        $handles = $handle->get();

        $projects = $project->get();

        $count = (new billCount())->getBill();

        return view('admin.bill.index', [
            'debits'=>$debits,
            'handles'=>$handles,
            'projects'=>$projects,
            'count'=>$count,
        ]);
    }


    /**
     * 添加页面
     * @param Debit $debit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Debit $debit, Handle $handle, Project $project)
    {
        $handles = $handle->get();

        $projects = $project->get();

        return view('admin.bill.add', [
            'debit'=>$debit,
            'handles'=>$handles,
            'projects'=>$projects,
        ]);
    }


    /**
     * 添加方法
     * @param BillRequest $request
     * @param Debit $debit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BillRequest $request, Debit $debit)
    {
        if($this->request->id){

            $debit = $debit->findOrFail($this->request->id);
        }

        $actual_disburse = $this->request->cash_disburse + $this->request->oil_disburse - $this->request->cash_recover - $this->request->oil_recover;//实际开支

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
    public function edit(Debit $debit, Request $request, Handle $handle, Project $project)
    {
        $debit = $debit->findOrFail($request->id);

        $handles = $handle->get();

        $projects = $project->get();

        return view('admin.bill.add', [
            'debit'=>$debit,
            'handles'=>$handles,
            'projects'=>$projects,
        ]);
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
