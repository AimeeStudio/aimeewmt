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
      <span class="header-msg">Beta0.0.1A 测试专用模板</span> </div>
    <!--头部结束--> 
    <!--中间开始-->
    <div class="aimee-box cFloat"> 
      <!--文章列表开始-->
      <div class="text-list">
        <h3>分类标题</h3>
        <ul>
          <?php  $_result=D('Content')->getInfo("$fid","10","2","","$page","3"); if ($_result[0]): $i=0;foreach($_result[0] as $key=>$rs):++$i;$mod = ($i % 2 );?><li> <a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["id"]); ?>.<?php echo ($rs["title"]); ?></a> <span class="time"><?php echo (date("Y年m月d日",$rs["time"])); ?></span> </li><?php endforeach; endif; $page = $_result[1];?>
        </ul>
      </div>
      <!--文章列表结束--> 
      <!--页码开始-->
      <div class="pages"> <?php echo ($page); ?> </div>
      <!--页码结束--> 
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