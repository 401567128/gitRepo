<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
    <title>毕业生留言界面</title>
      <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="/test/Public/css/Home/Index/style.css"/>
      <link rel="stylesheet" type="text/css" href="/test/Public/Admin/lib/icheck/icheck.css" />
      <script type="text/javascript" src='/test/Public/js/Home/Index/jquery-1.7.2.min.js'></script>
      <script type="text/javascript" src='/test/Public/js/Home/Index/index.js'></script><!-- 便签效果 -->
    <style>
      body{
        background-color: transparent;
      }
    </style>
    <script type="text/javascript">
    $(function(){
        $("#saytext").keyup(function(){
            var len=$(this).val().length;
            if(len>400){
                $(this).val($(this).val().substring(0,399));
            }else{
                var num=len;
                $("#word").text(num);
            }
        });
    });
    </script>
</head>
<body>
    <div class="tab-pane" id="message">
        <form class="form form-horizontal" id="form-msg-add" action="<?php echo U('Index/msgAdd');?>" method="post">
        <div class="container">
            <div class="warning col-md-4">
                <span class="warn_title">留言注意事项</span><br><br>
                <span class="warn_content"><?php echo ($base["rule"]); ?></span>
            </div>
            <div class="form-group col-md-4"> 
                <input type="text" class="form-control " placeholder="请输入名字" name="name" autocomplete="off" id="name">
                <label id="name-error" class="error" for="name" style="display: block;"></label>
                <div class="radio" style="color:#fff">
                    <label class="checkbox-inline col-md-7 col-md-offset-1">
                        <input type="radio" name="sex" value="1" checked id="sex"> <!-- 男 -->
                        <img src="/test/Public/image/Home/Index/paper_man.png" width="40" height="45">
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="sex" value="0" id="sex"> <!-- 女 -->
                        <img src="/test/Public/image/Home/Index/paper_woman.png" width="40" height="45">
                    </label>
                </div>
                <div class="nickname">
                    <input type="text" class="form-control" autocomplete="off" id="nickname" placeholder="请输入昵称" name="nickname">
                </div>
                <div class="person">
                    <label for="person" style="color:#fff;">选择人员类别</label>
                    <select class="form-control" name="type" id="type">
                        <option value="0">学生</option>
                        <option value="1">教师</option>
                        <option value="2">校友</option>
                    </select>
                </div>
                <div class="pess">
                    <input type="text" class="form-control" placeholder="请输入专业班级（如：水工15-1）" name="class" autocomplete="off" id="class">
                </div>
                <div class="telphone">
                    <input type="text" class="form-control" autocomplete="off" placeholder="请输入联系方式" name="tel" id="tel">
                </div>
                <div class="note">
                    <label for="name" style="color:#fff;">留言内容：</label>
                    <textarea class="input form-control" autocomplete="off" id="saytext" name="msg"></textarea>
                    <div class="word">
                        <span id="word">0</span><span>/400</span>
                    </div>
                    <p><span class="emotion">表情</span></p>
                    <input class="btn btn-primary radius pull-right" type="submit" value="提交">
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
<script src="/test/Public/js/jquery.min.js"></script>
<script src="/test/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/icheck/jquery.icheck.min.js"></script>  
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/test/Public/js/jquery-browser.js"></script><!-- 表情以名称的形式显示在文本域 -->
<script type="text/javascript" src="/test/Public/js/Home/Index/jquery.qqFace.js"></script><!-- 表情的显示 -->
<script type="text/javascript">
$(function(){
    $('.emotion').qqFace({
        id : 'facebox', 
        assign:'saytext', 
        path:'/test/Public/image/Home/QQFace/' //表情存放的路径
    });
    $("#form-msg-add").validate({
        rules:{
            name:{
                required:true,
                minlength:2,
                maxlength:10
            },
            nickname:{
                required:true,
                minlength:2,
                maxlength:12
            },
            class:{
                required:true,
                minlength:2,
                maxlength:10
            },
            tel:{
                required:true,
                isPhone:true,
                maxlength:11
            },
            msg:{
                required:true,
                maxlength:400,
                minlength:10
            },
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitButtons: 'input[type="submit"]',
        submitHandler:function(form){
           layer.confirm('留言要在审核通过后才能显示！', {
                btn: ['确定','取消'], //按钮
                shade: false //不显示遮罩
            }, 
            function(){
                $.post("<?php echo U('Index/msgAdd');?>", {
                    name:$('#name').val(),
                    sex:$('#sex').val(),
                    nickname:$('#nickname').val(),
                    type:$('#type').val(),
                    class:$('#class').val(),
                    msg:$('#msg').val(),
                    tel:$('#tel').val(),
                    msg:$('#saytext').val()
                }, function(res) {
                    if(res.state == 1) {
                        layer.msg(res.message, {icon: 1, time: 1000});
                        document.getElementById("form-msg-add").reset();
                    }else if(res.state == 2){
                        layer.msg(res.message, {icon: 2, time: 1000});
                    }else{
                        layer.msg(res.message, {icon: 2, time: 1000});
                        document.getElementById("form-msg-add").reset();
                    }
                });
            }, 
            function(){
                layer.msg('已取消！', {time: 1000});
            });
        }
    });
});
</script>
</html>