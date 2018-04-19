@extends('admin.layouts.app')
@section('title','经手人名')

@section('centent')

		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">

                <!--当前位置 begin-->
                    <h3 class="header-text">经手人列表</h3>
                <!--当前位置 end-->
					<div class="breadcrumb ccsearch">
						<form action="{{ url('admin/handle') }}" method="get">
							<input type="text" class="form-control ccdates" value="@if(isset($_GET['name'])){{ $_GET['name'] }}@endif" name="name" placeholder="经手人名字/关键词查询">
							<input type="submit" class="btn btn-success btn-sm" value="搜索">
						</form>
					</div>

					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>id</th>
								<th>名字</th>
								<th><a href="{{ url('admin/handle/add')  }}" class="label label-danger"><i class="fa fa-plus-square-o"></i> 添加新经手人</a></th>
							</tr>
						</thead>
						<tbody>
						@foreach($handles as $handle)
							<tr>
								<td>{{ $handle->id }}</td>
								<td>{{ $handle->handle_name }}</td>
                                <td class="nscs-table-handle">
                                    <span><a href="{{ url('admin/handle/edit',['id'=>$handle->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                                    <span><a onclick="return confirm('您确认删除吗？')" href="{{ url('admin/handle/delete',['id'=>$handle->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
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
									{!! $handles->appends($keywords)->render() !!}
                            </div>
                        </div>
                    </div>
                   <!--分页 end-->

				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		<!--内容部分-->
@endsection
