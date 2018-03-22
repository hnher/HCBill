<!DOCTYPE html>
<html lang="zh-cn">
  	<head>
	    <meta charset="utf-8">
	    <title>登录</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Bootstrap core CSS -->
	    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome -->
		<link href="/css/font-awesome.min.css" rel="stylesheet">

		<!-- ionicons -->
		<link href="/css/ionicons.min.css" rel="stylesheet">
		
		<!-- Simplify -->
		<link href="/css/simplify.min.css" rel="stylesheet">
	
  	</head>

  	<body class="overflow-hidden light-background">
		<div class="wrapper no-navigation preload">
			<div class="sign-in-wrapper">
				<div class="sign-in-inner">
					<div class="login-brand text-center">
						<i class="fa fa-database m-right-xs"></i><strong class="text-skin">账单</strong> 管理后台
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
					<form action="{{ url('admin/login/login') }}" method="post">

						<div class="form-group m-bottom-md">
							<input type="text" class="form-control" name="email" placeholder="账户">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="密码">
						</div>
{{ csrf_field() }}
						<div class="form-group">
							<div class="custom-checkbox">
								<input type="checkbox" id="chkRemember">
								<label for="chkRemember"></label>
							</div>
							记住帐号
						</div>
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary btn-block margin-top-10">登 录</button>
							</div>
						</div>
					</form>
				</div><!-- ./sign-in-inner -->
			</div><!-- ./sign-in-wrapper -->
		</div><!-- /wrapper -->


	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		
		<!-- Jquery -->
		<script src="/js/jquery-1.11.1.min.js"></script>
		
	
  	</body>
</html>
