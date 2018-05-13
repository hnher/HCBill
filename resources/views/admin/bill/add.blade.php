@extends('admin.layouts.app')
@section('title','添加')
@section('css')
    {{--时间--}}
    <script type="text/javascript" src="/js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="/js/jquery.ui.datepicker.js"></script>
    <script type="text/javascript" src="/js/datechoice.js"></script>
    <link href="/css/jquery.ui.datepicker.css" rel="stylesheet" />
    {{--时间--}}
    <script src="/bootstrap/css/fileinput.css"></script>
    <script src="/bootstrap/css/default.css"></script>

@endsection
@section('centent')

    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">添加账单
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
                                            <option value="{{ $project->id }}" @if($bill->project_id == $project->id) selected @endif>{{ $project->project_name ?$project->project_name : '暂无分类' }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- /.col -->
                                </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">品名：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('name',$bill->name) }}" name="name" placeholder="请填写品名">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <input type="hidden"  name="id" value="{{ $bill->id }}" >
                            <div class="form-group">
                                <label class="control-label col-lg-2">数量：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('amount',$bill->amount) }}" name="amount" placeholder="请填写数量">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            @if($bill->id) {{ method_field('PUT') }} @endif
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-lg-2">经手人：</label>
                                <div class="col-lg-3">
                                    <select class="form-control fbsj" name="handle_Id">
                                        @foreach($handles as $handle)
                                            <option value="{{ $handle->id }}" @if($bill->handle_id == $handle->id ) selected @endif>{{ $handle->handle_name ? $handle->handle_name : '暂无' }}</option>
                                        @endforeach
                                    </select>
                                </div><!-- /.col -->
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">运价：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" @if($bill->id) value="{{ old('price',$bill->price) }}" @elseif($bill) value="0" @endif  name="price" placeholder="请填写运价">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">现金支出：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" @if($bill->id) value="{{ old('cash_disburse',$bill->cash_disburse) }}" @elseif($bill) value="0" @endif name="cash_disburse" placeholder="请填写现金支出">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">现金回收：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" @if($bill->id) value="{{ old('cash_recover',$bill->cash_recover) }}" @elseif($bill) value="0" @endif  name="cash_recover" placeholder="请填写现金回收">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">油卡支出：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm"  @if($bill->id)value="{{ old('oil_disburse',$bill->oil_disburse) }}" @elseif($bill) value="0" @endif name="oil_disburse" placeholder="请填写油卡支出">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">油卡回收：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" @if($bill->id)value="{{ old('oil_recover',$bill->oil_recover) }}" @elseif($bill) value="0" @endif  name="oil_recover" placeholder="请填写油卡回收">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">创建时间：</label>
                                <div class="col-lg-3">
                                    <input type="text" name="customize_time" id="from01" @if($bill->id)value="{{ old('customize_time', date("Y/m/d", $bill->customize_time)) }}" @else value="{{ date("Y/m/d", time()) }}" @endif class="form-control ccdates" placeholder="创建时间">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->

                            <div class="form-group">
                                <label class="control-label col-lg-2">创建时间：</label>
                                <div class="col-lg-3">
                                    <input type="text" name="no" id="from01" @if($bill->id)value="{{ old('no', date("Y/m/d", $bill->no)) }}" @endif class="form-control ccdates" placeholder="回单编号">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->

                            <div class="form-group">
                                <label class="control-label col-lg-2">备注：</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="{{ old('note',$bill->note) }}" name="note" placeholder="可不填写">
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