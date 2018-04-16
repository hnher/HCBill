<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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

</head>

<body class="overflow-hidden">
<div class="wrapper preload">
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <!--左侧nav begin-->
            <div class="main-menu">
                <ul class="accordion">
                    <li class="bg-palette1">
                        <a href="index.html">
                            <span class="menu-content block">
                                <span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
                                <span class="text m-left-sm">首页</span>
                            </span>
                            <span class="menu-content-hover block">
                                首页
                            </span>
                        </a>
                    </li>
                    <li class="openable bg-palette4">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-list-ul fa-lg"></i></span>
										<span class="text m-left-sm">微官网设置</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										微官网设置
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="menu_list.html"><span class="submenu-label">菜单</span></a></li>
                            <li><a href="banner.html"><span class="submenu-label">轮播图</span></a></li>
                        </ul>
                    </li>
                    <li class="openable bg-palette2">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
										<span class="text m-left-sm">学校</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										学校
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="school_list.html"><span class="submenu-label">学校管理</span></a></li>
                            <li><a href="#"><span class="submenu-label">学校类型</span></a></li>
                        </ul>
                    </li>
                    <li class="bg-palette2">
                        <a href="teacher_list.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-puzzle-piece fa-lg"></i></span>
										<span class="text m-left-sm">教师</span>
									</span>
									<span class="menu-content-hover block">
										教师
									</span>
                        </a>
                    </li>
                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-shopping-cart fa-lg"></i></span>
										<span class="text m-left-sm">文章</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										文章
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="article_list.html"><span class="submenu-label">文章管理</span></a></li>
                            <li><a href="article_type.html"><span class="submenu-label">文章类型</span></a></li>
                        </ul>
                    </li>
                    <li class="openable bg-palette4">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-list-ul fa-lg"></i></span>
										<span class="text m-left-sm">权限</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										权限
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="account.html"><span class="submenu-label">权限管理</span></a></li>
                            <li><a href="account_type.html"><span class="submenu-label">权限类型</span></a></li>
                        </ul>
                    </li>
                    <li class="bg-palette1">
                        <a href="users.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-weixin fa-lg"></i></span>
										<span class="text m-left-sm">会员管理</span>
									</span>
									<span class="menu-content-hover block">
										会员管理
									</span>
                        </a>
                    </li>
                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-file-image-o fa-lg"></i></span>
										<span class="text m-left-sm">权限管理</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										权限管理
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="account.html"><span class="submenu-label">账户管理</span></a></li>
                            <li><a href="account_type.html"><span class="submenu-label">权限类型</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--左侧nav end-->
            <div class="sidebar-fix-bottom clearfix">
                <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
            </div>
        </div><!-- sidebar-inner -->
    </aside>

    <!--内容部分-->
    <div class="main-container">
        <div class="padding-md" style="padding-bottom: 0 !important;">
            <div class="row">
			   <div class="col-lg-12">
					<div class="smart-widget">
						<div class="smart-widget-header">
							<i class="fa fa-university font-16"></i>
							您好 <strong class="text-danger">校长</strong>，这里是 <strong class="text-danger">河南职业技术学院</strong> 的数据概况！
						</div>
						<div class="smart-widget-inner padding-md clearfix">
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-dark m-bottom-md">
									<div class="statistic_text">
										<p><strong>冯校长</strong></p>
										<p>abcda124@163.com</p>
									</div>
									<div class="datastatistics">
										<i class="fa fa-eye"></i>
									</div>
								</div>
							</div><!--col-lg-3-->
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-danger m-bottom-md">
									<div class="statistic_text">
										<p><strong>541</strong>个</p>
										<p>年纪数量</p>
									</div>
									<div class="datastatistics">
										<i class="fa fa-eye"></i>
									</div>
								</div>
							</div><!--col-lg-3-->
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-success m-bottom-md">
									<div class="statistic_text">
										<p><strong>12</strong>个</p>
										<p>年级数量</p>
									</div>
									<div class="datastatistics">
										<i class="fa fa-eye"></i>
									</div>
								</div>
							</div><!--col-lg-3-->
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-info m-bottom-md">
									<div class="statistic_text">
										<p><strong>54</strong>个</p>
										<p>班级数量</p>
									</div>
									<div class="datastatistics">
										<i class="fa fa-eye"></i>
									</div>
								</div>
							</div><!--col-lg-3-->
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-warning m-bottom-md">
									<div class="statistic_text">
										<p><strong>45020</strong>个</p>
										<p>教师总数</p>
									</div>
									<div class="datastatistics">
										<i class="fa fa-eye"></i>
									</div>
								</div>
							</div><!--col-lg-3-->
							<div class="col-lg-2 col-sm-6 paddingLR-sm">
								<div class="statistic-box bg-primary m-bottom-md">
									<div class="statistic_text">
										<p><strong>55020</strong>个</p>
										<p>学生总数</p>
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

				

			</div><!--row-->


				

			</div><!--row-->
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
    <!--内容部分-->
    <footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger">商城</strong>
				</span>
        <p class="no-margin">
            &copy; 2016 <strong>商城</strong>. 版权所有.
        </p>
    </footer>
</div><!-- /wrapper -->

<a href="javascript:void(0);" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

		
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
		
		


	</body>
</html>
