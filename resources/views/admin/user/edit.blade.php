@extends('admin.layouts.app')
@section('title','修改密码')
@section('centent')

		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">
                <!--当前位置 begin-->
                    <h3 class="header-text">修改密码</h3>
                <!--当前位置 end-->
					<div class="smart-widget">
						<div class="smart-widget-header">
							修改密码
						</div>
						<div class="smart-widget-inner">
							<div class="smart-widget-body">
										<form class="form-horizontal no-margin form-border" method="post" action="{{ url('admin/user/update') }}" id="basic-constraint" data-validate="parsley" novalidate>
											@if ($errors->any())
												<div class="alert alert-danger">
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif
											<div class="form-group">
												<label class="control-label col-lg-2">角色名</label>
												<div class="col-lg-10">
													<input type="text" name="name" value="{{ $user->name }}" class="form-control input-sm" data-parsley-required="true" placeholder="请输入角色名">
												</div><!-- /.col -->
											</div><!-- /form-group -->
												<div class="form-group">
													<label class="control-label col-lg-2">邮箱账号</label>
													<div class="col-lg-10">
														<input type="text" name="email" value="{{ $user->email }}" class="form-control input-sm" data-parsley-required="true" placeholder="请输入邮箱账号">
													</div><!-- /.col -->
												</div><!-- /form-group -->
												@if($user->id) {{ method_field('PUT') }} @endif
											{{ csrf_field() }}
											<div class="form-group">
												<label class="control-label col-lg-2">新密码</label>
												<div class="col-lg-10">
													<input type="password" name="password"  value="" id="password" class="form-control input-sm" data-parsley-required="true" data-parsley-length="[6, 12]" placeholder="不需要修改密码时可不填！">
                                                </div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-lg-2">确认新密码</label>
												<div class="col-lg-2">
													<input type="password" name="confirm_password" value="" class="form-control input-sm" data-parsley-equalto="#textbox1" data-parsley-required="true" placeholder="不需要修改密码时可不填！">
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

		{{--<script>--}}
			{{--$(function()	{--}}

				{{--//Form Validation--}}
				{{--$('#basic-constraint').parsley( { listeners: {--}}
			        {{--onFormSubmit: function ( isFormValid, event ) {--}}
			            {{--if(isFormValid)	{--}}
							{{--return false;--}}
						{{--}--}}
			        {{--}--}}
			    {{--}}); --}}
				{{----}}

			{{--});   --}}
		{{--</script>--}}
@endsection