<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
    <title>留言列表</title>
    <link rel="stylesheet" href="/test/Public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/test/Public/css/Home/Index/style.css"/>
    <script type="text/javascript" src='/test/Public/js/Home/Index/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='/test/Public/js/Home/Index/index.js'></script>
    <style>
      body{
        background-color: transparent;
      }
      .rows{
        display: none!important;
      }
      .next{
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
      }
      #msg_td a{
        color: #333;
        text-decoration: none;
      }
      #msg_td a span{
        font-size: 12px;
        color: #3AAACF;
      }
    </style>
    <script>
        $(document).ready(function(){
            $("tr:not(:first)").mouseover(function(e){
                $(this).addClass('table_change');
            });
            $("tr").mouseout(function(e){
                $(this).removeClass('table_change');
            })
        });
    </script>
</head>
<body>
    <div class="container">
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
                        <td id="msg_td">
                            <?php if($user["num"] > 90): ?><a href="javascript:;" onclick="showMsg(<?php echo ($user["id"]); ?>)" data-uid="<?php echo ($user["id"]); ?>"><?php echo (mb_substr($user["msg"],0,90,utf8)); ?>...<span>点击查看详细留言</span></a>
                                <div id="div1" style="display:none"></div>
                                <?php else: echo ($user["msg"]); endif; ?>
                        </td>
                        <td><?php echo (date("Y-m-d H:i:s",$user["time"])); ?></td>
                    </tr><?php endforeach; endif; ?>
                </table>
        </div>
        <!-- 分页显示开始 -->
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
        <div class="paging">
          <div class="container">
              <nav style="text-align: center">
                <div class="pagination">
                     <?php echo ($page); ?>
                </div>
              </nav>
          </div>
        </div>

        <!-- 分页显示结束 -->
    </div>
</body>
<script>
function showMsg(id){
  $(function(){
    $.post('<?php echo U("Index/showMsg");?>', {uid: id}, function(data) {
      layer.open({
        title: "留言详情",
        type: 1,
        area: ['600px', '300px'],
        shade: 0.3,
        moveType: 1,
        shadeClose: true, //点击遮罩关闭
        content:data
      });
    })
  })
}
</script>
<script src="/test/Public/js/jquery.min.js"></script>
<script src="/test/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/laypage/1.2/laypage.js"></script> 
</html>