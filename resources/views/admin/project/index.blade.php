@extends('admin.layouts.app')
@section('title','项目名')
@section('css')
	    <!-- Bootstrap core CSS -->
	    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome -->
		<link href="/css/font-awesome.min.css" rel="stylesheet">

		<!-- ionicons -->
		<link href="/css/ionicons.min.css" rel="stylesheet">
		
		<!-- Simplify -->
		<link href="/css/simplify.min.css" rel="stylesheet">
	
		<!-- cccss -->
		<link href="/css/ccadd.min.css" rel="stylesheet">
@endsection
@section('centent')

		<!--内容部分-->
			<div class="main-container">
				<div class="padding-md">

                <!--当前位置 begin-->
                    <h3 class="header-text">项目名列表</h3>
                <!--当前位置 end-->


					<table class="table table-striped ccad_table">
						<thead>
							<tr>
								<th>id</th>
								<th>名字</th>
								<th><a href="{{ url('admin/project/add')  }}" class="label label-danger"><i class="fa fa-plus-square-o"></i> 添加新项目名</a></th>
							</tr>
						</thead>

						<tbody>
						@foreach($projecteds as $projected)
							<tr>
								<td>{{ $projected->id }}</td>
								<td>{{ $projected->project_name }}</td>

                                <td class="nscs-table-handle">
                                    <span><a href="{{ url('admin/project/edit',['id'=>$projected->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                                    <span><a href="{{ url('admin/project/delete',['id'=>$projected->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
                                </td>  
							</tr>
						@endforeach
						</tbody>
					</table>
                   <!--分页 begin-->
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{--{{  }}--}}
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

	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		
		<!-- Jquery -->
		<script src="/js/jquery-1.11.1.min.js"></script>
		
		<!-- Bootstrap -->
	    <script src="/bootstrap/js/bootstrap.min.js"></script>
		
		
		<!-- Slimscroll -->
		<script src='/js/jquery.slimscroll.min.js'></script>

		
		<!-- Simplify -->
		<script src="/js/simplify/simplify.js"></script>
@endsection