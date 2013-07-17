<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>


<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />


<!--全选反选JS-->
<script>
function CheckAll(value,obj)  {
var form=document.getElementsByTagName("form")
 for(var i=0;i<form.length;i++){
    for (var j=0;j<form[i].elements.length;j++){
    if(form[i].elements[j].type=="checkbox"){ 
    var e = form[i].elements[j]; 
    if (value=="selectAll"){e.checked=obj.checked}     
    else{e.checked=!e.checked;} 
       }
    }
 }
}

function setPL() {
	j = 0;
	for ( i = 0; i < document.getElementsByName("duoxuan").length; i++){
		if (document.getElementsByName("duoxuan").item(i).checked) {
			if ( j == 0 ) {
				document.getElementById("duoxuanHidden").value = document.getElementsByName("duoxuan").item(i).value;
			} else {
				document.getElementById("duoxuanHidden").value = document.getElementById("duoxuanHidden").value + "," + document.getElementsByName("duoxuan").item(i).value;
			}
			j++;
		}
	}
	document.getElementById("piliangHidden").value = document.getElementsByName("piliang").item(0).value;
	if ( j==0 || document.getElementById("piliangHidden").value==0 ) {
		return;
	}
	document.form1.submit();
}
</script>



</head>

<body>

        <div class="page-header">
          <h3 class="fl">单页管理</h3>
          <div class="user_message fr"><i class="icon-wrench"></i>管理您的内容信息</div>
          <div class="cl"></div>
        </div>
        <div class="minbox">
             <form name="form1" method="post" action="__SELF__">
        	<table class="table table-bordered table-striped">
            	<thead>
                	<tr>
                    	<th width="5%" class="table-textcenter">
                       选择
                      </th>
                        <th width="5%" class="table-textcenter">ID</th>
                        <th>名称</th>
                        <th width="5%" class="table-textcenter">类型</th>
                        <th width="120" class="table-textcenter">操作</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(is_array($pageList)): $i = 0; $__LIST__ = $pageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pg): $mod = ($i % 2 );++$i;?><tr>
                		<td align="center" class="table-textcenter"><input name="duoxuan" type="checkbox" value="<?php echo ($pg["id"]); ?>" /></td>
                        <td class="table-textcenter"><?php echo ($pg["id"]); ?></td>
                        <td><?php echo ($pg["pg_name"]); ?></td>
                        <td class="table-textcenter">单页</td>
                        <td class="table_config"><a href="<?php echo U('Page/add_page?id='.$pg["id"]);?>">编辑</a><a href="<?php echo U('Page/del_page?id='.$pg["id"]);?>">删除</a>
                        
                        <a href="
                        
 ../index.php?m=index&a=actionpage&actype=page&fid=<?php echo ($pg["id"]); ?>
                        
                        
                        
                        
                        
                        " target="_blank">预览</a></td>
                   <!-- <?php echo U('Page/page_view?id='.$pg["id"]);?> 预览临时解决办法-->
                        
                        
                        
                	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <input type="hidden" name="duoxuanHidden" id="duoxuanHidden" value="" />
                    <input type="hidden" name="piliangHidden" id="piliangHidden" value="" />
                </tbody>
            </table>
                  </form>
            <div class="batch_edit">
            <span><input name="" type="checkbox" onclick=CheckAll('selectAll',this)></span>
            <select class="input-small" name="piliang" onChange="setPL();">
            	<option value="0">批量设置</option>
                <option value="3">批量删除</option>
            </select>
            </div>
            <div class="pagination-i">
                <?php echo ($page); ?>
            </div>

 <div class="copyright"></div>
        </div>

<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>