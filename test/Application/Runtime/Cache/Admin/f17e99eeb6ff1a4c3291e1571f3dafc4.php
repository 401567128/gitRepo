<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="webkit|ie-comp|ie-stand" name="renderer">
                <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
                    <meta content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
                    <meta content="no-siteapp" http-equiv="Cache-Control"/>
                    <link href="/favicon.ico" rel="Bookmark">
                        <link href="/favicon.ico" rel="Shortcut Icon"/>
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
                        <title>
                            添加管理员 - 管理员管理 - H-ui.admin v2.4
                        </title>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <nav class="breadcrumb">
            <i class="Hui-iconfont">
                
            </i>
            首页
            <span class="c-gray en">
                >
            </span>
            管理员管理
            <span class="c-gray en">
                >
            </span>
            修改密码
        </nav>
        <article class="page-container">
            <form class="form form-horizontal" id="form-admin-changepwd" action="<?php echo U('Index/changePwd');?>" method="post">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">
                        <span class="c-red">
                            *
                        </span>
                        用户名：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <?php echo ($_SESSION['userinfo']['username']); ?>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">
                        <span class="c-red">
                            *
                        </span>
                        初始密码：
                    </label>
                    <div class="formControls col-md-3 col-xs-8 col-sm-9">
                        <input autocomplete="off" class="input-text" id="password" name="oldpwd" placeholder="密码" type="password" value="">
                        </input>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">
                        <span class="c-red">
                            *
                        </span>
                        新密码：
                    </label>
                    <div class="formControls col-md-3 col-xs-8 col-sm-9">
                        <input autocomplete="off" class="input-text" id="newpassword" name="newpwd" placeholder="修改的新密码" type="password">
                        </input>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">
                        <span class="c-red">
                            *
                        </span>
                        确认密码：
                    </label>
                    <div class="formControls col-md-3 col-xs-8 col-sm-9">
                        <input class="input-text" id="newpassword2" name="newpwd2" placeholder="确认新密码" type="password" value="">
                        </input>
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
        <script src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/lib/layer/2.1/layer.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/lib/icheck/jquery.icheck.min.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.min.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.min.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/static/h-ui/js/H-ui.js" type="text/javascript">
        </script>
        <script src="/test/Public/Admin/static/h-ui.admin/js/H-ui.admin.js" type="text/javascript">
        </script>
        <!--/_footer /作为公共模版分离出去-->
        <!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#form-admin-changepwd").validate({
        rules:{
            oldpwd:{
                required:true,
            },
            newpwd:{
                required:true,
                minlength:6,
            },
            newpwd2:{
                required:true,
                minlength:6,
                equalTo: "#newpassword"
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