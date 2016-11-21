<?php if (!defined('THINK_PATH')) exit();?>﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 网站管理 <span class="c-gray en">&gt;</span> 基本设置 </a></nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-base" action="<?php echo U('Index/editBase');?>">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl"><span>基本设置</span></div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title" placeholder="（）届毕业生留言板" value="" class="input-text" name="title">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主题标语：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-Keywords" placeholder="文明修生，走向未来（最多八个字）" value="" class="input-text" name="slogan">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">留言内容：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最多输入200字" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,400)"></textarea>
						<p class="textarea-numberbar"><em class="textarea-length">0</em>/400</p>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>更换背景图片：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="file" name="image" size="15" enctype="multipart/form-data" maxlength="100" placeholder="jpg格式">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>更换背景音乐：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-description" placeholder="请填入网易云音乐的外链" value="" class="input-text" name="music">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>底部版权信息：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-copyright" placeholder="Copyright © 2016 zjweu.edu.cn All rights reserved.   浙江水利水电学院 版权所有" value="" class="input-text" name="footer">
					</div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");

	$("#form-base").validate({
        rules:{
            title:{
                required:true,
                maxlength:11
            },
            slogan:{
                required:true,
                maxlength:9,
            },
            rule:{
                required:true,
                maxlength:200,
            },
            music:{
                required:true,
            },
            footer:{
                required:true,
            },
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitButtons: 'button[type="submit"]',
        submitHandler:function(form){
            $(form).ajaxSubmit();
            var index = parent.layer.getFrameIndex(window.name);
            parent.$('.btn-refresh').click();
            parent.layer.close(index);
        }
    });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>