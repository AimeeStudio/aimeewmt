<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.multiselect2side.js"></script>
<!--点转 外链JS-->
<script>

		
	//生成拼音
	function getPinyin()
	{
		//用户提交
		$.ajax({
		  type: 'POST',
		  url: "<?php echo U('Common/getPinyin');?>",
		  data:{zwName: $('#nr_name').attr('value')},
		  dataType: "json",
		  success: function(json) {
			if( json.result == 1 ){
				document.getElementById('nr_en_name').value = json.msg;
			} else {
				document.getElementById('nr_en_name').value = "";
			}
			
		  }
		})
		
	}
		
	function tuiJianFlagValue(){
		//是否推荐
		if ( document.getElementById("tuiJian").checked == true )
		{
			document.getElementById("nr_good").value = "1";
		} else {
			document.getElementById("nr_good").value = "2";
		}
		
	}		
	
	function waiLianFlagValue(){
		//是否推荐
		if ( document.getElementById("waiLian").checked == true )
		{
			document.getElementById("nr_ext").value = "1";
			$(".selected_4").hide();
			$(".selected_1").show();
		} else {
			document.getElementById("nr_ext").value = "2";
			$(".selected_4").show();
			$(".selected_1").hide();
		}
		
	}
	
	</script>

<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/jquery.multiselect2side.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/colorpicker.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/datepicker.css" rel="stylesheet" type="text/css" />
</head>

<body onload="tuiJianFlagValue();waiLianFlagValue();">
        <div class="page-header">
          <h3 class="fl">增加内容</h3>
          <div class="user_message fr"><i class="icon-wrench"></i><a href="#">保存页面排序</a></div>
          <div class="cl"></div>
        </div>
        <form name="form1" id="form1" class="form-inline" action="<?php echo U('Content/content_add');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($contentinfo["id"]); ?>" />
       <table class="table set_table">
        	<thead>
            <tr>
              <th width="100" >功 能</th>
              <th >配 置</th>
              <th width="120">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td valign="middle">所属栏目</td>
              <td>
              <select class="span3" name="nr_att" >
              <?php if(is_array($suoshu)): $i = 0; $__LIST__ = $suoshu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ss["id"]); ?>" <?php if(($ss["id"]) == $contentinfo["nr_att"]): ?>selected="selected"<?php endif; ?> ><?php echo ($ss["cl_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="tuiJian" id="tuiJian"  <?php if(($contentinfo["nr_good"]) == "1"): ?>checked="checked"<?php endif; ?>  onclick="tuiJianFlagValue();" />&nbsp;&nbsp;推荐
              &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="waiLian" id="waiLian"  <?php if(($contentinfo["nr_ext"]) == "1"): ?>checked="checked"<?php endif; ?> onclick="waiLianFlagValue();" />&nbsp;&nbsp;跳转
<input type="hidden" name="nr_good" id="nr_good" value="1" />              
<input type="hidden" name="nr_ext" id="nr_ext" value="2" />              
              
              </td>
              <td>
              	<div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr>
              <td valign="middle">内容标题</td>
              <td><input name="nr_name" id="nr_name" type="text" value="<?php echo ($contentinfo["nr_name"]); ?>" class="span4" /><i >   <a href="#" class="icon-tint m1em_t" id="cp4" data-color-format="hex" data-color="rgb(255, 255, 255)"></a></i><i class="icon-bold"></i><i class="icon-italic m1em_t"></i></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr>
              <td valign="middle">内容英文</td>
              <td><input name="nr_en_name" id="nr_en_name" type="text" value="<?php echo ($contentinfo["nr_en_name"]); ?>" class="span4" /><a class="btn m1em_t" href="#" onclick="getPinyin();">生成拼音</a></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr>
              <td valign="middle">缩略图</td>
              <td>
              <input name="sl_thumb" id="sl_thumb" type="hidden" value="<?php echo ($contentinfo["nr_thumb"]); ?>" />
              <a class="btn btn-inverse m1em_t" onclick="add()">上传裁剪</a><span id="suoluotudizhi"><?php if(!empty($contentinfo["nr_thumb"])): ?>__ROOT__/Upload/thumbs/<?php echo ($contentinfo["nr_thumb"]); endif; ?></span></td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            
            
             <tr class="selected_1" style="display:none;">
              <td valign="middle">外链</td>
              <td><input name="nr_exturl" type="text" value="<?php echo ($contentinfo["nr_exturl"]); ?>" class="span4" /></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            
            
            
            <tr class="selected_4">
              <td valign="middle">内容关键词</td>
              <td><input name="nr_keyword" type="text" value="<?php echo ($contentinfo["nr_keyword"]); ?>" class="span4" /></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr class="selected_4">
              <td valign="middle">内容描述</td>
              <td><input name="nr_description" type="text" value="<?php echo ($contentinfo["nr_description"]); ?>" class="span4" /></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr class="selected_4">
              <td valign="middle">内容编辑</td>
              <td><textarea name="nr_edit" cols="" rows="20" class="span9"><?php echo ($contentinfo["nr_edit"]); ?></textarea></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr class="selected_4">
              <td valign="middle">内容简介</td>
              <td><textarea name="nr_info" cols=""  class="span9"><?php echo ($contentinfo["nr_info"]); ?></textarea></td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
            <tr>
              <td valign="middle">内容时间</td>
              <td>
               <input  name="nr_times" id="nr_times" value="<?php echo (date('Y-m-d H:i:s',$contentinfo["nr_times"])); ?>"  type="text"/>
               </td>
              <td>
              <div class="updown"><a class="btn btn-info" href="#" onclick="return UpLi(this);">上移</a><a class="btn btn-info" href="#" onclick="return DownLi(this);">下移</a></div>
              </td>
            </tr>
          </tbody>
        </table>
        </form>

		<p class="border_top"><a class="btn btn-primary btn-small input-small" onClick="formSubmit();">发布内容</a> </p>
        <div class="copyright"></div>



<!--编辑器JS-->
<link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__PUBLIC__/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/plugins/code/prettify.js"></script>
<!--编辑器給textarea赋值-->
<script>
	var editor1,editor2;
    KindEditor.ready(function(K) {
        editor1 = K.create('textarea[name="nr_edit"]', {
            cssPath : '__PUBLIC__/kindeditor/plugins/code/prettify.css',
            uploadJson : '__PUBLIC__/kindeditor/php/upload_json.php',
            fileManagerJson : '__PUBLIC__/kindeditor/php/file_manager_json.php',
            allowFileManager : true
        });
        editor2 = K.create('textarea[name="nr_info"]', {
            cssPath : '__PUBLIC__/kindeditor/plugins/code/prettify.css',
            uploadJson : '__PUBLIC__/kindeditor/php/upload_json.php',
            fileManagerJson : '__PUBLIC__/kindeditor/php/file_manager_json.php',
            allowFileManager : true
        });
        prettyPrint();
    });
</script>

<!--上传截取-->
<script type="text/javascript" >

function add(){
$('#myModal', window.parent.document).modal({
	backdrop:false
	})
}

function formSubmit() {
	//alert(document.form1.action);
	editor1.sync();
	editor2.sync();
	document.form1.submit();
}
</script>



<!--文字颜色JS-->

<script type="text/javascript" src="__PUBLIC__/Js/bootstrap-colorpicker.js"></script>
	<script>
		$(function(){
		window.prettyPrint && prettyPrint()

			var bodyStyle = $('.span4 ')[0].style;
			$('#cp4').colorpicker().on('changeColor', function(ev){
				bodyStyle.borderColor = ev.color.toHex();
			});
		});
	</script>


<script type="text/javascript">

//
////上移
//
//$(".table tr").hover(
//		function(){
//			var td = $(this).children("td");
//			var updown = td.children(".updown");
//			updown.css("display","block");
//		},function(){
//			var td = $(this).children("td");
//			var updown = td.children(".updown");
//			updown.css("display","none");
//	});
//
//function UpLi(obj)
//{
// var onthis = $(obj).parents("tr");
// var getup = $(obj).parents("tr").prev();
// if(getup.length == 0)
// {
// alert("已经是最上一层啦");
// return false;
// }
// $(onthis).fadeOut(300,function(){
//if($(getup).before(onthis))
//$(onthis).fadeIn(300); 
// });
//}
////下移
//function DownLi(obj)
//{
// var onthis = $(obj).parents("tr");
// var getdown = $(obj).parents("tr").next();
// if(getdown.length == 0)
// {
// alert("已经是最上一层啦");
// return false; 
// }
// $(onthis).fadeOut(300,function(){
//if($(getdown).after(onthis))
//$(onthis).fadeIn(300); 
// });
//}//删除
//function RemoveLi(obj){
// $(obj).parent().remove();
//}

//分类权限设置
if($("#competence option[value='0']").is(":selected")){
		$(".selected_0").show();
		$(".selected_1").hide();
		$(".selected_2").hide();	
};
if($("#competence option[value='1']").is(":selected"))
	{
		$(".selected_0").hide();
		$(".selected_1").show();
		$(".selected_2").hide();		
};
if($("#competence option[value='2']").is(":selected"))
	{
		$(".selected_0").hide();
		$(".selected_1").hide();	
		$(".selected_2").show();
};
				
$('#competence').change(
	function(){
	if($("#competence option[value='0']").is(":selected")){
		$(".selected_0").show();
		$(".selected_1").hide();
		$(".selected_2").hide();	
	};
	if($("#competence option[value='1']").is(":selected"))
		{
			$(".selected_0").hide();
			$(".selected_1").show();
			$(".selected_2").hide();		
		};
	if($("#competence option[value='2']").is(":selected"))
		{
			$(".selected_0").hide();
			$(".selected_1").hide();	
			$(".selected_2").show();
		};
});
//倒计时
	$("#countdown_default").click(
		function(){
			$(".countdown_html,.countdown_v,.countdown_js").hide();
	});
	$("#countdown_html").click(
		function(){
			$(".countdown_v,.countdown_js").hide();
			$(".countdown_html").show();
	});
	$("#countdown_v").click(
		function(){
			$(".countdown_html,.countdown_js").hide();
			$(".countdown_v").show();
	});
	$("#countdown_js").click(
		function(){
			$(".countdown_html,.countdown_v").hide();
			$(".countdown_js").show();
	});
	
	//多选列表框
	 $("#liOption").multiselect2side({ 
        selectedPosition: 'right', 
        moveOptions: false, 
        labelsx: '待选区', 
        labeldx: '已选区' 
   }); 
</script>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>