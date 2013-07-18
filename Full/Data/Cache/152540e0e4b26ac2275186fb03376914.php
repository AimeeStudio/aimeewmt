<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<title><?php echo ($ai["sitename"]); ?>测试模板</title>
<link href="[!CSS]test.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">
	<div class="content">
    	<!--头部开始-->
        <div class="header">
        	<h1><a href="#"><img src="__PUBLIC__/default/images/logo.jpg" alt="logo" /></a></h1>
            <!--头部导航-->
            <ul class="maniNav">
                <li><a href="[!ROOT]">首页</a></li>
         <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?>  </a></li><?php endforeach; endif;?> 
 <li><a href="#">时间：<?php echo date("Y-m-d H:i:s"); ?></a></li>
                
            </ul>
            <!--头部导航结束-->
            <span class="header-msg">测试专用模板</span>
        </div>
        <!--头部结束-->
        <!--中间开始-->
        <div class="aimee-box cFloat">
            <!--文章列表开始-->
            <div class="text-list">
               	<h3>分类标题<?php echo ($keyword); ?></h3>
                <ul>
            <?php  $_result=D('Content')->getTagInfo("$keyword","3","1","$page","0"); if ($_result[0]): $i=0;foreach($_result[0] as $key=>$rs):++$i;$mod = ($i % 2 );?><li>
                <a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?></a>
                </li><?php endforeach; endif; $page = $_result[1];?> 
                </ul>
            </div>
            <!--文章列表结束--> 
            <!--页码开始--> 
        	<?php echo ($page); ?>  
            <!--页码结束-->    
        </div><!--end aimee-box-->
        <!--中间结束-->
        <!--底部开始-->
        <div class="footer">
        	<div class="aimee-box">
            	<p>AIMEE TEMPLATE 0.1</p>
            </div>
        </div>
        <!--底部结束-->
    </div>
</div>
</body>
</html>