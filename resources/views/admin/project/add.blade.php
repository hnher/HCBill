@extends('admin.layouts.app')
@section('title','添加项目名')
@section('css')
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">
    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">
    <!-- cccss -->
    <link href="/css/ccadd.min.css" rel="stylesheet">
@endsection
@section('centent')
    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">项目
                <span class="hed_te_span"><a  href="#">列表</a><a class="cursa"  href="#">新增</a></span></h3>
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
<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Popup Overlay -->
<script src='/js/jquery.popupoverlay.min.js'></script>
<!-- Parsley -->
<script src="/js/parsley.min.js"></script>
<!-- Slimscroll -->
<script src='/js/jquery.slimscroll.min.js'></script>
<!-- Modernizr -->
<script src='/js/modernizr.min.js'></script>
<!-- Simplify -->
<script src="/js/simplify/simplify.js"></script>
<script src="/bootstrap/js/bootstrapValidator.js"></script>
@endsection