<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (L("welcome")); ?></title>
<link href="__PUBLIC__/Admin/Css/mobile.css" rel="stylesheet" media="screen and(max-device-width:480px)"/>
<link href="__PUBLIC__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--/*调用后台bootstrap样式*/-->
<link href="__PUBLIC__/Admin/Css/aimee_login.css" rel="stylesheet" type="text/css" />
<!--/*调用后台综合样式表*/-->
<script src="__PUBLIC__/Admin/Js/jquery.js"></script><!--/*调用后JS文件*/-->
<script src="__PUBLIC__/Admin/Js/jquery.form.js"></script><!--/*调用后JS文件*/-->
<script src="__PUBLIC__/Admin/Js/bootstrap-modal.js"></script><!--/*调用后JS，弹出文件*/-->

<SCRIPT type="text/javascript">
$(document).ready(function(){
	$(".verification").hover(function() {
	 	$(".ver_code_pop").show();
	});
	//验证码输入框获得焦点显示验证码
	$(".verification").focus(function() {
	 	$(".ver_code_pop").show();
	});
	//验证码输入框失去焦点隐藏验证码，但无法更新验证码
	//$(".verification").blur(function() {
	//	$(".ver_code_pop").hide();
	//});
		

	$(document).keyup(function(event) {
        //获取当前按键的键值   
        //jQuery的event对象上有一个which的属性可以获得键盘按键的键值   
        var keycode = event.which;
		//按回车触发事件
        if (keycode == 13) {
			
			login();
				
        }
    });

	
	$(".aimee_blue").click (
	 	function () {
    		$("#aimee_blue_plan").slideToggle("slow");
  	});

});

</script>
<script>
//验证码刷新
function refreshCode()
{
	//重载验证码
	var timenow = new Date().getTime();
	document.getElementById('verifyImg').src = "<?php echo U('Public/verify?time=');?>"+timenow;
}

//用户登录
function login()
{
	//用户提交
	$.ajax({
	  type: 'POST',
	  url: "<?php echo U('Public/checklogin');?>",
	  data:{userName: $('#userName').attr('value'),password: $('#password').attr('value'),verify: $('#verify').attr('value')},
	  dataType: "json",
	  success: function(json) {
		if( json.result == 1 ){
			//登陆成功
			window.location.href="<?php echo U('Index/index');?>"; 
		} else {
			$( '#myModal' ).modal('show');
			$( '#modal' ).html( '<font style="font-family:Arial;font-size:12px;color:#c3413f">' +  json.msg + '</font>');
		}
		
	  }
	})
}

//重置
function textReset()
{
	document.getElementById('userName').value = "";
	document.getElementById('password').value = "";
	document.getElementById('verify').value = "";
	document.getElementById('error_span').innerHTML = "";
	refreshCode();
}

</script>
</head>

<body>
<div class="header">
  <div class="login_logo"><img src="__PUBLIC__/Admin/Images/login_logo.png" alt="" /></div>
</div>
<!-- 便捷通道 -->
<div class="fast_track">
  <div class="fast_track_nav">
    <div class="aimee_blue"><span class="hide"><i class="icon-wrench icon-white"></i></span></div>
    <!--class="aimee_blue"显示功能 -->
    <div class="aimee_orange"><span class="hide"><i class="icon-user icon-white"></i></span></div>
    <!--class="aimee_orange"显示功能 -->
    <div class="aimee_red"><span class="hide"><i class="icon-envelope icon-white"></i>3</span></div>
    <!--class="aimee_red"显示功能 --> 
  </div>
  <div class="fast_track_plan">
    <div class="hide" id="aimee_blue_plan"> <i class="icon-wrench"></i>&nbsp;&nbsp;
      <input name="" type="radio" value="" />
      PC Model
      <input name="" type="radio" value="" />
      Mobile Model
      <input name="" type="radio" value="" />
      Pad Model </div>
  </div>
</div>
<!-- end 便捷通道 -->
<div class="aimee_login">
  <form>
    <div class="login_input_box">
      <input class="username" name="userName" id="userName" type="text"/>
      <input class="password" name="password" id="password" type="password"/>
      <div class="ver_code">
        <div class="ver_code_pop"><img src="<?php echo U("Public/verify");?>" alt="" id="verifyImg" ><span class="refresh_code" onclick="refreshCode();"></span></div>
        <input name="verify" id="verify" class="verification" type="text" />
      </div>
    </div>
    <div class="login_input">
      <button type="button" class="btn btn-inverse" onclick="login();"><?php echo (L("login")); ?></button>
      <button type="button" class="btn btn-inverse" onclick="textReset();"><?php echo (L("reset")); ?></button>
    </div>
  </form>
</div>
<!--end aimee_login--> 

<!--出错弹出窗口-->
<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>登录提示</h3>
  </div>
  <div class="modal-body"> <span id="modal"></span> </div>
  <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">关闭</a> </div>
</div>
<!-- end 用户名密码错误弹出窗口-->
</body>
</html>










<style>



#ie6warn{width:100%;height:30px;background:#000;left:0;text-align:left;z-index:9999;overflow:hidden;filter:alpha(opacity=70);bottom:0;position:absolute;top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,0)||0)-(parseInt(this.currentStyle.marginBottom,0)||0)));}
#ie6warn a{text-decoration:none;}
#ie6warn p{float:left;background:url(__PUBLIC__/Admin/Images/browser.png) no-repeat;margin:0;padding:0 0 0 40px;color:#fff;font:13px/30px Arial,SimSun;}
#ie6warn p li{list-style-type:none;color:#fff;font:13px/30px Arial,SimSun;}
#ie6warn p li a{color:#fff;}
#ie6warn p li a:hover{color:#06c;}
#weiphpBrowser{float:right;padding:5px 10px 0 0;margin:0;}
#weiphpBrowser li{float:left;margin:0 5px;display:inline;list-style-type:none;}
#weiphpBrowser li a{width:20px;height:20px;display:block;background:url(__PUBLIC__/Admin/Images/browser.png) no-repeat;text-indent:-9999em;}
#ie6warn #weiphpFirefox{background-position:0 0;}
#ie6warn #weiphpChrome{background-position:0 -30px;}
#ie6warn #weiphpSafari{background-position:0 -60px;}
#ie6warn #weiphpOpera{background-position:0 -90px;}
#ie6warn #weiphpIE{background-position:0 -120px;}
#ie6warn #weiphpIE6{background-position:10px -146px;}


</style>



<script>
window.onload = function(){
    var ie = (function(){
        var undef,
        v = 3,
        div = document.createElement('div'),
        all = div.getElementsByTagName('i');
        while (
            div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i>< ![endif]-->',
            all[0]
        );
        return v > 4 ? v : undef;
    }());
    if ( ie === 6 ) {
        var ie6warn = '<div id="ie6warn"><p id="weiphpIE6">尊敬的用户，为了更好显示效果，跟进HTML5同步。AIMEE暂不支持IE6，请升级IE9以上版本。</p><ul id="weiphpBrowser"><li><a href="http://www.mozillaonline.com/" id="weiphpFirefox" target="_blank" title="Firefox"></a></li><li><a href="http://www.google.com/chrome/" id="weiphpChrome" target="_blank" title="Chrome"></a></li><li><a href="http://www.apple.com.cn/safari/download/" id="weiphpSafari" target="_blank" title="Safari"></a></li><li><a href="http://www.operachina.com/" id="weiphpOpera" target="_blank" title="Opera"></a></li><li><a href="http://www.microsoft.com/windows/internet-explorer/ie7/" id="weiphpIE" target="_blank" title="IE"></a></li></ul></div>';
        jQuery(document).ready(function($){
            $('body').append( ie6warn );
        });
    }
};
</script>