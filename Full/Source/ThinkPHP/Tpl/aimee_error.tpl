<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>页面提示</title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='{$waitSecond};URL={$jumpUrl}'>
</head>
<body>
<div class="content">
  <div class="page-header">
    <div class="cl"></div>
  </div>
  <div class="alert alert-error">
    <present name="message" > <span class="success">{$msgTitle}{$message}</span>
      <else/>
      <span class="error">{$msgTitle}{$error}</span> </present>
  </div>
  <div class="copyright">&copy; com pany 2012</div>
</div>
</body>
</html>
</html>