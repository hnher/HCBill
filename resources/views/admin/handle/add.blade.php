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
            <h3 class="header-text">经手人
                <span class="hed_te_span"><a  href="{{ url('admin/handle') }}">列表</a><a class="cursa"  href="#">新增</a></span></h3>
            <!--当前位置 end-->
            <div class="smart-widget">
                <div class="smart-widget-header">
                    添加经手人
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
                        <form class="form-horizontal no-margin form-border" action="{{ url('admin/handle/store') }}" method="post" >
                            <div class="form-group">
                                <label class="control-label col-lg-2">经手人：</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" name="handle_name"  value="{{ $handle->handle_name }}" placeholder="经手人">
                                </div><!-- /.col -->
                                <input type="hidden"  name="id" value="{{ $handle->id }}" >
                                {{ csrf_field() }}
                            </div><!-- /form-group -->

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