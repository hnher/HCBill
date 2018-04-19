<!DOCTYPE html>
<html lang="zh-cn">
  	<head>
	    <meta charset="utf-8">
	    <title>404</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Bootstrap core CSS -->
	    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Simplify -->
		<link href="/css/simplify.min.css" rel="stylesheet">


		<link href="/css/web_style.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/js/fontfile.js"></script>
	
  	</head>

  	<body class="overflow-hidden light-background">
		<div class="wrapper no-navigation preload">
			<div class="error-wrapper">
				<div class="error-inner">
					<div class="error-type">503</div>

					<div class="errorprompt">
						<p><span id="times">3</span> 秒后返回首页</p>
					</div>
					<h1>服务器临时维护</h1>
					<p>看起来像服务器临时维护。再次输入地址或从主页开始。</p>

				</div><!-- ./error-inner -->
			</div><!-- ./error-wrapper -->
		</div><!-- /wrapper -->


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

		<script>
			$(function()	{
				setTimeout(function() {
					$('.error-type').addClass('animated');
				},100);
			});
		</script>

		<script>
            var i = 2;
            var intervalid;
            intervalid = setInterval("fun()", 1000);
            function fun() {
                if (i == 0) {
                    window.location.href = "{{ url('admin/bill') }}";
                    clearInterval(intervalid);
                }
                document.getElementById("times").innerHTML = i;
                i--;
            }
		</script>

	</body>
</html>
