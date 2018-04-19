@extends('admin.layouts.app')
@section('title','注册会员')

@section('centent')
    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md">
            <!--当前位置 begin-->
            <h3 class="header-text">会员
                <span class="hed_te_span"><a  href="{{ url('admin/member') }}">列表</a></span></h3>
            <!--当前位置 end-->
            <div class="smart-widget">
                <div class="smart-widget-header">
                    会员信息
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
                        <form class="form-horizontal no-margin form-border" action="{{ url('admin/member/store') }}" method="post" >
                            <div class="form-group">
                                <label class="control-label col-lg-2">会员名：</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" name="name"  value="{{ old('name', $users->name) }}" placeholder="请输入会员名">
                                </div><!-- /.col -->
                                <input type="hidden" name="id" value="{{ $users->id }}">
                                @if($users->id) {{ method_field('PUT') }} @endif
                                {{ csrf_field() }}
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">邮箱：</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" name="email"  value="{{ old('email', $users->email) }}" placeholder="请输入邮箱">
                                </div><!-- /.col -->
                            </div><!-- /form-group -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">密码：</label>
                                <div class="col-lg-4">
                                    <input type="password" class="form-control input-sm" name="password"  value="{{ old('password') }}" @if($users->id) placeholder="不需要修改密码可不填写"  @endif placeholder="请输入密码" >
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

<script src='/js/jquery.popupoverlay.min.js'></script>
<!-- Parsley -->
<script src="/js/parsley.min.js"></script>

<script src="/bootstrap/js/bootstrapValidator.js"></script>
@endsection