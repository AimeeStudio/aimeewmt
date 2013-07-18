<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>页面提示</title>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jshack.js"></script>
<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
</head>
<body>
<div class="content">

  <div class="page-header">
    <div class="cl"></div>
  </div>
  
  <div class="alert alert-info">
  
    <?php if(isset($message)): ?><strong>&radic; <?php echo ($msgTitle); echo ($message); ?>！</strong> 
    
  正在<?php echo ($waitSecond); ?> 秒后为您转向基本配置页面，如果不想等待请点击 <a href="<?php echo ($jumpUrl); ?>">这里</a> 关闭<?php endif; ?>
    
  </div>
  <div class="copyright">&copy; com pany 2012</div>
</div>

</body>
</html>