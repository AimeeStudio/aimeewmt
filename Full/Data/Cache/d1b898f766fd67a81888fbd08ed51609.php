<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>

<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript">
	$(document).ready(function() {
		 $(".Left").css("height",document.body.scrollHeight);
		 $(".sidebar_nav li span").click(
		function(){
			if($(this).next("ul").is(":hidden")) 
				{	
					$(".sidebar_nav li ul").slideUp(300);
					$(this).next("ul").slideDown(300);
				}
			else
				{
					$(this).next("ul").slideUp(300);
				};
		});	
		
		//缓存设置开始，选择缓存模式
				if($("#cache_type option[value='0']").is(":selected")){
					$(".static").hide();
					$(".pseudo_static").hide();	
				};
				if($("#cache_type option[value='1']").is(":selected"))
					{
						$(".pseudo_static").show();
						$(".static").hide();		
				};
				if($("#cache_type option[value='2']").is(":selected"))
					{
						$(".static").show();	
						$(".pseudo_static").hide();
				};
				
		$('#cache_type').change(
			function(){
				if($("#cache_type option[value='0']").is(":selected")){
					$(".static").hide();
					$(".pseudo_static").hide();	
				};
				if($("#cache_type option[value='1']").is(":selected"))
					{
						$(".pseudo_static").show();
						$(".static").hide();		
				};
				if($("#cache_type option[value='2']").is(":selected"))
					{
						$(".static").show();	
						$(".pseudo_static").hide();
				};
				
		});
		
		//伪静态缓存配置下拉选择
			if($("#pasudo_static_auto").is(":selected"))
				{
				$("#pasudo_static_time").show();
			}
			else
				{
				$("#pasudo_static_time").hide();		
			};
			
		$('#cache_set').change(
			function(){
			if($("#pasudo_static_auto").is(":selected"))
				{
				$("#pasudo_static_time").show();
			}
			else
				{
				$("#pasudo_static_time").hide();		
			};
		});
		
		//缓存结束
		
	});
</script>
</head>
<body>

      <div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo (L("all_site")); ?></h3>
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("web_properties")); ?></div>
          <div class="cl"></div>
        </div>
<form name="form1" id="form1" class="form-inline" action="__SELF__" method="post">
<input type="hidden" name="item" value="<?php echo ($item); ?>">
        <table class="table set_table">
          <thead>
            <tr>
              <th width="11%" ><?php echo (L("function")); ?></th>
              <th ><?php echo (L("configuration")); ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo (L("select_cache")); ?></td>
              <td><select id="cache_type" class="span3" name="all[cache_type]">
                <option value="0" <?php if(($all["cache_type"]) == "0"): ?>selected="selected"<?php endif; ?> ><?php echo (L("web_php")); ?></option>
                <option value="1" <?php if(($all["cache_type"]) == "1"): ?>selected="selected"<?php endif; ?> ><?php echo (L("web_rewriter")); ?></option>
                <option value="2" <?php if(($all["cache_type"]) == "2"): ?>selected="selected"<?php endif; ?> ><?php echo (L("web_html")); ?></option>
              </select></td>
            </tr>
            <!-- 伪静态设置 -->
            <tr class="pseudo_static hide">
            	<td><?php echo (L("cache_configuration")); ?></td>
                <td>
                <select id="cache_set" class="span3" name="all[cache_set]">
                <option id="pasudo_static_auto" value="0" <?php if(($all["cache_set"]) == "0"): ?>selected="selected"<?php endif; ?> ><?php echo (L("web_auto")); ?></option>
                <option value="1" <?php if(($all["cache_set"]) == "1"): ?>selected="selected"<?php endif; ?> ><?php echo (L("web_manual")); ?></option>
              </select>
              <div id="pasudo_static_time" class="inline"><span class="m1em_t"><?php echo (L("web_time")); ?></span><input name="all[cache_time]" class="span2" type="text" value="<?php echo ($all["cache_time"]); ?>" /><span class="m1em_t"><?php echo (L("web_ms")); ?></span></div>
                </td>
            </tr>
            <!-- 伪静态设置结束 -->
            <!-- 静态设置 -->
            <tr class="static hide">
            	<td><?php echo (L("file_location")); ?></td>
                <td>
                <input class="span3" name="all[file_position]" type="text" value="<?php echo ($all["file_position"]); ?>" />
                </td>
            </tr>
            <tr class="static hide">
            	<td><?php echo (L("directory_name")); ?></td>
                <td>
                <input class="span3" name="all[dir_name]" type="text" value="<?php echo ($all["dir_name"]); ?>" />
                </td>
            </tr>
            <tr class="static hide">
            	<td><?php echo (L("cache_configuration")); ?></td>
                <td>
                <?php echo (L("web_manual")); ?>
                </td>
            </tr>
            <!-- 静态设置结束 -->
            <tr>
              <td><?php echo (L("web_language")); ?></td>
              <td><select class="span3" name="all[sys_lang]">
                <option value="0" <?php if(($all["sys_lang"]) == "0"): ?>selected="selected"<?php endif; ?> >简体中文</option>
                <option value="1" <?php if(($all["sys_lang"]) == "1"): ?>selected="selected"<?php endif; ?> >繁體中文</option>
                <option value="2" <?php if(($all["sys_lang"]) == "2"): ?>selected="selected"<?php endif; ?> >日本語</option>
                <option value="3" <?php if(($all["sys_lang"]) == "3"): ?>selected="selected"<?php endif; ?> >English</option>
                <option value="4" <?php if(($all["sys_lang"]) == "4"): ?>selected="selected"<?php endif; ?> >한국어</option>
              </select></td>
            </tr>
            <tr>
            	<td><?php echo (L("automatic_update")); ?></td>
                <td>
                <label class="radio inline">
                <input name="all[sys_update]" type="radio" value="0" <?php if(($all["sys_update"]) == "0"): ?>checked<?php endif; ?> /> <?php echo (L("web_on")); ?>
                </label>
                <label class="radio inline">
                <input name="all[sys_update]" type="radio" value="1" <?php if(($all["sys_update"]) == "1"): ?>checked<?php endif; ?> /> <?php echo (L("web_off")); ?>
                </label>
                </td>
            </tr> 
          </tbody>
        </table>
        </form>
        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();"><?php echo (L("save_settings")); ?></a> </p>
        <div class="copyright"></div>
      </div>
      <!--end Right Content-->  
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