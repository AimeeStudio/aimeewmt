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
        <li><a href="[!ROOT]">首页</a></li>
        <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 ); if(($rs["id"]) == "4"): ?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?> </a></li><?php endif; endforeach; endif;?>
        <li><a href="#">时间：<?php echo date("Y-m-d H:i:s"); ?></a></li>
      </ul>
      <!--头部导航结束--> 
      <span class="header-msg">Beta0.0.1A 测试专用模板</span> </div>
    <!--头部结束--> 
    <!--中间开始-->
    <?php  $rs=D('Page')->getContent("$fid"); ?><div class="aimee-box cFloat">
        <p><?php echo ($rs["title"]); ?></p>
        <p><?php echo ($rs["content"]); ?></p>
      </div>
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