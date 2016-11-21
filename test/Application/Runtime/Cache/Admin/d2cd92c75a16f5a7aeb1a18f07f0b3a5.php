<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
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
<script type="text/javascript" src="http://lib.h-ui.net/html5.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/respond.min.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/PIE_IE678.js"></script>
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

</head>
<body>

<article class="page-container">
    <form class="form form-horizontal" id="form-admin-edit" action="<?php echo U('Index/editAdmin');?>" method="post">
        <div class="row cl">
            <label class="form-label  col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
            <div class="formControls col-xs-7 col-sm-7">
                <input type="text" class="input-text" value="<?php echo ($data["username"]); ?>" placeholder="张三" id="adminName" name="username" disabled="disabled">
                <input type="hidden" value="<?php echo ($data["id"]); ?>" name="uid">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
            <div class="formControls col-xs-7 col-sm-7">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="pwd">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
            <div class="formControls col-xs-7 col-sm-7">
                <input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="pwd2">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-7 col-sm-7">
                <input type="text" class="input-text" value="<?php echo ($data["tel"]); ?>" placeholder="手机号码" id="phone" name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">权限：</label>
            <div class="formControls col-xs-7 col-sm-7">
                <?php if(isset($data["no1"])): ?><input type="text" class="input-text" value="您无需修改权限！" disabled="disabled">
                <?php else: ?> 
                    <?php if(isset($data["no2"])): ?><input type="checkbox" name="permissions[]" value="2" checked="checked"> 留言审核
                    <?php else: ?> 
                        <input type="checkbox" name="permissions[]" value="2"> 留言审核<?php endif; ?>
                    <?php if(isset($data["no3"])): ?><input type="checkbox" name="permissions[]" value="3" checked="checked"> 基本设置
                    <?php else: ?> 
                        <input type="checkbox" name="permissions[]" value="3"> 基本设置<?php endif; ?>
                    <?php if(isset($data["no4"])): ?><input type="checkbox" name="permissions[]" value="4" checked="checked"> 敏感词汇
                    <?php else: ?> 
                        <input type="checkbox" name="permissions[]" value="4"> 敏感词汇<?php endif; endif; ?>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button class="btn btn-primary radius" type="submit">  提交  </button>
            </div>
        </div>
    </form>
</article>

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
    
    $("#form-admin-edit").validate({
        rules:{
            username:{
                required:true,
                minlength:4,
                maxlength:16
            },
            pwd:{
                minlength:4,
                maxlength:16
            },
            pwd2:{
                minlength:4,
                maxlength:16,
                equalTo: "#password"
            },
            tel:{
                required:true,
                isPhone:true,
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