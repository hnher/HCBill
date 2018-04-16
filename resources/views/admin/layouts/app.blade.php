<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/ccadd.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">

    <script src="/js/jquery-2.1.3.min.js"></script>

    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!-- Morris -->
    <link href="/css/morris.css" rel="stylesheet"/>

    <!-- Datepicker -->
    <link href="/css/datepicker.css" rel="stylesheet"/>

    <!-- Animate -->
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="/css/indexoptim.css" rel="stylesheet">

    <!-- echarts.min -->
    <script src="/js/echarts.min.js"></script>

    @yield('css')

</head>

<body class="overflow-hidden">
<div class="wrapper preload">
    <header class="top-nav">
        <div class="top-nav-inner">

            <div class="nav-header">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav-notification pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>
                        <ul class="dropdown-menu dropdown-sm pull-right">
                            <li class="user-avatar">
                                <img src="/images/profile/profile9.jpg" alt="" class="img-circle">
                                <div class="user-content">
                                    <h5 class="no-m-bottom">窄屏显示</h5>
                                    <div class="m-top-xs">
                                        <a href="Changepassword.html" class="m-right-sm">修改密码</a>
                                        <a href="login.html">退出</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="{{ url('admin/bill') }}" class="brand">
                    <i class="fa fa-home"></i><span class="brand-name">管理后台</span>
                </a>
            </div>

            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="pull-right m-right-sm">
                    <div class="user-block hidden-xs">
                        <a href="index.html" id="userToggle" data-toggle="dropdown">
                            <img src="/images/profile/profile9.jpg" alt="" class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                {{ Auth::user()->name }}
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">
                            <div class="panel-body paddingTB-sm">
                                <ul>
                                    <li>
                                        <a href="{{ url('admin/user/edit') }}">
                                            <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">修改密码</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/login/logout') }}">
                                            <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">退出</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ./top-nav-inner -->
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <!--左侧nav begin-->
            <div class="main-menu">
                <ul class="accordion">

                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-graduation-cap fa-lg"></i></span>
										<span class="text m-left-sm">账单管理</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										账单管理
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('admin/bill/add') }}"><span class="submenu-label">添加账单</span></a></li>
                            <li><a href="{{ url('admin/bill') }}"><span class="submenu-label">账单列表</span></a></li>
                        </ul>
                    </li>


                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-graduation-cap fa-lg"></i></span>
										<span class="text m-left-sm">项目管理</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										项目管理
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('admin/project/add') }}"><span class="submenu-label">添加项目</span></a></li>
                            <li><a href="{{ url('admin/project') }}"><span class="submenu-label">项目列表</span></a></li>
                        </ul>
                    </li>

                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-graduation-cap fa-lg"></i></span>
										<span class="text m-left-sm">经手人管理</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										经手人管理
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('admin/handle/add') }}"><span class="submenu-label">添加经手人</span></a></li>
                            <li><a href="{{ url('admin/handle') }}"><span class="submenu-label">经手人列表</span></a></li>
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
@yield('centent')


{{--添加删除成功弹出框结尾--}}
    <!--内容部分-->

</div><!-- /wrapper -->

<a href="javascript:void(0);" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

<script src='/js/modernizr.min.js'></script>

<script src="/js/simplify/simplify.js"></script>

<script src='/js/jquery.slimscroll.min.js'></script>

<script  src="/js/layer/layer.js"></script>
{{--添加删除成功弹出框--}}
@if(Session::has('status'))
    <script>
        layer.msg("{{Session::get('status')['msg']}}");
    </script>
    {{--layer.msg('玩命提示中');--}}
@endif
@yield('js')
	</body>
</html>
