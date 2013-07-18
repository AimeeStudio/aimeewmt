<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
	$(document).ready(function() {

		 $(".sidebar_nav li span").click(
		function(){
			if($(this).next("ul").is(":hidden")) 
				{	
					$(".sidebar_nav li ul").slideUp(300);
					$(this).next("ul").slideDown(300);
				}
			else
				{
					$(this).next("ul").slideUp(300);
				};
	});	
	});
</script>


      <div class="content">
        <div class="sidebar_nav">
          <ul class="unstyled">
          
            <li><span><a href="#"><i class="icon-wrench"></i><?php echo (L("web_site")); ?></a></span>   <!--菜单大类-->
            
            <ul class="unstyled hide">                                          
                <li><a href="<?php echo U('Setting/basic');?>" target="myframe"><i class="caret_left"></i><?php echo (L("basic_configuration")); ?></a></li>
				 <li><a href="<?php echo U('Setting/all?item=1');?>" target="myframe"><i class="caret_left"></i><?php echo (L("all_site")); ?></a></li>
				  <li><a href="<?php echo U('Setting/security?item=2');?>" target="myframe"><i class="caret_left"></i><?php echo (L("safety_site")); ?></a></li>
                <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
            
            </ul>
            </li>
            
            
<!--分类管理-->
            
            
            
            
            
            
            
            <li><span><a href="#"><i class="icon-list"></i><?php echo (L("menu_manage")); ?></a></span>   <!--菜单大类-->
             <ul class="unstyled hide">                                         
                <li><a href="<?php echo U('Class/add_class');?>" target="myframe"><i class="caret_left"></i><?php echo (L("add_menu")); ?></a></li>
		
                  <li><a href="<?php echo U('Class/class_manage');?>" target="myframe"><i class="caret_left"></i><?php echo (L("manage_menu")); ?></a></li>
                     <li><a href="<?php echo U('Class/class_parameters');?>" target="myframe"><i class="caret_left"></i><?php echo (L("menu_parameter")); ?></a></li>
                <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
            
            </ul>
            </li>
            
            
            
            
            
<!--内容管理-->
            
            
            <li><span><a href="#"><i class="icon-folder-open"></i><?php echo (L("content_manage")); ?></a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                <li><a href="<?php echo U('Content/content_add');?>" target="myframe"><i class="caret_left"></i><?php echo (L("add_content")); ?></a></li>
                <li><a href="<?php echo U('Content/content_manage');?>" target="myframe"><i class="caret_left"></i><?php echo (L("manage_content")); ?></a></li>
				
                 <li><a href="<?php echo U('Content/content_filter');?>" target="myframe"><i class="caret_left"></i>内容过滤</a></li>
                 <li><a href="<?php echo U('Content/content_replace');?>" target="myframe"><i class="caret_left"></i>批量替换</a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>
            
            
            
            
            
<!--单页管理-->
            
            
            <li><span><a href="#"><i class="icon-list-alt"></i>单页管理</a></span>  <!--菜单大类-->
              <ul class="unstyled hide">
                <li><a href="<?php echo U('Page/add_page');?>" target="myframe"><i class="caret_left"></i>增加单页</a></li>
				 <li><a href="<?php echo U('Page/list_page');?>" target="myframe"><i class="caret_left"></i><?php echo (L("manage_onepage")); ?></a></li>
				 <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
              </ul>
            </li>
            
            
            
            
<!--用户管理-->
            
            
            
            <li><span><a href="#"><i class="icon-user"></i>用户管理</a></span>
            	<ul class="unstyled hide">
                <li><a href="<?php echo U('Setting/user_manage');?>" target="myframe"><i class="caret_left"></i>用户管理</a></li>
                <li><a href="<?php echo U('Setting/user_configure');?>" target="myframe"><i class="caret_left"></i>权限配置</a></li>

               <li><a href="#" target="myframe"><i class="caret_left"></i>注册用户</a></li>
                <li><a href="#" target="myframe"><i class="caret_left"></i>注册配置</a></li>

              	</ul>
            </li>
            
            
            
            
  <!--留言管理-->          
            
            
            
            
             <li><span><a href="#"><i class="icon-comment"></i>留言管理</a></span>
             	<ul class="unstyled hide">
                	<li><a href="<?php echo U('Setting/message');?>" target="myframe"><i class="caret_left"></i>留言管理</a></li>
                	<li><a href="<?php echo U('Setting/message_set');?>" target="myframe"><i class="caret_left"></i>留言配置</a></li>
                	<li><a href="<?php echo U('Setting/message_content');?>" target="myframe"><i class="caret_left"></i>内容留言</a></li>
                	<li><a href="<?php echo U('Setting/message_contnetSet');?>" target="myframe"><i class="caret_left"></i>内容配置</a></li>
              	</ul>
             </li>
            
            
            

              
            
          <!--表单管理--> 
            
            
             <li><span><a href="#"><i class="icon-upload"></i>表单管理</a></span>                 
               <ul class="unstyled hide">
                <li><a href="<?php echo U('Setting/table_add');?>" target="myframe"><i class="caret_left"></i>增加表单</a></li>
                <li><a href="<?php echo U('Setting/table_set');?>" target="myframe"><i class="caret_left"></i>表单设置</a></li>
                <li><a href="<?php echo U('Setting/table_info');?>" target="myframe"><i class="caret_left"></i>增加好后命名查看</a></li>
              </ul>                 
             </li>
             
             
             
       <!--模版修改-->  
             
             
            
            
            <li><span><a href="#"><i class="icon-folder-open"></i>模版修改</a></span>
             	<ul class="unstyled hide">
                	<li><a href="<?php echo U('Setting/template_manage');?>" target="myframe"><i class="caret_left"></i>模板管理</a></li>
                	<li><a href="<?php echo U('Setting/template_tag');?>" target="myframe"> <i class="caret_left"></i>便利管理</a></li>
              	</ul>
             </li>
            
            
            
            
    <!--维护备份-->  
            
            
            
             <li><span><a href="#"><i class="icon-refresh"></i>维护备份</a></span>
             	<ul class="unstyled hide">
                	<li><a href="<?php echo U('Setting/backup_manage');?>" target="myframe"><i class="caret_left"></i>数据库备份</a></li>
                	<li><a href="<?php echo U('Setting/backup_reduction');?>" target="myframe"><i class="caret_left"></i>数据库还原</a></li>
                	<li><a href="<?php echo U('Setting/backup_update');?>" target="myframe"><i class="caret_left"></i>更新系统缓存</a></li>
              	</ul>
             </li>
            
            
            
            
            
            
           <!--扩展包箱-->       
            
            
            
            
            <li><span><a href="#"><i class="icon-share"></i><?php echo (L("expand_app")); ?></a></span><!--菜单大类-->
             <ul class="unstyled hide">
                <li><a href="<?php echo U('Expand/install');?>" target="myframe"><i class="caret_left"></i><?php echo (L("install_expand")); ?></a></li>
                <li><a href="<?php echo U('Expand/manage');?>" target="myframe"><i class="caret_left"></i><?php echo (L("manage_expand")); ?></a></li>
                
            <li><a href="<?php echo U('Expand/expand_ superConfig');?>" target="myframe"><i class="caret_left"></i>超级配置</a></li>
                
            <li class="hide"><span><a href="#"><i class="icon-folder-open"></i>隐藏内容</a></span></li>
            </ul>
            </li>
            
            
            
            
            
          </ul>
          
          
          
          
          
          
          
        </div>
        <!--end sidebar_nav--> 
      </div>
      <!--end Left content-->