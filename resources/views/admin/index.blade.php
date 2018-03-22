@extends('admin.layouts.app')
@section('title','首页');
@section('css')
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">

    <!-- Morris -->
    <link href="/css/morris.css" rel="stylesheet"/>

    <!-- Datepicker -->
    <link href="/css/datepicker.css" rel="stylesheet"/>

    <!-- Animate -->
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">
    
    <!-- Simplify -->
    <link href="/css/indexoptim.css" rel="stylesheet">

		<!-- Jquery -->
		<script src="/js/jquery-1.11.1.min.js"></script>
		
		<!-- echarts.min -->
		<script src="/js/echarts.min.js"></script>
@endsection
@section('centent')

    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md" style="padding-bottom: 0 !important;">
            <div class="row">
			   <div class="col-lg-12">
					<div class="smart-widget">
						<div class="smart-widget-header">
							<i class="fa fa-university font-16"></i>
							您好 <strong class="text-danger">先生</strong>，这里是 <strong class="text-danger">您的后台页面</strong> 的数据概况！
						</div>
					</div>
			   </div>
			</div>
		</div>
	</div>

    <!--内容部分-->
@endsection
@section('js')
		<!-- Bootstrap -->
	    <script src="/bootstrap/js/bootstrap.min.js"></script>
	  
		<!-- Flot -->
		<script src='/js/jquery.flot.min.js'></script>

		<!-- Slimscroll -->
		<script src='/js/jquery.slimscroll.min.js'></script>
		
		<!-- Morris -->
		<script src='/js/rapheal.min.js'></script>	
		<script src='/js/morris.min.js'></script>	

		
		<!-- Simplify -->
		<script src="/js/simplify/simplify.js"></script>
@endsection