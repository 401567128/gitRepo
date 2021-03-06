<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/test/Public/Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>基本设置</title>
</head>
<body>
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页 
		<span class="c-gray en">&gt;</span> 系统管理 
		<span class="c-gray en">&gt;</span> 基本设置 
	</nav>
	<form action="<?php echo U('Index/doBlackList');?>" method="post">
	<div class="page-container">
  		<div>
		    <textarea class="textarea" style="width:98%; height:300px; resize:none" name="blackList"><?php echo ($content); ?></textarea>
  		</div>
  		<div class="mt-20 text-c">
  			<button name="system-base-save" id="system-base-save" class="btn btn-primary radius" type="submit">
  				<i class="icon-ok"></i> 提交
  			</button>
  		</div>
	</div>
	</form>
<script type="text/javascript" src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/Validform/5.3.2/Validform.min.js"></script>  
<script type="text/javascript" src="/test/Public/Admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/test/Public/Admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/js/H-ui.admin.system.js"></script>

</body>
</html>