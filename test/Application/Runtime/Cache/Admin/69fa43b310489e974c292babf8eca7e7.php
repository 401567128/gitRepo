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
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用毕业生留言板后台</p>
	<p>登录次数：<?php echo ($data["count"]); ?></p>
	<p>上次登录IP：<?php echo ($data["ip"]); ?>  上次登录时间：<?php echo ($data["lasttime"]); ?></p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>总留言数</th>
				<th>教师留言人数</th>
				<th>学生留言人数</th>
				<th>校友留言人数</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo ($all["all"]); ?></td>
				<td><?php echo ($all["alltea"]); ?></td>
				<td><?php echo ($all["allstu"]); ?></td>
				<td><?php echo ($all["allfri"]); ?></td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td><?php echo ($today["all"]); ?></td>
				<td><?php echo ($today["alltea"]); ?></td>
				<td><?php echo ($today["allstu"]); ?></td>
				<td><?php echo ($today["allfri"]); ?></td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td><?php echo ($yesterday["all"]); ?></td>
				<td><?php echo ($yesterday["alltea"]); ?></td>
				<td><?php echo ($yesterday["allstu"]); ?></td>
				<td><?php echo ($yesterday["allfri"]); ?></td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td><?php echo ($week["all"]); ?></td>
				<td><?php echo ($week["alltea"]); ?></td>
				<td><?php echo ($week["allstu"]); ?></td>
				<td><?php echo ($week["allfri"]); ?></td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td><?php echo ($month["all"]); ?></td>
				<td><?php echo ($month["alltea"]); ?></td>
				<td><?php echo ($month["allstu"]); ?></td>
				<td><?php echo ($month["allfri"]); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		
	</div>
</footer>
<script type="text/javascript" src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui/js/H-ui.js"></script> 
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>