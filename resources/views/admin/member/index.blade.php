@extends('admin.layouts.app')

@section('title','会员列表')

@section('centent')

		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">

                <!--当前位置 begin-->
                    <h3 class="header-text">会员列表</h3>
                <!--当前位置 end-->
					<div class="breadcrumb ccsearch">
						<form action="{{ url('admin/member') }}" method="get">
							<input type="text" class="form-control ccdates" value="@if(isset($_GET['name'])){{ $_GET['name'] }}@endif" name="name" placeholder="会员名字/关键词查询">
							<input type="submit" class="btn btn-success btn-sm" value="搜索">
						</form>
					</div>

					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>id</th>
								<th>账户名</th>
								<th>邮箱</th>
								<th>ip地址</th>
								<th>最后登录时间</th>
								<th><a href="{{ url('admin/member/add')  }}" class="label label-danger"><i class="fa fa-plus-square-o"></i> 注册会员</a></th>
							</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->ip }}</td>
								<td>{{ date("Y/m/d h:i:s", $user->last_time) }}</td>
                                <td class="nscs-table-handle">
									<span><a href="{{ url('admin/member/show',['id'=>$user->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>查看</p></a></span>
                                    <span><a href="{{ url('admin/member/edit',['id'=>$user->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                                    <span><a onclick="return confirm('您确认删除吗？')" href="{{ url('admin/member/delete',['id'=>$user->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
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
                                	if (isset($_GET['name']))
									{
										$keywords['name'] = $_GET['name'];
									}
								?>
									{!! $users->appends($keywords)->render() !!}
                            </div>
                        </div>
                    </div>
                   <!--分页 end-->

				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		<!--内容部分-->
@endsection
