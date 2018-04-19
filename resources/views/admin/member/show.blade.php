@extends('admin.layouts.app')

@section('title','会员操作信息')

@section('centent')
		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">

                <!--当前位置 begin-->
                    <h3 class="header-text">会员操作日志信息</h3>
                <!--当前位置 end-->

					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>会员账号</th>
                                <th>时间</th>
								<th>状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						@foreach($logs as $log)
							<tr>
								<td class="text-danger">{{ $log->user->name }}</td>
								<td class="text-info">{{ date("Y/m/d", $log->last_time ) }}</td>
								<td>
									@if($log->status_id == 1)
									<span class="label label-success">添加</span>
									@elseif ($log->status_id == 2)
										<span class="label label-warning">修改</span>
									@elseif ($log->status_id == 3)
										<span class="label label-default">删除</span>
									@elseif ($log->status_id == 8)
										<span class="label label-danger">退出</span>
									@elseif ($log->status_id == 9)
										<span class="label label-danger">登陆</span>
									@endif
								</td>
								<td>{{ $log->status->status_name }}</td>
							</tr>
						@endforeach

						</tbody>
					</table>
                    
                    
                   <!--分页 begin-->
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                  {{ $logs->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                   <!--分页 end-->

				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		<!--内容部分-->
@endsection
@section('js')
		<script src='/js/jquery.popupoverlay.min.js'></script>
@endsection
