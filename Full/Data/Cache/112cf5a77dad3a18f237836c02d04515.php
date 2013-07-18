<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>


<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	$(document).ready(function() {

		
		//栏目类型设置开始，选择栏目类型
				if($("#classtype option[value='0']").is(":selected")){
					$(".selected_0").show();
					$(".selected_1").hide();
					$(".selected_2").show();	
				};
				if($("#classtype option[value='1']").is(":selected"))
					{
						$(".selected_0").hide();
						$(".selected_1").show();
						$(".selected_2").hide();		
				};
				if($("#classtype option[value='2']").is(":selected"))
					{
						$(".selected_0").show();
						$(".selected_1").hide();	
						$(".selected_2").hide();
				};
				
		$('#classtype').change(
			function(){
				if($("#classtype option[value='0']").is(":selected")){
					$(".selected_0").show();
					$(".selected_1").hide();
					$(".selected_2").show();	
				};
				if($("#classtype option[value='1']").is(":selected"))
					{
						$(".selected_0").hide();
						$(".selected_1").show();
						$(".selected_2").hide();		
				};
				if($("#classtype option[value='2']").is(":selected"))
					{
						$(".selected_0").show();
						$(".selected_1").hide();	
						$(".selected_2").hide();
				};
				
		});
		
		//图片裁剪
		
		
	});
	
	
	
	//生成拼音
	function getPinyin()
	{
		//用户提交
		$.ajax({
		  type: 'POST',
		  url: "<?php echo U('Class/getPinyin');?>",
		  data:{clName: $('#cl_name').attr('value')},
		  dataType: "json",
		  success: function(json) {
			if( json.result == 1 ){
				document.getElementById('cl_en_name').value = json.msg;
			} else {
				document.getElementById('cl_en_name').value = "";
			}
			
		  }
		})
		
	}

</script>

<script type="text/javascript" >

function add(){
$('#myModal', window.parent.document).modal({
	backdrop:false
	})
}
</script>

</head>

<body>

      <div class="content">
        <div class="page-header">
          <h3 class="fl">编辑分类</h3>
          <div class="user_message fr"><i class="icon-wrench"></i>增加您的分类菜单</div>
          <div class="cl"></div>
        </div>
        <form name="form1" id="form1" class="form-inline" action="<?php echo U('Class/add_class');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($classnr["id"]); ?>" />
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
              <select class="span3" name="cl_class">
                <option value="0" ></option>
              <?php if(is_array($suoshu)): $i = 0; $__LIST__ = $suoshu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ss["id"]); ?>" <?php if(($ss["id"]) == $classnr["cl_class"]): ?>selected="selected"<?php endif; ?> ><?php echo ($ss["cl_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
                            
              <span class="m1em_t">类型</span>
              <select class="input-small" id="classtype" name="cl_type">
                <option value="0" <?php if(($classnr["cl_type"]) == "0"): ?>selected="selected"<?php endif; ?> >栏目</option>
                <option value="1" <?php if(($classnr["cl_type"]) == "1"): ?>selected="selected"<?php endif; ?> >外链</option>
              </select>
              
              <span class="m1em_t">属性</span><select class="input-small" name="cl_att">
                <option value="1" <?php if(($classnr["cl_att"]) == "1"): ?>selected="selected"<?php endif; ?> >显示</option>
                <option value="2" <?php if(($classnr["cl_att"]) == "2"): ?>selected="selected"<?php endif; ?> >隐藏</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>栏目名称</td>
              <td><input class="span4" name="cl_name" id="cl_name" value="<?php echo ($classnr["cl_name"]); ?>" type="text" x-webkit-speech /><span class="m1em_t">排序</span><input class="span1" name="cl_sort" type="text" value="<?php echo ($classnr["cl_sort"]); ?>" /></td>
            </tr>
            <tr class="selected_0">
              <td>栏目英文名</td>
              <td><input class="span4" name="cl_en_name" id="cl_en_name" type="text" value="<?php echo ($classnr["cl_en_name"]); ?>" /><a class="btn m1em_t" href="#" onClick="getPinyin();">生成拼音</a></td>
            </tr>
            <!-- 外链 -->
            <tr class="selected_1">
              <td>外链地址</td>
              <td><input class="span4" name="cl_exturl" type="text" value="<?php echo ($classnr["cl_exturl"]); ?>" /></td>
            </tr>
            <tr>
              <td>栏目简介</td>
              <td>
              <textarea class="input-xlarge span5" name="cl_info" cols="20" rows="8"><?php echo ($classnr["cl_info"]); ?></textarea>
              </td>
            </tr>
            <tr>
              <td>栏目缩略图</td>
              <td>
              <input name="sl_thumb" id="sl_thumb" type="hidden" value="<?php echo ($classnr["cl_thumb"]); ?>" />
              <a class="btn btn-inverse m1em_t" onClick="add()">上传裁剪</a><span id="suoluotudizhi"><?php if(!empty($classnr["cl_thumb"])): ?>__ROOT__/Upload/thumbs/<?php echo ($classnr["cl_thumb"]); endif; ?></span></td>
            </tr>
            <tr class="selected_0">
              <td>栏目关键词</td>
              <td><input class="span4" name="cl_keyword" type="text" value="<?php echo ($classnr["cl_keyword"]); ?>" /></td>
            </tr>
            <tr class="selected_0">
              <td>栏目描述</td>
              <td><textarea class="input-xlarge span5" name="cl_description" cols="20" rows="8"><?php echo ($classnr["cl_description"]); ?></textarea></td>
            </tr>
            <tr class="selected_0">
              <td>绑定域名</td>
              <td><input class="span4" name="cl_domain" type="text" value="<?php echo ($classnr["cl_domain"]); ?>" /></td>
            </tr>
            <tr class="selected_0">
              <td>栏目模板</td>
              <td><select id="cl_tplclass" class="span3" name="cl_tplclass">
              <?php if(is_array($tplfile)): $i = 0; $__LIST__ = $tplfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tf): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($classnr["cl_tplclass"]) == $key): ?>selected="selected"<?php endif; ?> ><?php echo ($tf); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </td>
            </tr>
            <tr class="selected_2">
              <td>内容模板</td>
              <td><select id="cl_tplcontent" class="span3" name="cl_tplcontent">
              <?php if(is_array($tplfile)): $i = 0; $__LIST__ = $tplfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tf): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($classnr["cl_tplcontent"]) == $key): ?>selected="selected"<?php endif; ?> ><?php echo ($tf); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </td>
            </tr>
            
          </tbody>
        </table>
        </form>
        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();">编辑分类</a> </p>
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