<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogsShipped;
use App\Http\Requests\ProjectRequest;
use App\Model\Project;
use Illuminate\Http\Request;

class ProjectController extends AdminController
{
    /**
     * 项目名添加
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Project $project)
    {
        return view('admin.project.add', ['project'=>$project]);
    }

    /**
     * 项目名添加方法
     * @param Project $project
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project, ProjectRequest $request)
    {
        if ($this->request->id) {
            $project = $project->findOrFail($this->request->id);
        }

        $project->project_name = $this->request->project_name;

        $project->save();

        if ($this->request->method() == "POST") {
            event(new LogsShipped($this->request,1,  5));
        } elseif ($this->request->method() == "PUT") {
            event(new LogsShipped($this->request, 2, 5));
        }

        return redirect('admin/project')->with('status', [
           'code'=>'success',
           'msg'=>'操作成功',
        ]);
    }

    /**
     * 项目名列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Project $project)
    {
        $query = $project->query();

        if ($this->request->keyword) {
            $query->where('project_name', 'like', '%' . $this->request->keyword . '%');
        }
        $projecteds = $query->orderBy('created_at', 'desc')->paginate(100);

        return view('admin/project/index', ['projecteds'=>$projecteds]);
    }

    /**
     * 项目名编辑
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project, Request $request)
    {
        $project = $project->findOrFail($request->id);

        return  view('admin.project.add', ['project'=>$project]);
    }

    /**
     * 项目名删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $project = Project::where('id', $id)->firstOrFail();

        if (count($project->bill)) {
            return redirect()->back()->with('status', [
                'code'=>'error',
                'msg'=>'账单列表使用中--不可删除',
            ]);
        }

        $project->delete();

        event(new LogsShipped($this->request, 3, 5));

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'删除成功',
        ]);
    }
}
