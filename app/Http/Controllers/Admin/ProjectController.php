<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Model\Project;
use Illuminate\Http\Request;

class ProjectController extends AdminController
{
    public function add(Project $project)
    {
        return view('admin.project.add', compact('project'));
    }

    public function store(Project $project, ProjectRequest $request)
    {
        if ($request->id) {

            $project = $project->findOrFail($request->id);
        }

        $project->project_name = $request->project_name;

        $project->save();

        return redirect('admin/project')->with('status', [
           'code'=>'success',
           'msg'=>'操作成功',
        ]);
    }


    public function index()
    {
        $projecteds = (new Project())->paginate(5);

        return view('admin/project/index', compact('projecteds'));
    }


    public function edit(Project $project, Request $request)
    {
        $project = $project->findOrFail($request->id);

        return  view('admin.project.add', compact('project'));
    }


    public function delete($id)
    {
        $project = Project::where('id', $id)->first();

        if (count($project->debit)) {
            return redirect()->back()->with('status', [
                'code'=>'success',
                'msg'=>'账单列表使用中--不可删除',
            ]);
        }

        $project->delete();

        return redirect()->back()->with('status', [
            'code'=>'success',
            'msg'=>'删除成功',
        ]);
    }
}
