<?php
return array(
    'URL_MODEL'=>0, // 如果你的环境不支持PATHINFO 请设置为3
    'URL_HTML_SUFFIX'       => 'html|shtml|xhtml|xml',  // URL伪静态后缀设置
    'DB_TYPE'=>'mysql',     // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => '',     // 数据库名
    'DB_USER' => '',      // 用户名
    'DB_PWD' => '',           // 密码
    'DB_PORT' => '3306',      // 端口
    'DB_PREFIX' => 'ai_',     // 数据库表前缀
	
    'AIMEE_PREFIX'=>'ai',     // AIMEE全局变量前缀
	
    'DEFAULT_TIMEZONE' => 'PRC',	// 默认时区
	'HOME_TMPL_PATH' => '../Template/', //定义前台项目模板存放路径
	'HOME_DEFAULT_THEME' => 'default', // 定义默认模板主题名称
	
	'HOME_UPLOAD_PATH' => './Upload/thumbs/', //定义前台上传文件存放路径
	'ADMIN_UPLOAD_PATH' => '../Upload/', //定义后台上传文件存放路径
	'UPLOAD_FILE_SIZE' => 1024*1024*3, //定义后台上传文件附件大小  3M
	
	'TAGLIB_LOAD' => true,
	'TAGLIB_PRE_LOAD' => 'Ai',
	'TAGLIB_BUILD_IN' => 'cx,ai', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序
	
	'LANG_SWITCH_ON' => true,  // 多语言包功能   true：开启  false：关闭
	'DEFAULT_LANG' => 'zh-cn', // 默认语言
	'LANG_AUTO_DETECT' => false, // 自动侦测语言  true：开启  false：关闭
	'LANG_LIST'=>'en-us,zh-cn,zh-tw,jp,kr'//必须写可允许的语言列表
);
?>