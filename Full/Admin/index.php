<?php
//开启调试模式
define('APP_DEBUG', true);
//定义项目名称和路径
define('APP_NAME', 'Admin');
define('APP_PATH', './');
//定义缓存存放路径
define("RUNTIME_PATH", "../Data/");
//定义配置文件存放路径
define("CONF_PATH", RUNTIME_PATH . "Conf/");
//加载框架入口文件
require('../Source/ThinkPHP/ThinkPHP.php');

?>