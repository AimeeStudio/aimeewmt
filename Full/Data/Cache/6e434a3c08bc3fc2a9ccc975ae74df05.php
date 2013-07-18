<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Aimee</title>
<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
      <div class="content">
        <div class="page-header">
          <h3 class="fl">安装扩展</h3>
          <div class="user_message fr"><a href="<?php echo U('Expand/manage');?>"><i class="icon-s-cog"></i>管理我的扩展</a></div>
          <div class="cl"></div>
        </div>
        <div class="minbox">
<form action="__SELF__" method="post" name="form1" id="form1" enctype="multipart/form-data">
        <label>使用.zip格式安装插件</label>
        <input type="file" name="file1" id="file1" value="" />
        <label>
        <button type="submit" name="submit" id="submit" class="btn btn-primary input-small m1em">上&nbsp;&nbsp;传</button>
        </label>
        </form>
        </div>
        <div class="copyright">&copy; com pany 2012</div>
      </div>
      <!--end Right Content-->  
</body>
</html>