<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

      <div class="content">
        <div class="page-header">
          <h3 class="fl">分类参数</h3>
          <div class="user_message fr"><a href="<?php echo U('Class/class_parameters');?>"><i class="icon-cog"></i>返回分类参数</a></div>
          <div class="cl"></div>
        </div>
        <form class="form-inline" name="form1" action="<?php echo U('Class/class_par_set');?>" method="post">
        <table class="table set_table">
          <thead>
            <tr>
              <th width="11%" >功 能</th>
              <th >配 置</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>所属栏目</td>
              <td>
              <select class="span3" name="cl_par_attid" >
              <?php if(is_array($suoshu)): $i = 0; $__LIST__ = $suoshu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ss["id"]); ?>" ><?php echo ($ss["cl_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </td>
            </tr>
            <tr>
              <td>字段名称</td>
              <td><input class="span5" name="cl_par_name" type="text" /></td>
            </tr>
            <tr>
              <td>字段标签</td>
              <td><input class="span5" name="cl_par_key" type="text" /></td>
            </tr>
            <tr>
            	<td>字段类型</td>
                <td><select name="cl_par_type">
                  <option value="text" selected>文本</option>
                  <option value="2">html</option>
                  <option value="radio">单选</option>
                  <option value="checkbox">多选</option>
                  <option value="5">货币</option>
                  <option value="select">下拉菜单</option>
                  <option value="7">倒计时</option>
                  <option value="8">开关</option>
                  <option value="9">图片上传</option>
                  <option value="file">附件</option>       
                </select></td>
            </tr> 
            <tr>
              <td>字段配置</td>
              <td>
              <textarea class="input-xlarge span5" name="cl_par_cnf" cols="20" rows="8"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
        </form>
        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();">增加分类</a> </p>
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