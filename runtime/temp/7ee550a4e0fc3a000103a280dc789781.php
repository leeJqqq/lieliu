<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp3\wamp64\www\lieliu\public/../application/admin\view\index\index.html";i:1525772038;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
	<title>网站后台管理系统</title>
	<style type="text/css">


		a {
			color: #ffffff;
		}

		.layui-nav-tree .layui-nav-child a {
			color: #ffffff\9;
			filter: alpha(opacity = 50); /*IE*/
		}

		.layui-this {
			background: #009688;
			color: #FFFFFF !important;
		}

		#home .layui-tab-close {
			display: none;
		}

		.layui-tab-content .layui-tab-item {
			z-index: 0;
			height:100%;
			padding-top:40px;
			box-sizing:border-box;

		}

	</style>

</head>

<body class="layui-layout-body " style="height:100%;">
<div class="layui-layout layui-layout-admin "  style="height:100%;">
	<div class="layui-header"   style="z-index:0;">
		<div class="layui-logo">网站后台管理系统</div>
		<!-- 头部区域（可配合layui已有的水平导航） -->
		<ul class="layui-nav layui-layout-right">
			<li class="layui-nav-item"><a href="javascript:;">admin
			</a>
			</li>
			<li class="layui-nav-item"><a href="<?php echo url('Login/logout'); ?>">退出</a>
			</li>
		</ul>
	</div>   


	<div class="layui-side layui-bg-black">
		<div class="layui-side-scroll">
			<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
			<ul class="layui-nav layui-nav-tree" lay-filter="navtab">
				<li class="layui-nav-item layui-this">
					<a href="#" data-url="">后台首页</a>
				</li>
				<li class="layui-nav-item ">
					<a href="#" data-url="<?php echo url('user/index'); ?>">用户管理</a>
				</li>
				<li class="layui-nav-item ">
					<a href="javascript:;" data-url="<?php echo url('order/orderlist'); ?>">订单管理</a>
				</li>
					<li class="layui-nav-item ">
					<a href="#" data-url="<?php echo url('task/index'); ?>">任务管理</a>
				</li>
				</li>
			    <li class="layui-nav-item ">
					<a href="#" data-url="<?php echo url('question/index'); ?>">问答管理</a>
				</li>
				<li class="layui-nav-item ">
					<a href="#" data-url="<?php echo url('news/index'); ?>">资讯管理</a>
				</li>
			   <li class="layui-nav-item ">
					<a href="#" data-url="<?php echo url('video/index'); ?>">视频教程管理</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="layui-body "
		 style=" bottom:0;">
		<!-- 内容主体区域 -->
		<div id="navtab"  style="height: 100%;position:relative;overflow-y: hidden;margin:0;" class="layui-tab" lay-allowClose="true" lay-filter="navtab">
			<ul class="layui-tab-title" style=" background: #ffffff;width:100%;height:40px;position: fixed;z-index:9999; top:60px;padding-left:200px;box-sizing: border-box;">
				<li id="home" lay-id="home" class="layui-this">后台首页</li>
			</ul>
			<div class="layui-tab-content"style="height:100%;padding:0;">
				<div class="layui-tab-item layui-show" style="">
					<iframe src=""  style="width: 100%;height:100%;"	frameborder="0"></iframe>
				</div>
			</div>
		</div>


	</div>


</div>

<script src="/static/js/jquery-3.2.1.min.js"></script>
<script src="/static/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    var currentIframeId=0;
    var navtab
    layui.config({
        base : '/static/js/'
    }).use([ 'jquery', 'element', 'navtab' ], function() {
        window.jQuery = window.$ = layui.jquery;
        var element = layui.element;
        navtab = layui.navtab({
            elem : '#navtab'
        });

        $(".layui-nav").find("[data-url]").on("click", function() {
            var def=$.Deferred();
            if ($(this).text() == "后台首页") {
                element.tabChange('navtab', 'home');
                return;
            }
            var data = {
                title : $(this).text(),
                href : $(this).attr("data-url")
            }
            var iframeid = navtab.tabAdd(data);

        })

    });

</script>

</body>

</html>