<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/test/Public/css/Admin/Login/login.css">
    <title>后台登录界面</title>
</head>
<body>  
    <div class="login">
    <div class="message">毕业生留言板后台管理系统</div>
    <div class="darkbannerwrap"></div>
    <form action="<?php echo U('Login/login');?>" method="post">
        <input name="username" placeholder="用户名" type="text" class="username" autocomplete="off">
        <input name="pwd" placeholder="密码" type="password" class="pswd">
        <input name="code" placeholder="验证码" type="text" class="yzm" autocomplete="off">
        <div class="pic">
            <img src="<?php echo U('Login/verify');?>" alt="验证码">
        </div> 
        <input value="登录" style="width:100%;" type="submit" class="btn_login">
        <!-- 帮助 <a onClick="alert('请联系管理员')">忘记密码</a> -->
    </form>
</div>
</body>
<script src="/test/Public/js/jquery.min.js"></script>
<script src="/test/Public/js/bootstrap.min.js"></script>
</html>