<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/test/Public/css/Home/Index/style.css"/>
    <script type="text/javascript" src='/test/Public/js/Home/Index/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='/test/Public/js/Home/Index/index.js'></script>
    <title>留言便条</title>
    <style>
      body{
        background-color: transparent;
      }
    </style>
</head>
<body>
      <!-- 首页便签效果显示开始 -->
      <div class="tab-pane" id="main">
        <div class="container">
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class='paper a<?php echo rand(1,5);?>'>
              <dt>
                  <span class='username'><?php echo ($vo["nickname"]); ?></span>
                  <span class='num'>No.<?php echo ($vo["id"]); ?></span>
              </dt>
              <dd class='content'>
                  <?php echo ($vo["msg"]); ?>
              </dd>
              <dd class='bottom'>
                  <span class='time'><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span>
                  <?php if($vo["sex"] == 1): ?><span class="head_pic">
                      <img src="/test/Public/image/Home/Index/paper_man.png" width="40" height="45">
                    </span>
                    <?php else: ?>
                      <span class="head_pic">
                        <img src="/test/Public/image/Home/Index/paper_woman.png" width="40" height="45">
                      </span><?php endif; ?>
                  <a href="" class='close'></a>
              </dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      <!-- 首页便签效果结束 -->    
</body>
<script src="/test/Public/js/jquery.min.js"></script>
<script src="/test/Public/js/bootstrap.min.js"></script>
</html>