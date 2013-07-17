<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/bootstrap.js"></script>

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
	document.newsform.submit();
}

function huiFu(itemId,reply) {
	document.getElementById("id").value = itemId;
	document.getElementById("reply").value = reply;
}

</script>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/Admin/Css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
      <div class="content">
        <div class="page-header">
          <h3 class="fl">留言管理</h3>
          <div class="user_message fr"><a href="message.html"><i class="icon-s-cog"></i>管理您的留言</a></div>
          <div class="cl"></div>
        </div>
        <div class="minbox">
       
        		<form name="newsform" method="post" action="__URL__/batch">

        	<table class="table table-bordered table-striped">
            	<thead>
                	<tr>
                    	<th width="4%" class="table-textcenter">
                      选择                     </th>
                        <th width="8%" class="table-textcenter">编号</th>
                        <th width="15%">标题</th>
                        <th width="19%">内容</th>
                        <th width="11%">回复</th>
                      	<th width="29%" class="table-textcenter">留言时间</th>
                        <th width="14%">操作</th>
                  </tr>
                </thead>
                <tbody>

               <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
                		<td align="center" class="table-textcenter"><input name="" type="checkbox" value="" /></td>
                        <td ><?php echo ($rs["id"]); ?></td>
                        <td><?php echo ($rs["name"]); ?></td>
                        <td><?php echo ($rs["content"]); ?></td>
                        <td><?php if($rs["reply"] != ''): ?>已回复<?php else: ?>未回复<?php endif; ?></td>
                        <td class="table-textcenter"><?php echo (date("Y.n.j H:i:s",$rs["postdate"])); ?></td>
                        <td class="table_config"><a href="#myModa3" data-toggle="modal" onClick="huiFu(<?php echo ($rs["id"]); ?>,<?php echo ($rs["reply"]); ?>)">回复</a><a href="__URL__/del/id/<?php echo ($rs["id"]); ?>">删除</a></td>
                	</tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
                		<td colspan="7" class="popover-td">         
                              <a href="#" class="popover-btn" rel="popover" data-placement="top" data-animation="true" data-selector="true" data-content="<?php switch($rs["types"]): case "0": ?>留言<?php break;?>     
						<?php case "1": ?>合作<?php break;?>
						<?php case "2": ?>建议<?php break;?>
						<?php case "3": ?>投诉<?php break;?>
						<?php default: ?>类型<?php endswitch;?>" data-original-title="类型">目的</a>               
                        <a href="#" class="popover-btn" rel="popover" data-placement="top" data-animation="true" data-selector="true" data-content="<?php echo ($rs["qq"]); ?>" data-original-title="QQ">QQ</a>
                        <a href="#" class="popover-btn" rel="popover" data-placement="top" data-content="<?php echo ($rs["email"]); ?>" data-original-title="邮箱">邮箱</a>
                        <a href="#" class="popover-btn" rel="popover" data-placement="top" data-content="<?php echo ($rs["phone"]); ?>" data-original-title="电话">电话</a>
                       
                       
                        <a href="#" class="popover-btn" rel="popover" data-placement="top" data-content="<?php echo ($rs["clientip"]); ?>" data-original-title="IP">IP</a>
                        </td>
                    </tr>
           
                    
                </tbody>
             
         
               
            </table>
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
        </div>
        <div class="copyright"></div></div>
     </form>
 
<!--弹出窗口-->
<form name="newsform" method="post" action="__URL__/reply">
<div class="modal hide" id="myModa3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">在输入框中输入您的回复内容</h3>
  </div>
  <div class="modal-body">
  	<div class="modal-reply">
       <input name="id" id="id" type="text" value="<?php echo ($rs["id"]); ?>" style="display:none;">
       <input  value="<?php echo ($rs["name"]); ?>" >
  		 <textarea cols="" rows="" id="reply" name="reply"><?php echo ($rs["reply"]); ?></textarea>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary">发布</button>
  </div>
</div><!--end myModa2-->
</form>
<script>
	$(document).ready(function(){
		$("a[rel=popover]")
      	.popover()
      	.click(function(e) {
        	e.preventDefault()
      	})
		
	});
</script>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>
</body>
</html>