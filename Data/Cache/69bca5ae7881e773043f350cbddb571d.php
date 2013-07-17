<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
function right_load(url) {
	alert(url);
	$("#right").load(url);
}
</script>

    <h1 class="logo"><a href="<?php echo U('Index/home');?>" title="Aimee Admin" target="myframe">Aimee Admin</a></h1>
    <div class="mainnav">
      <ul class="unstyled">
       
      </ul>
 </div>
    <!--end mainnav-->
<div class="user_info">
      <ul class="nav nav-pills pull-right">
        <li class="dropdown" id="menu1"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1"> <i class="icon-user"></i> <?php echo (L("admin_user")); echo (session('adminname')); ?> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#"><?php echo (L("admin_home")); ?></a></li>
            <li><a href="#myModa2" role="button" data-toggle="modal"><?php echo (L("admin_password")); ?></a></li>
            <li><a href="<?php echo U('Public/delete_cache');?>"><?php echo (L("web_cache")); ?></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo U('Public/logout');?>"><?php echo (L("exit")); ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--修改密码开始-->
    
    
<div class="modal hide" id="myModa2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">修改密码</h3>
  </div>
  <div class="modal-body">
  	<div class="change_password">
    	<table width="100%">
        	<tr>
            	<td width="33%" align="right"><span class="cName">输入原密码</span></td>
                <td width="67%"><input class="span3" name="" type="text" /></td>
            </tr>
            <tr>
            	<td align="right"><span class="cName">输入新密码</span></td>
                <td><input class="span3" name="" type="text" /></td>
            </tr>
            <tr>
            	<td align="right"><span class="cName">确认新密码</span></td>
                <td><input class="span3" name="" type="text" /></td>
            </tr>
        </table>
    </div>
  </div>
    <div class="modal-footer">
    <button class="btn btn-primary">修改</button>
  </div>
</div>

            <!--修改密码结束-->