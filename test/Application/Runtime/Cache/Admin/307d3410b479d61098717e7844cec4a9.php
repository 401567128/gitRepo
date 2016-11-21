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
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>留言列表</title>
<style>
/*分页样式*/
.pages{
	margin-top: 20px;
	float: right;
}
.pages a,.pages span {
    display:inline-block;
    padding:2px 5px;
    margin:0 1px;
    border:1px solid #f0f0f0;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    border-radius:3px;
}
.pages li{
	margin-left: 20px;
}
.pages a,.pages li{
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#58A0D3;
}
.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
    margin:0;
}
.pages a:hover{
    border-color:#50A8E6;
}
.pages span.current{
    background:#50A8E6;
    color:#FFF;
    font-weight:700;
    border-color:#50A8E6;
}
/*检索框样式*/
#DataTables_Table_0_filter{
	margin-bottom: 10px;
}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 留言管理 <span class="c-gray en">&gt;</span> 留言列表</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a id="allDelete" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a id="allPass" class="btn btn-success radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量审核</a>
			<a id="outExcel" href="<?php echo U('Index/outExcel');?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6e2;</i> 导出数据</a>
			<a id="truncate" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i>清空ID</a>
			

		 </span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="30">ID</th>
					<th width="40">姓名</th>
					<th width="50">人员类别</th>
					<th width="80">专业班级</th>
					<th width="100">电话</th>
					<th>留言内容</th>
					<th width="120">留言时间</th>
					<th width="60">发布状态</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<form action="">
			<tbody>
				<?php if(is_array($select)): foreach($select as $key=>$user): ?><tr class="text-c">
					<td><input type="checkbox" value="<?php echo ($user["id"]); ?>" name="id[]"></td>
					<td><?php echo ($user["id"]); ?></td>
					<td><?php echo ($user["name"]); ?></td>
					<td>
					    <?php if($user["type"] == 0): ?>学生
					    <?php elseif($user["type"] == 1): ?>教师
					    <?php else: ?>校友<?php endif; ?>
					</td>
					<td><?php echo ($user["class"]); ?></td>
					<td><?php echo ($user["tel"]); ?></td>
					<td class="text-l">
						<span style="cursor:pointer" class="text-primary"><?php echo ($user["msg"]); ?></span>
					</td>
					<td><?php echo (date("Y-m-d H:i:s",$user["time"])); ?></td>
					<td class="td-status">
						<?php if($user["locked"] == 0): ?><span class="label label-success radius">已审核</span>
					        <?php else: ?> <span class="label label-default radius">未审核</span><?php endif; ?>
					</td>
					<td class="f-14 td-manage">
						<?php if($user["locked"] == 0): ?><a style="text-decoration:none" onClick="article_stop(this,<?php echo ($user["id"]); ?>)" href="javascript:;" title="下架">
								<i class="Hui-iconfont">&#xe6de;</i>
							</a>
					    	<?php else: ?>
					        	<a style="text-decoration:none" onClick='article_start(this,<?php echo ($user["id"]); ?>)' href="javascript:;" title="启用">
					        		<i class="Hui-iconfont">&#xe615;</i>
								</a><?php endif; ?>
						<!-- <a style="text-decoration:none" class="ml-5" onClick="article_edit('留言编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i> -->
						</a>
						<a style="text-decoration:none" class="ml-5" onClick="article_del(this,<?php echo ($user["id"]); ?>)" href="javascript:;" title="删除">
							<i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
			</form>
		</table>
		<div class="pages">
			<?php echo ($page); ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="/test/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/test/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
//批量删除
$('#allDelete').click(function() {
	var chk_value =[];
	$('input[name="id[]"]:checked').each(function(){
		chk_value.push($(this).val());
	});

    if($(':checked').size() > 0) {
      	layer.confirm('确定要删除吗？', {
        	btn: ['确定','取消'], //按钮
        	shade: false //不显示遮罩
      	}, 
      	function(){
        	$.post("<?php echo U('Index/allDelete');?>", {data :chk_value}, function(res) {
          		if(res.state == 1) {;
            		layer.msg(res.message, {icon: 2, time: 1000});
          		}else{
            		layer.msg(res.message, {icon: 1, time: 1000});
          		}
          		setTimeout(function() {
            		location.reload();
          		}, 1000);
        	});
    	},
    	function(){
    		layer.msg('取消了删除！', {time: 1000});
   		});
 	} else {
      layer.alert('没有选择！');
    }
});
$('#truncate').click(function() {
	layer.confirm('确定要删除吗？该操作将会导致数据表清空！请确认导出数据库之后再进行该操作！', {
        	btn: ['确定','取消'], //按钮
        	shade: false //不显示遮罩
      	}, 
      	function(){
        	window.location.href="<?php echo U('Index/droptable');?>";
    	}, 
    	function(){
    		// layer.msg('取消了审核！', {time: 1000});
    		document.getElementById("outExcel").click(); 
   		});
});
//批量审核
$('#allPass').click(function() {
	var chk_value =[];
	$('input[name="id[]"]:checked').each(function(){
		chk_value.push($(this).val());
	});
    if($(':checked').size() > 0) {
      	layer.confirm('确定要审核吗？', {
        	btn: ['确定','取消'], //按钮
        	shade: false //不显示遮罩
      	}, 
      	function(){
        	$.post("<?php echo U('Index/allPass');?>", {data: chk_value}, function(res) {
          		if(res.state == 1) {
            		layer.msg(res.message, {icon: 2, time: 1000});
          		}else{
            		layer.msg(res.message, {icon: 1, time: 1000});
          		}
          		setTimeout(function(){location.reload();}, 1000);
        	});
    	}, 
    	function(){
    		layer.msg('取消了审核！', {time: 1000});
   		});
 	} else {
      layer.alert('没有选择！');
    }
});

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"bPaginate":false,//禁用翻页
	"bLengthChange": false,//禁用每页显示数据数量
	"bInfo": false,//禁用页脚信息
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0]}// 不参与排序的列
	]
});

function chk(){
	var obj=document.getElementsByName('id[]'); //选择所有name="'test'"的对象，返回数组
	//取到对象数组后，我们来循环检测它是不是被选中
	var s='';
	for(var i=0; i<obj.length; i++){
		if(obj[i].checked) s+=obj[i].value+','; //如果选中，将value添加到变量s中
	}
	//那么现在来检测s的值就知道选中的复选框的值了
	alert(s==''?'你还没有选择任何内容！':s);
}

function jqchk(){ //jquery获取复选框值
	var chk_value =[];
	$('input[name="id[]"]:checked').each(function(){
		chk_value.push($(this).val());
	});
	alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value);
} 
/*留言-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(document).ready(function() {
			$.post("<?php echo U('Index/msg_delete');?>",{uid:id},function(data){
				if(data == 1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else{
					alert(data);
				}
			},"text");
		});	
	});
}
/*留言-审核*/
// function article_shenhe(obj,id){
// 	layer.confirm('审核文章？', {
// 		btn: ['通过','不通过','取消'], 
// 		shade: false,
// 		closeBtn: 0
// 	},
// 	function(){
// 		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
// 		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
// 		$(obj).remove();
// 		layer.msg('已发布', {icon:6,time:1000});
// 	},
// 	function(){
// 		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
// 		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
// 		$(obj).remove();
//     	layer.msg('未通过', {icon:5,time:1000});
// 	});	
// }
/*留言-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(document).ready(function() {
			$.post("<?php echo U('Index/msg_locked');?>",{uid:id,locked:"1"},function(data){
				if(data == 1){
					$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">未审核</span>');
					$(obj).remove();
					layer.msg('已下架!',{icon: 5,time:2000});
					location.reload();
				}else{
					alert(data);
				}
			},"text");
		});
	});
}

/*留言-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(document).ready(function() {
			$.post("<?php echo U('Index/msg_locked');?>",{uid:id,locked:"0"},function(data){
				if(data == 1){
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已审核</span>');
					$(obj).remove();
					layer.msg('已审核!',{icon: 6,time:2000});
					location.reload();
				}else{
					alert(data);
				}
			},"text");
		});
	});
}
/*留言-申请上线*/
// function article_shenqing(obj,id){
// 	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
// 	$(obj).parents("tr").find(".td-manage").html("");
// 	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
// }

</script> 
</body>
</html>