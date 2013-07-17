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
    <div class="aimee-box cFloat"> </div>
    <!--end aimee-box--> 
    <!--文章内容开始-->
    
  
         <div class="text-messages">
     
 
        
        
    
<form name="proform" method="post" action="__URL__/message">
        
        <p>类型 
          <select name="types" class="messages-input">
						<option value="0" selected="selected">&nbsp;留言&nbsp;</option>
						<option value="1">&nbsp;建议&nbsp;</option>
						<option value="2">&nbsp;投诉&nbsp;</option>
						<option value="3">&nbsp;合作&nbsp;</option>
					</select> </p>
        
 <p>标题 
   <input type="text" name="name" value="" class="messages-input" /></p>
 <p>邮箱 
   <input type="text" name="email" value="" class="messages-input" /></p>
 <p>内容 
   <textarea name="content" cols="50" rows="20" class="messages-con"></textarea></p>
 <p>电话 
   <input type="text" name="phone" value="" class="messages-input" /></p>
 <p>QiCQ 
   <input type="text" name="qq" value="" class="messages-input" /></p>
 <P><input type="submit" value="提交" class="messages-b"  name="submit" /></P>
		
		</form>
	</div>
	<div class="clear"></div>

     
     
     
     
     
     
     
     
     
     
     
     
     
     
 
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

</body>
</html>