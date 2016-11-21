<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>毕业生留言板</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
  <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="/test/Public/css/Home/Index/style.css"/>

  <script type="text/javascript" src='/test/Public/js/Home/Index/jquery-1.7.2.min.js'></script>
  <link rel="stylesheet" type="text/css" href="/test/Public/Admin/lib/icheck/icheck.css" />
  <style type="text/css">
      body{
        background: url("/test/Public/image/Home/Index/bg3.jpg") no-repeat center center;
      }
      @media only screen and (max-width : 1500px) {
      body{
          background: url("/test/Public/image/Home/Index/bg5.jpg") no-repeat center center; 
          }
      }
  </style>
  <script>
    $("document").ready(function(){ 
        $(".nav li").click(function(){
            $(".nav li").removeClass("active");//首先移除全部的active
            $(this).addClass("active");//选中的添加acrive
        });
    });
  </script>
  <script type="text/javascript" language="javascript">
    function iFrameHeight() {
        var ifm= document.getElementById(" iframepage");
        var subWeb = document.frames ? document.frames["iframepage"].document :ifm.contentDocument;
            if(ifm != null && subWeb != null) {
            ifm.height = subWeb.body.scrollHeight;
            }
    }

</script> 
</head>
<body>
<div class="contain">
    <!-- 网页头部效果开始 -->
    <div class="header">
        <div class="container">
            <div class="logo col-md-4">
                <img src="/test/Public/image/Home/Index/logo.png"/><br/>
            </div>
            <div class="header-title col-md-4">
                <?php echo ($base["title"]); ?>
            </div>
            <!-- 右上角标语开始 -->
            <div class="wrap col-md-4">
                <span class="ribbon6">
                    <?php echo ($base["slogan"]); ?>
                </span>
            </div>
            <!-- 右上角标语结束 -->
        </div>
    </div>
    <!-- 网页头部效果结束 -->
    <div class="container">
        <nav class="navbar" role="navigation">
        <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="indexpage.html" target="iframe_container">首页</a></li>
                    <li><a href="message.html" target="iframe_container">留言</a></li>
                    <li><a href="msglist.html" target="iframe_container">留言列表</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
      <!-- 导航栏结束 -->
    </div>
    <!-- 主要部分的切换开始 -->
    <div class="iframe_box" style="position: absolute;z-index:1;">
        <iframe scrolling="yes" name="iframe_container" id="iframepage" width="100%" height="100%" frameborder="0" src="indexpage.html" allowTransparency="true" onLoad="iFrameHeight()"></iframe>
    </div>
    <!-- 主要部分的切换结束 -->
  <!--尾部网页信息开始-->
    <div class="footer" style="z-index:1;">
        <div class="container">
            <p class="col-md-8"><?php echo ($base["footer"]); ?></p>
            <a href="<?php echo U('Admin/Login/index');?>" class="pull-right" target="_blank">管理员入口</a>
        </div>
    </div>
  <!--尾部网页信息结束-->
</div>
<!--音乐部分开始(网易云音乐生成的音乐外链)-->
<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=298 height=52 src="<?php echo ($base["music"]); ?>" style="display:none"></iframe>
<!--音乐部分结束-->
</body>
<script src="/test/Public/js/jquery.min.js"></script>
<script src="/test/Public/js/bootstrap.min.js"></script>
</html>