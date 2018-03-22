@extends('admin.layouts.app')
@section('title','出账')
@section('css')
		<!-- cccss -->
		<link href="/css/ccadd.min.css" rel="stylesheet">

		{{--时间--}}
		<script type="text/javascript" src="/js/jquery.ui.core.js"></script>
		<script type="text/javascript" src="/js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="/js/datechoice.js"></script>
		<link href="/css/jquery.ui.datepicker.css" rel="stylesheet" />
		{{--时间--}}

@endsection
@section('centent')
		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">

                <!--当前位置 begin-->
                    <h3 class="header-text">账单统计信息列表</h3>
                <!--当前位置 end-->

                <!--搜索-->
                  <div class="breadcrumb ccsearch">
					  <form action="{{ url('admin/bill') }}" method="get">
						  <input type="text" name="start" id="from01" class="form-control ccdates" placeholder="起始时间"> -
						  <input type="text" name="end" id="to01" class="form-control ccdates" placeholder="截止时间">
						  经手人： <select class="form-control ccdates" name="Keywordj">
							  <option ></option>
							  @foreach($handles as $handle)
								  <option value="{{ $handle->id }}" @if($handle->id == $handle->id) selected @endif >{{ $handle->handle_name }}</option>
								  @endforeach
						          </select>



						  项目名： <select class="form-control ccdates" name="Keywordx">
							  		<option ></option>
							  @foreach($projects as $project)
							  		<option value="{{ $project->id }}" @if($project->id == $project->id) selected @endif>{{ $project->project_name }}</option>
							  @endforeach
						  		  </select>

                        <input type="submit" class="btn btn-success btn-sm" value="搜索">
						  <input  type="submit" id="fund-a" class="btn btn-success btn-sm label-danger" name="Excel" value="生成报价单">
						  {{--<a class="label label-danger" href="{{ url('admin/bill/export') }}"></a>--}}
					  </form>
                    </div>
                <!--搜索 end-->
					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>项目名</th>
								<th>品名</th>
								<th>数量</th>
								<th>经手人</th>
								<th>运价</th>
								<th>现金支出</th>
								<th>现金回收</th>
								<th>油卡支出</th>
								<th>油卡回收</th>
								<th>实际开支</th>
								<th>剩余</th>
								<th>备注</th>
								<th>时间</th>
								<th>操作</th>

							</tr>
						</thead>
						<tbody>
						@foreach($debits as $debit)
							<tr>
								<td>{{ $debit->project->project_name }}</td>
								<td>{{ $debit->name }}</td>
								<td class="text-danger">{{ $debit->amount }}</td>
								<td class="text-info">{{ $debit->handle->handle_name }}</td>
								<td>{{ $debit->price }}</td>
								<td>{{ $debit->cash_disburse }}</td>
								<td>{{ $debit->cash_recover }}</td>
								<td>{{ $debit->oil_disburse }}</td>
								<td>{{ $debit->oil_recover }}</td>
								<td>{{ $debit->actual_disburse }}</td>
								<td>{{ $debit->remaining }}</td>
								<td>{{ $debit->note }}</td>
								<td>{{ $debit->created_at }}</td>
								<td class="nscs-table-handle">
									<span><a href="{{ url('admin/bill/edit',['id'=>$debit->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
									<span><a onclick="return confirm('您确认删除吗？')" href="{{ url('admin/bill/delete',['id'=>$debit->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

                   <!--分页 begin-->
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers">
                                 {{ $debits->links() }}
                            </div>
                        </div>
                    </div>
                   <!--分页 end-->

				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		<!--内容部分-->
@endsection
@section('js')
		<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

		<script src='/js/jquery.slimscroll.min.js'></script>

		<!-- Popup Overlay -->
		<script src='/js/jquery.popupoverlay.min.js'></script>

		<!-- Modernizr -->
		<script src='/js/modernizr.min.js'></script>
		
		<!-- Simplify -->
		<script src="/js/simplify/simplify.js"></script>

		{{--<script>--}}
			{{--$('#fund-a').click(function () {--}}
                {{--window.location.href="{{ url('admin/bill') }}";--}}
            {{--});--}}
		{{--</script>--}}

@endsection
