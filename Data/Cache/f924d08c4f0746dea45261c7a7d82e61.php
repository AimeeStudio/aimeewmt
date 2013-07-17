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
    <div class="aimee-box">
      <ul class="img-list">
        <?php  $_result=D('Content')->getInfo("3","4","1","","1","0"); if ($_result[0]): $i=0;foreach($_result[0] as $key=>$rs):++$i;$mod = ($i % 2 );?><li> <a href="<?php echo ($rs["url"]); ?>"><img src="<?php echo ($rs["img"]); ?>"></a>
            <p><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?></a></p>
          </li><?php endforeach; endif; $page = $_result[1];?>
      </ul>
    </div>
    <!--end aimee-box-->
    <div class="aimee-box cFloat">
      <div class="row2 border-right fl"> 
        <!--文章列表开始-->
        <div class="text-list">
          <h3>列表文章</h3>
          <ul>
            <?php  $_result=D('Content')->getInfo("2","5","2","","1","0"); if ($_result[0]): $i=0;foreach($_result[0] as $key=>$rs):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?></a><span class="time"><?php echo (date("Y年m月d日",$rs["time"])); ?></span></li><?php endforeach; endif; $page = $_result[1];?>
          </ul>
        </div>
        <!--文章列表结束--> 
      </div>
      <div class="row2 border-left fl">
        <div class="text-field">
          <p>调用网站名称：<?php echo ($ai["sitename"]); ?></p>
          <p>调用关键字：<?php echo ($ai["keywords"]); ?></p>
          <p>调用网站描述：<?php echo ($ai["description"]); ?></p>
          <p>调用版权：<?php echo ($ai["siteright"]); ?></p>
          <p>调用ICP：<?php echo ($ai["icp"]); ?></p>
          <p>调用管理员邮箱：<?php echo ($ai["mail"]); ?></p>
          <p>调用网站网址：<?php echo ($ai["domain"]); ?></p>
        </div>
      </div>
    </div>
    <!--end aimee-box-->
    <div class="aimee-box">
      <ul class="photo-text">
        <li>
          <h3><a href="#">TAG关键字</a></h3>
          <p>
            <?php  $_result=D('Channel')->getTag("2","10"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><a href="<?php echo ($rs["url"]); ?>" target="_blank"><?php echo ($rs["title"]); ?></a> </br><?php endforeach; endif;?>
            <?php  $_result=D('Channel')->getTag("3","10"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><a href="<?php echo ($rs["url"]); ?>" target="_blank"><?php echo ($rs["title"]); ?></a> </br><?php endforeach; endif;?>
          </p>
        </li>
        <?php  $rs=D('Content')->getContent("5"); ?><li>
            <div class="lc fl"><a href="#"><img src="<?php echo ($rs["img"]); ?>" alt="<?php echo ($rs["title"]); ?>" /></a></div>
            <div class="rc fr">
              <h3><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?></a></h3>
              <p><?php echo ($rs["sum"]); ?><a href="<?php echo ($rs["url"]); ?>">详情&gt;&gt;</a></p>
            </div>
          </li>
      </ul>
    </div>
    <!--end aimee-box--> 
    <!--中间结束--> 
    <!--底部开始--> 
            <div class="footer">
        	<div class="aimee-box">
            	<p>AIMEE TEMPLATE 0.2 BY AIMEE STUDIO 2013</p>
            </div>
        </div> <!--底部结束--> 
  </div>
</div>
</body>
</html>