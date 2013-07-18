<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
function right_load(url) {
	alert(url);
	$("#right").load(url);
}
</script>
    <h1 class="logo"><a href="home.html" title="Aimee Admin">Aimee Admin</a></h1>
    <div class="mainnav">
      <ul class="unstyled">
        <li><a href="<?php echo U('Index/home');?>" target="myframe" ><?php echo (L("index")); ?></a></li>
        <li class="hide"><a href="#">菜单一</a></li>
        <li class="hide"><a href="#">菜单二</a></li>
      </ul>
 <a href="#caidan" role="button" class="custom_menu" data-toggle="modal"><?php echo (L("custom_menu")); ?></a> </div>
    <!--end mainnav-->
    <div class="user_info">
      <ul class="nav nav-pills pull-right">
        <li class="dropdown" id="menu1"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1"> <i class="icon-user"></i> <?php echo (L("admin_user")); echo (session('adminname')); ?> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#"><?php echo (L("admin_home")); ?></a></li>
            <li><a href="#myModa2" role="button" data-toggle="modal"><?php echo (L("admin_password")); ?></a></li>
            <li><a href="#"><?php echo (L("web_cache")); ?></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo U('Public/logout');?>"><?php echo (L("exit")); ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
    
    
    
    
    
    
    
    
    <!--自定义菜单开始-->
    
    <div class="modal hide" id="caidan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">自定义菜单</h3>
  </div>
  <div class="modal-body">
  	<div class="customNav">
    <p>页头菜单（最多增加8个）</p>
    <ul class="customNav_first">
    	<li><p>首页</p><a href="#">取消</a></li>
        <li><p>菜单一</p><a href="#">取消</a></li>
    </ul>
    <ul>
    	<li><p>基本配置</p><a href="#">增加</a></li>
        <li><p>全局设置</p><a href="#">增加</a></li>
        <li><p>安全设置</p><a href="#">增加</a></li>
        <li><p>增加分类</p><a href="#">增加</a></li>
        <li><p>管理分类</p><a href="#">增加</a></li>
        <li><p>分类参数</p><a href="#">增加</a></li>
        <li><p>增加内容</p><a href="#">增加</a></li>
        <li><p>内容管理</p><a href="#">增加</a></li>
        <li><p>分类参数</p><a href="#">增加</a></li>
    </ul>
    </div><!--end customNav-->
  </div>
  <div class="modal-footer">
    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">停用</button>
    <button class="btn btn-primary">配置完成</button>
  </div>
</div>
    
    
    
        <!--自定义菜单结束-->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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