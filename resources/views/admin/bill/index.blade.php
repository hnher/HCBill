@extends('admin.layouts.app')
@section('title','出账')
@section('css')
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

                <!--当前位置 end-->
					<div class="row">
						<div class="col-lg-12">
							<div class="smart-widget">
								<div class="smart-widget-header">
									<h3 class="header-text">账单统计信息列表</h3>
									<i class="fa fa-university font-16"></i>
									您好 <strong class="text-danger">管理员</strong>，这里是 <strong class="text-danger">账单统计信息列表</strong> 的数据概况！
								</div>
								<div class="smart-widget-inner padding-md clearfix">
									<div class="col-lg-3 col-sm-6 paddingLR-sm">
										<div class="statistic-box bg-success m-bottom-md">
											<div class="statistic_text">
												<p><strong>{{ $count['countDisburses'] }}</strong>元</p>
												<p>现金支出总金额</p>
											</div>
											<div class="datastatistics">
												<i class="fa fa-eye"></i>
											</div>
										</div>
									</div><!--col-lg-3-->
									<div class="col-lg-3 col-sm-6 paddingLR-sm">
										<div class="statistic-box bg-info m-bottom-md">
											<div class="statistic_text">
												<p><strong>{{ $count['countRecover'] }}</strong>元</p>
												<p>现金回收总金额</p>
											</div>
											<div class="datastatistics">
												<i class="fa fa-eye"></i>
											</div>
										</div>
									</div><!--col-lg-3-->
									<div class="col-lg-3 col-sm-6 paddingLR-sm">
										<div class="statistic-box bg-warning m-bottom-md">
											<div class="statistic_text">
												<p><strong>{{ $count['oil_disburse'] }}</strong>元</p>
												<p>油卡支出总金额</p>
											</div>
											<div class="datastatistics">
												<i class="fa fa-eye"></i>
											</div>
										</div>
									</div><!--col-lg-3-->
									<div class="col-lg-3 col-sm-6 paddingLR-sm">
										<div class="statistic-box bg-primary m-bottom-md">
											<div class="statistic_text">
												<p><strong>{{ $count['oil_recover'] }}</strong>元</p>
												<p>油卡回收总金额</p>
											</div>
											<div class="datastatistics">
												<i class="fa fa-eye"></i>
											</div>
										</div>
									</div><!--col-lg-3-->
								</div><!-- ./smart-widget-inner -->
							</div>
						</div><!--col-lg-12-->
					</div><!--row-->

                <!--搜索-->
                  <div class="breadcrumb ccsearch">
					  <form action="{{ url('admin/bill') }}" method="get">

						  <input type="text" class="form-control ccdates" value="@if(isset($_GET['keyword'])){{ $_GET['keyword'] }}@endif" name="keyword" placeholder="项目名/品名/经手人/备注/关键词查询">

						  <select class="form-control ccdates" name="handle_name">
							  <option value="0" >全部经手人</option>
							  @foreach($handles as $handle)
								  <option @if(isset($_GET['handle_name']) && $_GET['handle_name'] == $handle->id) selected @endif value="{{ $handle->id }}"  >{{ $handle->handle_name }}</option>
								  @endforeach
						          </select>


						  <select class="form-control ccdates" name="project_name">
							  		<option value="0">全部项目</option>
							  @foreach($projects as $project)
							  		<option @if(isset($_GET['project_name']) && $_GET['project_name'] == $project->id) selected @endif value="{{ $project->id }}" >{{ $project->project_name }}</option>
							  @endforeach
						  		  </select>

						  <input type="text" name="start_time" id="from01" value="@if(isset($_GET['start'])){{ $_GET['start'] }}@endif" class="form-control ccdates" placeholder="起始时间"> -
						  <input type="text" name="end_time" id="to01" value="@if(isset($_GET['end'])){{ $_GET['end'] }}@endif" class="form-control ccdates" placeholder="截止时间">
                        	<input type="submit" class="btn btn-success btn-sm" value="搜索">
						  <div style="position: relative;display: inline-block;">
							  <input type="submit" id="fund-a" class="btn btn-success btn-sm label-danger" style="opacity:0;width:70px;position: absolute;left: 0;top: 0;" name="Excel" value="Excel">
							  <span class="btn btn-success btn-sm label-danger" style="padding: 5px 10px">生成账单</span>
						  </div>
					  </form>
                    </div>
                <!--搜索 end-->
					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>回单号</th>
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
								<th>创建时间</th>
								<th>会员名</th>
								<th>操作</th>

							</tr>
						</thead>
						<tbody>
						@foreach($bills as $bill)
							<tr>
								<td>{{ $bill->no ? $bill->no : '暂无' }}</td>
								<td>{{ $bill->project->project_name }}</td>
								<td>{{ $bill->name }}</td>
								<td class="text-danger">{{ $bill->amount }}</td>
								<td class="text-info">{{ $bill->handle->handle_name }}</td>
								<td>{{ $bill->price }}</td>
								<td>{{ $bill->cash_disburse }}</td>
								<td>{{ $bill->cash_recover }}</td>
								<td>{{ $bill->oil_disburse }}</td>
								<td>{{ $bill->oil_recover }}</td>
								<td>{{ $bill->actual_disburse }}</td>
								<td>{{ $bill->remaining }}</td>
								<td>{{ $bill->note ? $bill->note : '无'  }}</td>
								<td>{{ $bill->customize_time ? date("Y/m/d", $bill->customize_time) : date("Y/m/d", $bill->created_at) }}</td>
								<td>{{ $bill->user ? $bill->user->name : '未知' }}</td>
								<td class="nscs-table-handle">
									<span><a href="{{ url('admin/bill/edit',['id'=>$bill->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
									<span><a onclick="return confirm('您确认删除吗？')" href="{{ url('admin/bill/delete',['id'=>$bill->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>

                   <!--分页 begin-->
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers">
								<?php
                                $keywords = [];
								if(isset($_GET['keyword']))
								{
									$keywords['keyword'] = $_GET['keyword'];
								}
								if(isset($_GET['Keywordj']))
								{
									$keywords['Keywordj'] = $_GET['Keywordj'];
								}
								if(isset($_GET['Keywordx']))
								{
									$keywords['Keywordx'] = $_GET['Keywordx'];
								}
								if(isset($_GET['start']))
								{
									$keywords['start'] = $_GET['start'];
								}
								if(isset($_GET['end']))
								{
									$keywords['end'] = $_GET['end'];
								}
								?>
                                 {!! $bills->appends($keywords)->render() !!}
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

		<script src='/js/jquery.flot.min.js'></script>

		<script src='/js/rapheal.min.js'></script>

		<script src='/js/morris.min.js'></script>

@endsection
