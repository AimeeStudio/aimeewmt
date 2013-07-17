<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title>Aimee</title>
</head>
<body>
      
        <div class="page-header">
          <h3 class="fl"><?php echo (L("web_info")); ?></h3>
          <div class="user_message fr"><i class="icon-user"></i><?php echo (L("web_group")); ?>：<?php if(($_SESSION['adminpower']== 1)): echo (L("administrator")); else: echo (L("user")); endif; ?><i class="icon-time"></i><?php echo (L("login_time")); ?> <?php if(empty($_SESSION['lastlogintime'])): ?>首次登陆<?php else: echo (date("Y-m-d",session('lastlogintime'))); endif; ?></div>
          <div class="cl"></div>
        </div>
        <div class="hero-unit home_prompt">
          <h1>欢迎使用 Aimee ！</h1>
          <p>这是您第一次与Aimee接触，Aimee设计初衷就是为了让设计师、程序员、以及不懂网站的初学者能够轻松建立网站。</p>
          <p>Aimee还有许多您不知道的小秘密，希望我们在以后的日子里相处愉快。</p>
          <p>&nbsp;</p>
          <p> <a href="http://code.aimees.net" target="new" class="btn btn-primary btn-large"> 前往学习中心 </a> </p>
        </div>
        
        <!--end 首页提示信息-->
        <div class="copyright"></div>

      <!--end Right Content-->   
      
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script> 
</body>
</html>