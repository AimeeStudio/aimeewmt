<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9">

<title><?php echo ($ai["sitename"]); ?>测试模板</title>
<link href="[!CSS]test.css" rel="stylesheet" type="text/css">
</head></html>

<body>
<div class="wrapper">
  <div class="content"> 
    <!--头部开始-->
    <div class="header">
      <h1><a href="[!ROOT]"><img src="[!IMG]logo.jpg" alt="logo" /></a></h1>
      <!--头部导航-->
      <ul class="maniNav">
        <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?> </a></li><?php endforeach; endif;?>
      </ul>
      <!--头部导航结束--> 
      <span class="header-msg">RC1.0测试专用模板</span> </div>
    <!--头部结束--> 
    <!--中间开始-->
    <div class="aimee-box cFloat"> </div>
    <!--end aimee-box--> 
    <!--文章内容开始-->
    
    <div class="text-content">
      <?php  $rs=D('Content')->getContent("$cid"); ?><h3 ><?php echo ($rs["title"]); ?></h3>
        <p>编辑 <?php echo ($rs["aut"]); ?> / <?php echo (date("Y-m-d",$rs["time"])); ?></p>
        <?php echo ($rs["content"]); ?>
    </div>
    
    <!--文章内容结束--> 
    <!--中间结束--> 
    <!--底部开始--> 
            <div class="footer">
        	<div class="aimee-box">
            	<p>AIMEE TEMPLATE 0.2 BY AIMEE STUDIO 2013</p>
            </div>
        </div><!--底部结束--> 
  </div>
</div>
</body>
</html>