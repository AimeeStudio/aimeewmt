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
  <div class="alert alert-error">
    <?php if(isset($message)): ?><span class="success"><?php echo ($msgTitle); echo ($message); ?></span>
      <?php else: ?>
      <span class="error"><?php echo ($msgTitle); echo ($error); ?></span><?php endif; ?>
  </div>
  <div class="copyright">&copy; com pany 2012</div>
</div>
</body>
</html>
</html>