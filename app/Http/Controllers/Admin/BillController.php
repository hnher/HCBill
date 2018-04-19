<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogsShipped;
use App\Exports\BillsExport;
use App\Exports\DebitsExport;
use App\Helpers\billCount;
use App\Http\Requests\BillRequest;
use App\Model\Bill;
use App\Model\Handle;
use App\Model\Project;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Auth;

class BillController extends AdminController
{
    /**
     * 详情展示
     * @param Bill $bill
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Bill $bill, Request $request, Handle $handle, Project $project)
    {
        $query = $bill->query();

        if ($request->handle_name) {
            $query->where('handle_id', $request->handle_name);
        }

        if ($request->project_name) {
            $query->where('project_id',$request->project_name);
        }

        if ($request->start_time && $request->end_time) {
            $query->whereBetween('customize_time', [strtotime($request->start_time),strtotime($request->end_time)]);
        }

        if ($request->start_time) {
            $query->where('customize_time', '>=', strtotime($request->start_time));
        } elseif ($request->end_time) {
            $query->where('customize_time', '<=', strtotime($request->end_time));
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

        if ($request) {
            $count = (new billCount())->getBill($query);
        }

        if ($request->Excel) {

            $billId = $query->pluck('id')->toArray();

            $billId = $this->export($billId);

            return $billId;
        }

        $bills = $query->with('project', 'handle')->orderBy('created_at', 'desc')->paginate(100);

        $handles = $handle->get();

        $projects = $project->get();



        return view('admin.bill.index', [
            'bills'=>$bills,
            'handles'=>$handles,
            'projects'=>$projects,
            'count'=>$count,
        ]);
    }


    /**
     * 添加页面
     * @param Bill $bill
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Bill $bill, Handle $handle, Project $project)
    {
        $handles = $handle->get();

        $projects = $project->get();

        return view('admin.bill.add', [
            'bill'=>$bill,
            'handles'=>$handles,
            'projects'=>$projects,
        ]);
    }


    /**
     * 添加方法
     * @param BillRequest $request
     * @param Bill $bill
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BillRequest $request, Bill $bill)
    {
        if($this->request->id){

            $bill = $bill->findOrFail($this->request->id);
        }

        $actual_disburse = $this->request->cash_disburse + $this->request->oil_disburse - $this->request->cash_recover - $this->request->oil_recover;//实际开支

        $bill->project_id = $this->request->project_Id;

        $bill->name = $this->request->name;

        $bill->user_id = Auth::user()->id;

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

        if ($this->request->method() == "POST") {
            event(new LogsShipped($this->request,1,  6));
        } elseif ($this->request->method() == "PUT") {
            event(new LogsShipped($this->request, 2, 6));
        }


        return redirect('admin/bill')->with('status', [
           'code'=>'success',
           'msg'=>'操作成功',
        ]);
    }


    /**
     * 编辑修改
     * @param Bill $bill
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Bill $bill, Request $request, Handle $handle, Project $project)
    {
        $bill = $bill->findOrFail($request->id);

        $handles = $handle->get();

        $projects = $project->get();

        return view('admin.bill.add', [
            'bill'=>$bill,
            'handles'=>$handles,
            'projects'=>$projects,
        ]);
    }


    /**
     * 删除方法
     * @param Bill $bill
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Bill $bill)
    {
        $bill->destroy($this->request->id);

        event(new LogsShipped($this->request, 3, 6));

        return redirect()->back()->with('status', [
           'code'=>'success',
           'msg'=>'删除成功',
        ]);
    }


    /**
     * 下载表格方法
     * @param Bill $bill
     * @param Request $request
     * @return mixed
     */
    public function export($billId)
    {
        return Excel::download(new DebitsExport($billId), 'invoices.xlsx');
    }
}
