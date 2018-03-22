@extends('admin.layouts.app')
@section('title','添加')
@section('css')
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">
    <script src="bootstrap//css/bootstrapValidator.css"></script>
    <!-- fileinput -->
    <script src="/bootstrap/css/fileinput.css"></script>
    <script src="/bootstrap/css/default.css"></script>
    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">
    <!-- ccadd -->
    <link href="/css/ccadd.min.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="/js/jquery-1.11.1.min.js"></script>
@endsection
@section('centent')

    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">统计信息
                <span class="hed_te_span"><a href="{{ url('admin/bill') }}">管理</a></span></h3>
            <!--当前位置 end-->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="smart-widget">
                <div class="smart-widget-inner">
                    <div class="smart-widget-body">
                        <form class="form-horizontal no-margin form-border" action="{{ url('admin/bill/store') }}" method="post" id="basic-constraint" novalidate>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">项目名：</label>
                                    <div class="col-lg-3">
                                        <select class="form-control fbsj" name="project_Id">
                                            @foreach($projects as $project)
                                            <option value="{{ $project->id }}" @if($debit->project_id == $project->id) selected @endif>{{ $project->project_name ?$project->project_name : '暂无分类' }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- /.col -->
                                </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">品名：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('name',$debit->name) }}" name="name" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <input type="hidden"  name="id" value="{{ $debit->id }}" >
                            <div class="form-group">
                                <label class="control-label col-lg-2">数量：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('amount',$debit->amount) }}" name="amount" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-lg-2">经手人：</label>
                                <div class="col-lg-3">
                                    <select class="form-control fbsj" name="handle_Id">
                                        @foreach($handles as $handle)
                                            <option value="{{ $handle->id }}" @if($debit->handle_id == $handle->id ) selected @endif>{{ $handle->handle_name ? $handle->handle_name : '暂无' }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">运价：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('price',$debit->price) }}" name="price" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">现金支出：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('cash_disburse',$debit->cash_disburse) }}" name="cash_disburse" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">油卡支出：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('cash_recover',$debit->cash_recover) }}" name="cash_recover" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">现金回收：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('oil_disburse',$debit->oil_disburse) }}" name="oil_disburse" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">油卡回收：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('oil_recover',$debit->oil_recover) }}" name="oil_recover" >
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">备注：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('note',$debit->note) }}" name="note" >
                                </div><!-- /.col -->
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
<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src='/js/jquery.slimscroll.min.js'></script>
<!-- Modernizr -->
<script src='/js/modernizr.min.js'></script>
<!-- Simplify -->
<script src="/js/simplify/simplify.js"></script>
<script src="/bootstrap/js/fileinput.js"></script>
<script src="/bootstrap/js/fileinput_locale_zh.js"></script>
<!-- bootstrapValidator -->
<script src="/bootstrap/js/bootstrapValidator.js"></script>

<script>
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
    });
</script>
@endsection