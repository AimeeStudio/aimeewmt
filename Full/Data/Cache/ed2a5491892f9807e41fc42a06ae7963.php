<?php if (!defined('THINK_PATH')) exit();?><html>
<body>
<div class="wrapper">
	<div class="content">
    	<!--头部开始-->
        <div class="header">
        	<h1><a href="#"><img src="__PUBLIC__/default/images/logo.jpg" alt="logo" /></a></h1>
            <!--头部导航-->
            <ul class="maniNav">
                <li><a href="[!ROOT]">首页</a></li>
 <li><a href="#">时间：<?php echo date("Y-m-d H:i:s"); ?></a></li>
                
            </ul>
            <!--头部导航结束-->
            <span class="header-msg">测试专用模板</span>
        </div>
        <!--头部结束-->
        <!--中间开始-->
        <div class="aimee-box cFloat">
        	<div class="crumb"><a href="#">分类名称</a> &gt; <a href="#">文章标题</a></div>
        </div><!--end aimee-box-->
        <!--文章内容开始-->
       	<div class="text-content">
        	<h3 class="red"><?php echo ($pageview["pg_name"]); ?></h3>
            <p><?php echo (date("Y-m-d",$pageview["pg_times"])); ?></p>
             <?php echo ($pageview["pg_content"]); ?>
        </div>
        <!--文章内容结束-->
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