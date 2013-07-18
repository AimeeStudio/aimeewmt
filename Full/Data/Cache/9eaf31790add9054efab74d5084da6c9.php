<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.simpletip-1.3.1.js"></script>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />


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

function setVal(suoshuId,suoshuName) {
	document.getElementById("xianSuoshu").innerHTML = suoshuName;
	document.getElementById("suoshuId").value = suoshuId;
}
</script>

</head>

<body>

      <div class="content">
        <div class="page-header">
          <h3 class="fl">管理分类</h3>
          <div class="user_message fr"><i class="icon-s-cog"></i>管理您的分类信息</div>
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
                        <th>属性</th>
                        <th width="5%" class="table-textcenter">排序</th>
                        <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(is_array($fenleiList)): $i = 0; $__LIST__ = array_slice($fenleiList,$offset,$length,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fl): $mod = ($i % 2 );++$i;?><tr>
                		<td align="center" class="table-textcenter"><input name="duoxuan" type="checkbox" value="<?php echo ($fl["id"]); ?>" /></td>
                        <td class="table-textcenter"><?php echo ($fl["id"]); ?></td>
                        <td><?php echo ($fl["cl_name"]); ?></td>
                        <td class="table-textcenter"><?php if($fl["cl_type"] == '0'): ?>栏目<?php else: ?>外链<?php endif; ?></td>
                        <td class="table_config">
                        <a href="<?php echo U('Class/setShuxing?shuxing=1&id='.$fl["id"]);?>" <?php if(($fl["cl_att"]) == "1"): ?>class="open"<?php endif; ?> >显示</a>
                        <a href="<?php echo U('Class/setShuxing?shuxing=2&id='.$fl["id"]);?>" <?php if(($fl["cl_att"]) == "2"): ?>class="open"<?php endif; ?> >隐藏</a>
                        <?php if($fl["cl_type"] == '0'): ?><a data-toggle="modal" href="#myModal" data-backdrop="false" onClick="setVal(<?php echo ($fl["id"]); ?>,'<?php echo ($fl["cl_name"]); ?>');">移动</a>
                        <a href="<?php echo U('Class/add_class?suoshuId='.$fl["id"]);?>">增加子类</a><?php endif; ?></td>
                        <td class="table-textcenter"><?php echo ($fl["cl_sort"]); ?></td>
                        <td class="table_config"><a href="<?php echo U('Class/add_class?id='.$fl["id"]);?>">编辑</a><a href="<?php echo U('Class/del_class?id='.$fl["id"]);?>">删除</a></td>
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
                <option value="1">批量显示</option>
                <option value="2">批量隐藏</option>
                <option value="3">批量删除</option>
            </select>
            </div>
            <div class="pagination-i">
                <?php echo ($page); ?>
            </div>
        </div>
        <div class="copyright"></div>
      </div>
      <!--end Right Content-->  


<!--弹出窗口-->
<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>栏目移动</h3>
  </div>
  <div class="modal-body">
    <p class="tx_mid f12">现栏目&nbsp;&nbsp;
    	<span id="xianSuoshu">公司新闻</span>
    </p>
    <form class="form-inline" name="form2" action="<?php echo U('Class/suoshu_yidong');?>" method="post">
    <input type="hidden" name="suoshuId" id="suoshuId" />
    <p class="tx_mid f12">移动到&nbsp;&nbsp;
    	<select class="span3" name="cl_class">
            <option value="0"></option>
          <?php if(is_array($suoshu)): $i = 0; $__LIST__ = $suoshu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ss["id"]); ?>" ><?php echo ($ss["cl_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
         </select>
    </p>
    </form>
    
  </div>
  <div class="modal-footer">
    <a class="btn btn-primary input-mini" data-dismiss="modal" onClick="formSubmit();">确&nbsp;&nbsp;定</a>
  </div>
</div>
<script type="text/javascript">
function formSubmit() {
	//alert(document.form1.action);
	document.form2.submit();
}

</script>
<!-- end 弹出窗口-->
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>