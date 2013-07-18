<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jshack.js"></script>

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
function formsearch() {
	alert("111");
	document.form2.submit();
}
</script>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
</head>

<body>

        <div class="page-header">
          <h3 class="fl">管理内容</h3>
          <div class="user_message fr"><i class="icon-wrench"></i>管理您的内容信息</div>
          <div class="cl"></div>
        </div>
        <div class="minbox">
            <form name="form2" method="post" action="__SELF__">
        	<div class="part_search">
            	<div class="fl">
                <span>选择栏目</span>
                <select class="input-large fl" name="lanmu">
                    <option value="0"></option>
                  <?php if(is_array($suoshu)): $i = 0; $__LIST__ = $suoshu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lm): $mod = ($i % 2 );++$i;?><option value="<?php echo ($lm["id"]); ?>" <?php if(($lm["id"]) == $lanmu): ?>selected="selected"<?php endif; ?> ><?php echo ($lm["cl_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                 </select>
                <span>排序</span>
                <select class="input-large fl" name="paixu">
                    <option value="1" <?php if(($paixu) == "1"): ?>selected="selected"<?php endif; ?> >按推荐排序</option>
            		<option value="2" <?php if(($paixu) == "2"): ?>selected="selected"<?php endif; ?> >按ID排序</option>
                	<option value="3" <?php if(($paixu) == "3"): ?>selected="selected"<?php endif; ?> >按时间排序</option>
            	</select>
                &nbsp;&nbsp;
                <input name="neirong" class="span2" id="appendedInputButtons" size="16" value="<?php echo ($neirong); ?>" type="text">
                &nbsp;&nbsp;
                <button class="btn" type="submit">&nbsp;&nbsp;搜&nbsp;索&nbsp;&nbsp;</button>
                </div>
            </div>
            </form>
            <form name="form1" method="post" action="__SELF__">
        	<table class="table table-bordered table-striped">
            	<thead>
                	<tr>
                    	<th width="5%" class="table-textcenter">
                      选择
                      </th>
                        <th width="5%" class="table-textcenter">ID</th>
                        <th>名称</th>
                        <th width="100" class="table-textcenter">分类</th>
                        <th width="100" class="table-textcenter">属性</th>
                        <th width="100" class="table-textcenter">时间</th>
                        <th width="150" class="table-textcenter">操作</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(is_array($contentList)): $i = 0; $__LIST__ = $contentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nr): $mod = ($i % 2 );++$i;?><tr>
                		<td align="center" class="table-textcenter"><input name="duoxuan" type="checkbox" value="<?php echo ($nr["id"]); ?>" /></td>
                        <td class="table-textcenter"><?php echo ($nr["id"]); ?></td>
                        <td><?php echo ($nr["nr_name"]); ?></td>
                        <td class="table-textcenter"><?php echo ($nr["cl_name"]); ?></td>
                        <td class="table-textcenter table_config">
                        <?php if($nr["nr_good"] == '1'): ?><a href="<?php echo U('Content/setShuxing?tuijian=2&id='.$nr["id"]);?>" class="open" >推荐</a>
                        <?php else: ?>
                        <a href="<?php echo U('Content/setShuxing?tuijian=1&id='.$nr["id"]);?>" >推荐</a><?php endif; ?>
                        <a href="#" <?php if($nr["nr_ext"] == '1'): ?>class="open"<?php endif; ?>>外链</a></td>
                        <td class="table-textcenter"><?php echo (date("Y-m-d",$nr["nr_times"])); ?></td>
                        <td class="table_config"><a href="<?php echo U('Content/content_add?id='.$nr["id"]);?>">编辑</a><a href="<?php echo U('Content/del_content?id='.$nr["id"]);?>">删除</a><a data-toggle="modal" href="#myModal" data-backdrop="false" onClick="setVal(<?php echo ($nr["id"]); ?>,'<?php echo ($nr["cl_name"]); ?>');">移动</a><a <?php if($nr["nr_ext"] == '2'): ?>href="<?php echo U('Content/content_view?id='.$nr["id"]);?>"<?php else: ?>href="<?php echo ($nr["nr_exturl"]); ?>"<?php endif; ?> target="_blank">预览</a></td>
                	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <input type="hidden" name="duoxuanHidden" id="duoxuanHidden" value="" />
                    <input type="hidden" name="piliangHidden" id="piliangHidden" value="" />
                </tbody>
            </table>   </form>
            <div class="batch_edit">
            <span><input name="" type="checkbox" value="" onclick=CheckAll('selectAll',this)></span>
            <select class="input-small" name="piliang" onChange="setPL();">
            	<option value="0">批量设置</option>
                <option value="1">批量推荐</option>
                <!--<option value="2">批量外链</option>-->
                <option value="3">批量删除</option>
            </select>
            </div>
            <div class="pagination-i">
                <?php echo ($page); ?>
            </div>
        </div>
        <div class="copyright"></div>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

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
    <form class="form-inline" name="form2" action="<?php echo U('Content/suoshu_yidong');?>" method="post">
    <input type="hidden" name="suoshuId" id="suoshuId" />
    <p class="tx_mid f12">移动到&nbsp;&nbsp;
    	<select class="span3" name="nr_att">
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
</body>
</html>