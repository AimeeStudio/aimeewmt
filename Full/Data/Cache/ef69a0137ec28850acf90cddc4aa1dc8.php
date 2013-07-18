<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>

<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
<style type="text/css">
body,td,th {
	font-family: Arial, SimSun, "Helvetica Neue", Helvetica, sans-serif;
}
</style>
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
          <h3 class="fl">分类参数</h3>
          <div class="user_message fr"><a href="<?php echo U('Class/class_par_set');?>"><i class="icon-s-cog"></i>增加分类参数</a></div>
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
                        <th width="5%" class="table-textcenter">排序</th>
                        <th>字段名称</th>
                        <th>所属栏目</th>
                        <th width="8%" class="table-textcenter">字段类型</th>
                        <th class="table-textcenter">字段标签</th>
                        <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(is_array($flcsList)): $i = 0; $__LIST__ = $flcsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$flcs): $mod = ($i % 2 );++$i;?><tr>
                		<td align="center" class="table-textcenter"><input name="duoxuan" type="checkbox" value="<?php echo ($flcs["id"]); ?>"></td>
                        <td class="table-textcenter"><?php echo ($flcs["id"]); ?></td>
                        <td><?php echo ($flcs["cl_par_name"]); ?></td>
                        <td><?php echo ($flcs["cl_name"]); ?></td>
                        <td class="table-textcenter">
                        <?php switch($flcs["cl_par_type"]): case "1": ?>文本<?php break;?>
                        <?php case "2": ?>html<?php break;?>
                        <?php case "3": ?>单选<?php break;?>
                        <?php case "4": ?>多选<?php break;?>
                        <?php case "5": ?>货币<?php break;?>
                        <?php case "6": ?>下拉菜单<?php break;?>
                        <?php case "7": ?>倒计时<?php break;?>
                        <?php case "8": ?>开关<?php break;?>
                        <?php case "9": ?>图片上传<?php break;?>
                        <?php case "10": ?>附件<?php break; endswitch;?>
                        </td>
                        <td class="table-textcenter"><?php echo ($flcs["cl_par_key"]); ?></td>
                        <td class="table_config"><a href="<?php echo U('Class/class_par_set?id='.$flcs["id"]);?>">编辑</a><a href="<?php echo U('Class/del_class_par?id='.$flcs["id"]);?>">删除</a></td>
                	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <input type="hidden" name="duoxuanHidden" id="duoxuanHidden" value="" />
                    <input type="hidden" name="piliangHidden" id="piliangHidden" value="" />
                </tbody>
            </table>
            </form>
            <div class="batch_edit">
            <span><input name="" type="checkbox" value="" onclick=CheckAll('selectAll',this)></span>
            <select class="input-small" name="piliang" onChange="setPL();">
            	<option value="0">批量设置</option>
                <option value="1">批量删除</option>
            </select>
            </div>
            <div class="pagination-i">
                <?php echo ($page); ?>
            </div>
        </div>
        <div class="copyright"></div>
     

<!--弹出窗口-->
<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>栏目移动</h3>
  </div>
  <div class="modal-body">
    <p class="tx_mid f12">现栏目&nbsp;&nbsp;
    	公司新闻
    </p>
    
    <p class="tx_mid f12">移动到&nbsp;&nbsp;
    	<select class="span3" name="cl_class">
            <option>公司新闻</option>
            <option>公司产品</option>
         </select>
    </p>
    
  </div>
  <div class="modal-footer">
    <a href="#" class="btn btn-primary input-mini" data-dismiss="modal">确&nbsp;&nbsp;定</a>
  </div>
</div>
<!-- end 弹出窗口-->
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>