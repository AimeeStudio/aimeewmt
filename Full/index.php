<?php
//开启调试模式
define('APP_DEBUG', true);
define('APP_NAME', '');
define('APP_PATH', './Source/');
//定义缓存存放路径
define("RUNTIME_PATH", "./Data/");
//定义配置文件存放路径
define("CONF_PATH", RUNTIME_PATH . "Conf/");
//定义项目模板存放路径
define("TMPL_PATH", "./Template/");
//加载框架入口文件
require('./Source/ThinkPHP/ThinkPHP.php');

?>