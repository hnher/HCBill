@extends('admin.layouts.app')
@section('title','添加项目名')

@section('centent')
    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">经手人
                <span class="hed_te_span"><a  href="{{ url('admin/handle') }}">列表</a></span></h3>
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
                                @if($handle->id) {{ method_field('PUT') }} @endif
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

<script src='/js/jquery.popupoverlay.min.js'></script>
<!-- Parsley -->
<script src="/js/parsley.min.js"></script>

<script src="/bootstrap/js/bootstrapValidator.js"></script>
@endsection