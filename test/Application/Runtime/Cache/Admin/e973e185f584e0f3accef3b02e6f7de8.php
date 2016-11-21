<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>用户信息输出</title>
        <link href="/test/Public/Css/style.css" rel="stylesheet" type="text/css" />
        <link href="/test/Public/Css/mypage.css" rel="stylesheet" type="text/css"/>
        <style>
            .pages a,.pages span {
                display:inline-block;
                padding:2px 5px;
                margin:0 1px;
                border:1px solid #f0f0f0;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
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
        </style>
    </head>

    <body>
        <table width="405" border="1" cellpadding="1" cellspacing="1" bgcolor="#99CC33" bordercolor="#FFFFFF">
            <tr>
                <td colspan="3" bgcolor="#FFFFFF" class="title" align="center">当前登录用户：<?php echo (session('admin')); ?></td>
            </tr>
            <tr>
                <td colspan="3" bgcolor="#FFFFFF" class="title" align="center">用户信息</td>
            </tr>
            <tr class="title">
                <td bgcolor="#FFFFFF" width="44">ID</td>
                <td bgcolor="#FFFFFF" width="120">用户名</td>
                <td bgcolor="#FFFFFF" width="223">密码</td>
            </tr>
            <?php if(is_array($select)): foreach($select as $key=>$user): ?><tr class="content">
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($user["id"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($user["name"]); ?></td>
                    <td bgcolor="#FFFFFF">&nbsp;<?php echo ($user["msg"]); ?></td>
                </tr><?php endforeach; endif; ?>
            <tr class="content">
                <!--<td colspan="3" bgcolor="#FFFFFF">&nbsp;<?php echo ($page); ?></td>-->
                <td colspan="3" bgcolor="#FFFFFF"><div class="pages">
                        <?php echo ($page); ?>
                </div></td>  
            </tr>
        </table>
    </body>
</html>