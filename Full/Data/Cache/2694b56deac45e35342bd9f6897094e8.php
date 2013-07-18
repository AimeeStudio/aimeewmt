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
</head>

<body>

      <div class="content">
        <div class="page-header">
          <h3 class="fl">增加单页</h3>
          <div class="user_message fr"><i class="icon-wrench"></i>增加您的单页内容</div>
          <div class="cl"></div>
        </div>
        <form name="form1" id="form1" class="form-inline" action="<?php echo U('Page/add_page');?>" method="post">
          <table class="table set_table">
          <thead>
            <tr>
              <th width="11%" >功 能</th>
              <th >配 置</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>单页名称</td>
              <td><input class="span4" name="pg_name" id="pg_name" type="text" x-webkit-speech /><span class="m1em_t">排序</span><input class="span1" name="pg_sort" type="text" /></td>
            </tr>
            <!-- 外链 -->
            <tr >
              <td>编辑内容</td>
              <td><textarea name="pg_content" cols="" rows="20" style="width:95%;"></textarea></td>
            </tr>
            <tr >
              <td>单页模板</td>
              <td><select id="pg_tplpage" class="span3" name="pg_tplpage">
              <?php if(is_array($tplfile)): $i = 0; $__LIST__ = $tplfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tf): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($tf); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </td>
            </tr>
            
          </tbody>
        </table>
        </form>
        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();">增加单页</a> </p>
        <div class="copyright"></div>
  </div>
    
    
    
    <!--编辑器JS-->

<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/plugins/code/prettify.js"></script>
<!--编辑器給textarea赋值-->
<script>
	var editor1;
    KindEditor.ready(function(K) {
        editor1 = K.create('textarea[name="pg_content"]', {
            cssPath : '__PUBLIC__/kindeditor/plugins/code/prettify.css',
			themeType : 'simple',
            uploadJson : '__PUBLIC__/kindeditor/php/upload_json.php',
            fileManagerJson : '__PUBLIC__/kindeditor/php/file_manager_json.php',
            allowFileManager : true,
			
			
			items: ['source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen',  'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage', 'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak', 'anchor', 'link', 'unlink', '|', 'about']

        });
        prettyPrint();
    });
</script>
    

<script type="text/javascript">
function formSubmit() {
	//alert(document.form1.action);
	editor1.sync();
	document.form1.submit();
}

</script>
<!--页脚调用-->
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>

</html>