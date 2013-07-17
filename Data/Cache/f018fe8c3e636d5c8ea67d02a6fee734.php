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
        <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 ); if(($rs["id"]) == "3"): ?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?> </a></li><?php endif; endforeach; endif;?>
        <li><a href="#">注意:这是单独调用一个导航判断</a></li>
      </ul>
      <!--头部导航结束--> 
      <span class="header-msg">Beta0.0.1A 测试专用模板</span> </div>
    <!--头部结束--> 
    <!--中间开始-->
    <div class="aimee-box">
      <ul class="img-list">
        <?php  $_result=D('Content')->getInfo("$fid","4","1","","1","0"); if ($_result[0]): $i=0;foreach($_result[0] as $key=>$rs):++$i;$mod = ($i % 2 );?><li> <a href="<?php echo ($rs["url"]); ?>"><img src="<?php echo ($rs["img"]); ?>"></a>
            <p><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?></a></p>
          </li><?php endforeach; endif; $page = $_result[1];?>
      </ul>
    </div>
    <!--end aimee-box--> 
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