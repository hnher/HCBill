@extends('admin.layouts.app')
@section('title','添加项目名')

@section('centent')
    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">项目
                <span class="hed_te_span"><a  href="{{ url('admin/project') }}">列表</a></span></h3>
            <!--当前位置 end-->
            <div class="smart-widget">
                <div class="smart-widget-header">
                    添加项目
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="smart-widget-inner">
                    <div class="smart-widget-body">
                        <form class="form-horizontal no-margin form-border" action="{{ url('admin/project/store') }}" method="post" id="basic-constraint" data-validate="parsley" novalidate>
                            <div class="form-group">
                                <label class="control-label col-lg-2">项目名：</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" name="project_name" value="{{ $project->project_name }}" placeholder="项目名">
                                </div><!-- /.col -->
                                <input type="hidden"  name="id" value="{{ $project->id }}" >
                                @if($project->id) {{ method_field('PUT') }} @endif
                            </div><!-- /form-group -->
                            {{ csrf_field() }}
                            <div class="text-center m-top-md">
                                <button type="submit" class="btn btn-info">提交</button>
                            </div>
                        </form>
                    </div>
                </div><!-- ./smart-widget-inner -->
            </div><!-- ./smart-widget -->
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
    <!--内容部分-->
  @endsection
@section('js')


<script src='/js/jquery.popupoverlay.min.js'></script>
<!-- Parsley -->
<script src="/js/parsley.min.js"></script>

<script src="/bootstrap/js/bootstrapValidator.js"></script>
@endsection