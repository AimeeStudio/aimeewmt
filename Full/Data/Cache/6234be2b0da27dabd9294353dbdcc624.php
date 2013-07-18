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

<form name="form1" id="form1" action="__SELF__" method="post">
<input type="hidden" name="item" value="<?php echo ($item); ?>">
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo (L("basic_configuration")); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
        <table class="table set_table">
          <thead>
            <tr>
              <th width="11%" ><?php echo (L("function")); ?></th>
              <th ><?php echo (L("configuration")); ?></th>
              <th width="61%" class="" ><?php echo (L("label")); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo (L("web_sitename")); ?></td>
              <td><input name="ai[sitename]" type="text" class="span5" value="<?php echo ($ai["sitename"]); ?>"></td>
              <td class="">{$ai.sitename}</td>
            </tr>
            <tr>
              <td><?php echo (L("web_keywords")); ?></td>
              <td><input name="ai[keywords]" type="text" class="span5" value="<?php echo ($ai["keywords"]); ?>"></td>
              <td class="">{$ai.keywords}</td>
            </tr>
            <tr>
              <td><?php echo (L("web_description")); ?></td>
              <td><textarea class="input-xlarge span5" name="ai[description]" cols="" rows="8"><?php echo ($ai["description"]); ?></textarea></td>
              <td class="">{$ai.description}</td>
            </tr>
            <tr>
              <td><?php echo (L("copyright")); ?></td>
              <td><input name="ai[siteright]" type="text" class="span5" value="<?php echo ($ai["siteright"]); ?>"></td>
              <td class="">{$ai.siteright}</td>
            </tr>
            <tr class="">
              <td><?php echo (L("icp")); ?></td>
              <td><input name="ai[icp]" type="text" class="span5" value="<?php echo ($ai["icp"]); ?>"></td>
              <td class="">{$ai.icp}</td>
            </tr>
            <tr class="">
              <td><?php echo (L("admin_email")); ?></td>
              <td><input name="ai[mail]" type="text" class="span5" value="<?php echo ($ai["mail"]); ?>"></td>
              <td class="">{$ai.mail}</td>
            </tr>
            <tr class="">
              <td><?php echo (L("webadd")); ?></td>
              <td><input name="ai[domain]" type="text" class="span5" value="<?php echo ($ai["domain"]); ?>"></td>
              <td class="">{$ai.domain}</td>
            </tr>
            <tr class="">
              <td><?php echo (L("world_time")); ?></td>
              <td><select class="span5" name="ai[timezone]">
                  <option value = '0' <?php if(($ai["timezone"]) == "0"): ?>selected="selected"<?php endif; ?> >北京时间</option>
                  <option value = '1' <?php if(($ai["timezone"]) == "1"): ?>selected="selected"<?php endif; ?> >纽约时间</option>
                  <option value = '2' <?php if(($ai["timezone"]) == "2"): ?>selected="selected"<?php endif; ?> >巴黎时间</option>
                </select></td>
              <td class=""></td>
            </tr>
            <tr class="hide"><!--隐藏表格，用来增加插件新功能-->
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <p class="border_top"> <a class="btn btn-primary btn-small" onclick="formSubmit();"><?php echo (L("save_settings")); ?></a> </p>
        <div class="copyright"></div>
</div>
      <!--end Right Content-->  
</form>

<script type="text/javascript">
function formSubmit() {
	//alert(document.form1.action);
	document.form1.submit();
}

</script>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>