<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jshack.js"></script>
<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
</head>

<body>
        <div class="page-header">
          <h3 class="fl">批量替换</h3>
          <div class="user_message fr"><i class="icon-wrench"></i>管理你的数据替换</div>
          <div class="cl"></div>
        </div>
        <table class="table set_table">
          <thead>
            <tr>
              <th>功能</th>
              <th>配置</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td width="100" valign="middle">属性</td>
              <td><select name="">
                <option>MYSQL数据表A</option>
                <option>MYSQL数据表B</option>
                <option>MYSQL数据表C</option>
              </select></td>
            </tr>
            <tr>
              <td width="100" valign="middle">替换前</td>
              <td><input name="" type="text" class="span4" /></td>
            </tr>
            <tr>
              <td width="100" valign="middle">替换为</td>
              <td><input name="" type="text" class="span4" /></td>
            </tr>
          </tbody>
        </table>
<p class="border_top"> <a class="btn btn-primary btn-small input-small">更&nbsp;新</a> </p>
        <div class="copyright"></div>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script></div>
</body>
</html>