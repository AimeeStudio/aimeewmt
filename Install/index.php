<?php

if (file_exists('./install.lock')) {
    echo '
		<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <body>
        你已经安装过该系统，如果想重新安装，请先删除站点Install目录下的 install.lock 文件，然后再安装。
        </body>
        </html>';
    exit;
}
header('Content-Type: text/html; charset=UTF-8');
define('SITEDIR', _dir_path(substr(dirname(__FILE__), 0, -8)));

$sqlFile = 'aimee.sql';
if (!file_exists(SITEDIR . 'Install/' . $sqlFile)) {
    echo '缺少必要的安装文件!';
    exit;
}
$step = isset($_GET['step']) ? $_GET['step'] : 1;

switch ($step) {
    case '1':
        include_once ("./go.html");
        exit();

    case '2':

            $dbHost = trim($_POST['dbHost']);
            $dbPort = trim($_POST['dbPort']);
            $dbName = trim($_POST['dbName']);
            $dbHost = empty($dbPort) || $dbPort == 3306 ? $dbHost : $dbHost . ':' . $dbPort;
            $dbUser = trim($_POST['dbUser']);
            $dbPwd = trim($_POST['dbPwd']);
            $dbPrefix = empty($_POST['dbPrefix']) ? 'ai_' : trim($_POST['dbPrefix']);


            $conn = @ mysql_connect($dbHost, $dbUser, $dbPwd);
            if (!$conn) {
                  echo '<script>location.href=\'no.html\';</script>';
                exit;
            }
            mysql_query("SET NAMES 'utf8'"); 

            if (!mysql_select_db($dbName, $conn)) {
                if (!mysql_query("CREATE DATABASE IF NOT EXISTS `" . $dbName . "` DEFAULT CHARACTER SET utf8;", $conn)) {
                    echo '数据库 ' . $dbName . ' 不存在，也没权限创建新的数据库！';
                    exit;
                }
                mysql_select_db($dbName, $conn);
            }

            $sqldata = file_get_contents(SITEDIR . 'Install/' . $sqlFile);
            $sqlFormat = sql_split($sqldata, $dbPrefix);


            $counts = count($sqlFormat);

            for ($i = 0; $i < $counts; $i++) {
                $sql = trim($sqlFormat[$i]);

                     $ret = mysql_query($sql);
            }

            if ($i == 999999)
                exit;

            $strConfig = file_get_contents(SITEDIR . 'Data/Conf/config.php');
            $strConfig = preg_replace("/'DB_HOST'\s*\=\>\s*'.*?'\,/is", "'DB_HOST' => '".$dbHost."',", $strConfig);
            $strConfig = preg_replace("/'DB_NAME'\s*\=\>\s*'.*?'\,/is", "'DB_NAME' => '".$dbName."',", $strConfig);
            $strConfig = preg_replace("/'DB_USER'\s*\=\>\s*'.*?'\,/is", "'DB_USER' => '".$dbUser."',", $strConfig);
            $strConfig = preg_replace("/'DB_PWD'\s*\=\>\s*'.*?'\,/is", "'DB_PWD' => '".$dbPwd."',", $strConfig);
            $strConfig = preg_replace("/'DB_PORT'\s*\=\>\s*'.*?'\,/is", "'DB_PORT' => '".$dbPort."',", $strConfig);
            $strConfig = preg_replace("/'DB_PREFIX'\s*\=\>\s*'.*?'\,/is", "'DB_PREFIX' => '".$dbPrefix."',", $strConfig);
            file_put_contents(SITEDIR . 'Data/Conf/config.php',$strConfig);
             echo '<script>location.href=\'ok.html\';</script>';

        exit();

}

function sql_execute($sql, $tablepre) {
    $sqls = sql_split($sql, $tablepre);
    if (is_array($sqls)) {
        foreach ($sqls as $sql) {
            if (trim($sql) != '') {
                mysql_query($sql);
            }
        }
    } else {
        mysql_query($sqls);
    }
    return true;
}

function sql_split($sql, $tablepre) {

    if ($tablepre != "think_")
        $sql = str_replace("think_", $tablepre, $sql);
    $sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=utf8", $sql);

    $sql = str_replace("\r", "\n", $sql);
    $ret = array();
    $num = 0;
    $queriesarray = explode(";\n", trim($sql));
    unset($sql);
    foreach ($queriesarray as $query) {
        $ret[$num] = '';
        $queries = explode("\n", trim($query));
        $queries = array_filter($queries);
        foreach ($queries as $query) {
            $str1 = substr($query, 0, 1);
            if ($str1 != '#' && $str1 != '-')
                $ret[$num] .= $query;
        }
        $num++;
    }
    return $ret;
}

function _dir_path($path) {
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/')
        $path = $path . '/';
    return $path;
}
?>