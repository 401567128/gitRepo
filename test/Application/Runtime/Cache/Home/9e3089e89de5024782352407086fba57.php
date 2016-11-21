<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>毕业生留言板</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="/test/Public/css/Home/Index/style.css"/>
  <link rel="stylesheet" type="text/css" href="/test/Public/Admin/lib/icheck/icheck.css" />
  <script type="text/javascript" src='/test/Public/js/Home/Index/jquery-1.7.2.min.js'></script>
  <script type="text/javascript" src='/test/Public/js/Home/Index/index.js'></script><!-- 便签效果 -->
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
  })
  </script><!-- 计算文本框中的字数并显示 -->
  <script>
        $(document).ready(function(){
            $("tr").mouseover(function(e){
                $(this).addClass('table_change');
            });
            $("tr").mouseout(function(e){
                $(this).removeClass('table_change');
            })
        });
    </script>
    <!-- 留言列表里的按钮移上去的效果 -->
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
    <!-- 导航栏开始 -->
      <ul id="myTab" class="nav">
        <li class="active">
          <a href="#main" data-toggle="tab">
            首页
          </a>
        </li>
        <li><a href="#message" data-toggle="tab">留言</a></li>
        <li><a href="#list" data-toggle="tab">留言列表</a></li>
      </ul>
      <!-- 导航栏结束 -->
    </div>
    <div id="myTabContent" class="tab-content">
      <!-- 首页便签效果显示开始 -->
        <div class="tab-pane fade in active" id="main">
            <div class="container tab-pane fade in active">
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
      <!-- 留言开始 -->
        <div class="tab-pane fade" id="message">
            <form class="form form-horizontal" id="form-msg-add" action="<?php echo U('Index/msgAdd');?>" method="post">
            <div class="container">
                <div class="warning col-md-4">
                    <span class="warn_title">留言注意事项</span><br><br>
                    <span class="warn_content"><?php echo ($base["rule"]); ?></span>
                </div>
                <div class="form-group col-md-4"> 
                    <input type="text" class="form-control " placeholder="请输入名字" name="name" autocomplete="off" id="name">
                    <div class="radio" style="color:#fff">
                        <label class="checkbox-inline col-md-7 col-md-offset-1">
                            <input type="radio" name="sex" value="1" checked id="sex">
                            <img src="/test/Public/image/Home/Index/paper_man.png" width="40" height="45">
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="sex" value="0" id="sex">
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
                        <textarea class="input form-control" autocomplete="off" id="saytext" name="msg" style="width:350px;height:100px;" ></textarea>
                        <div class="word"><span id="word">0</span><span>/400</span></div>
                        <p><span class="emotion">表情</span></p>
                        <input class="btn btn-primary radius pull-right" type="submit" id='addMsg' value="提交">
                    </div>
                </div>
            </div>
            </form>
        </div>
                
      <!-- 留言结束 -->
      <!-- 留言列表开始 -->
      <div class="tab-pane fade" id="list">
         <div class="container tab-pane fade in active">
            <div class="panel panel-default">
                <table class="table">
                    <tr>
                        <th class="col-md-1">#ID</th>
                        <th class="col-md-1">姓名</th>
                        <th class="col-md-1">专业班级</th>
                        <th class="col-md-7">留言内容</th>
                        <th class="col-md-1">留言时间</th>
                    </tr>
                    <?php if(is_array($select)): foreach($select as $key=>$user): ?><tr>
                        <td><?php echo ($user["id"]); ?></td>
                        <td><?php echo ($user["name"]); ?></td>
                        <td><?php echo ($user["class"]); ?></td>
                        <td><?php echo ($user["msg"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$user["time"])); ?></td>
                    </tr><?php endforeach; endif; ?>
                </table>
            </div>
          </div>
        <!-- 分页显示开始 -->
        <div class="paging">
            <?php echo ($page); ?>
        </div>
        <!-- <div class="paging">
          <div class="container">
              <nav style="text-align: center">
                <ul class="pagination">
                  <li><a href="#">上一页</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">下一页</a></li>
                </ul>
              </nav>
          </div>
        </div> -->
        <!-- 分页显示结束 -->
      </div>
      <!-- 留言列表结束 -->
    </div>
  <!--尾部网页信息开始-->
  <div class="footer">
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
            },
            nickname:{
                required:true,
            },
            class:{
                required:true,
                minlength:2,
            },
            tel:{
                required:true,
                isPhone:true,
            },
            msg:{
                required:true,
                maxlength:400,
            },
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitButtons: 'input[type="submit"]',
        submitHandler:function(form){
            // $(form).ajaxSubmit();
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
                    // setTimeout(function(){location.reload();}, 1000);
                });
            }, 
            function(){
                layer.msg('已取消！', {time: 1000});
            });
        }
    });



    // $('.next').click(function(){ 
    //     $.ajax({
    //         type: "GET",
    //         url:$(this).attr('href'),    //取得a标签链接地址
    //         beforeSend:function(){
    //             $("#lcontent").text("请稍等!");
    //         },
    //         success:function(data){ 
    //             $('#lcontent').html(data);     //将数据重新加载到lcontent容器中
    //         }
    //     });
    //         return false;     //使a标签失效
    // }) 


});
//查看结果
function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/test/Public/image/Home/QQFace/$1.gif" border="0" />');
    return str;
}



</script>
</html>