<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<title><?php echo ($ai["sitename"]); ?>测试模板</title>
<link href="[!CSS]test.css" rel="stylesheet" type="text/css" />
</head>
<!--也可以 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<title><?php echo ($ai["sitename"]); ?>测试模板</title>
<link href="[!CSS]test.css" rel="stylesheet" type="text/css" />
</head>-->

<body>
<div class="wrapper">
  <div class="content"> 
    <!--头部开始-->
    <div class="header">
      <h1><a href="#"><img src="[!SKIN]/default/images/logo.jpg" alt="logo" /></a></h1>
      <!--头部导航-->
      <ul class="maniNav">
        <li><a href="[!ROOT]">首页</a></li>
        <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["title"]); ?> </a></li><?php endforeach; endif;?>
        <li><a href="#">时间：<?php echo date("Y-m-d H:i:s"); ?></a></li>
      </ul>
      <!--头部导航结束--> 
      <span class="header-msg">测试专用模板</span> </div>
    <!--头部结束--> 
    <!--中间开始-->
    <div class="aimee-box">
      <ul class="img-list">
        <li> <a href="#"><img src="__PUBLIC__/default/images/img001.jpg" alt="" /></a>
          <p><a href="#">图片名称</a></p>
        </li>
        <li> <a href="#"><img src="__PUBLIC__/default/images/img002.jpg" alt="" /></a>
          <p><a href="#">图片名称</a></p>
        </li>
        <li> <a href="#"><img src="__PUBLIC__/default/images/img003.jpg" alt="" /></a>
          <p><a href="#">图片名称</a></p>
        </li>
        <li> <a href="#"><img src="__PUBLIC__/default/images/img004.jpg" alt="" /></a>
          <p><a href="#">图片名称</a></p>
        </li>
      </ul>
    </div>
    <!--end aimee-box-->
    <div class="aimee-box cFloat">
      <div class="row2 border-right fl"> 
        <!--文章列表开始-->
        <div class="text-list">
          <h3>分类标题</h3>
          <ul>
            <li><a href="#">文章标题</a><span class="time">2013年1月1日</span></li>
            <li><a href="#">文章标题</a><span class="time">2013年1月1日</span></li>
            <li><a href="#">文章标题</a><span class="time">2013年1月1日</span></li>
            <li><a href="#">文章标题</a><span class="time">2013年1月1日</span></li>
            <li><a href="#">文章标题</a><span class="time">2013年1月1日</span></li>
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
          <div class="lc fl"><a href="#"><img src="__PUBLIC__/default/images/img001.jpg" alt="" /></a></div>
          <div class="rc fr">
            <h3><a href="#">内容标题</a></h3>
            <p>简介：简介简介简介简介简介简介简介简介简介简介<a href="#">详情&gt;&gt;</a></p>
          </div>
        </li>
        <li>
          <div class="lc fl"><a href="#"><img src="__PUBLIC__/default/images/img001.jpg" alt="" /></a></div>
          <div class="rc fr">
            <h3><a href="#">内容标题</a></h3>
            <p>简介：简介简介简介简介简介简介简介简介简介简介<a href="#">详情&gt;&gt;</a></p>
          </div>
        </li>
      </ul>
    </div>
    <!--end aimee-box--> 
    <!--中间结束--> 
    <!--底部开始-->
    <div class="footer">
      <div class="aimee-box">
        <?php  $_result=D('Channel')->getTag("18","3"); if ($_result): $i=0;foreach($_result as $key=>$rs):++$i;$mod = ($i % 2 );?><a href="<?php echo ($rs["url"]); ?>" target="_blank"><?php echo ($rs["title"]); ?></a> </br><?php endforeach; endif;?>
        <p>内部调试</p>
        <?php  $_result=D('Channel')->getInfo("1","10","1"); if ($_result): $i=0;foreach($_result as $key=>$yanglei):++$i;$mod = ($i % 2 );?><li> <a href="<?php echo ($yanglei["url"]); ?>" target="_blank"> <?php echo ($yanglei["id"]); ?>  <?php echo ($yanglei["title"]); ?>   关键字：<?php echo ($yanglei["keywords"]); ?> </a> <img src="<?php echo ($yanglei["img"]); ?>"> </li>
          <?php  $_cresult=D('Channel')->getInfoC($yanglei['id'],"10","1"); if ($_cresult): $ci=0;foreach($_cresult as $key=>$crs):++$ci;$cmod = ($ci % 2 );?><li> <a href="<?php echo ($crs["url"]); ?>" target="_blank"> <?php echo ($crs["id"]); echo ($crs["title"]); ?>关键字：<?php echo ($crs["keywords"]); ?> </a> <img src="<?php echo ($crs["img"]); ?>"> </li><?php endforeach; endif; endforeach; endif;?>
      </div>
    </div>
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