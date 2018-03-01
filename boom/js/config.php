<?php
define("BEGIN_TIME", time());

define("JS_DIR", __DIR__ . "/js/");/*js文件目录*/


/*js文件配置*/
$jsConfig = [
    0 => 'm.js',/*第0个 超出设置范围执行的js*/
    1 => '1.js',/*一次访问的js*/
    2 => '2.js',
    3 => '3.js',
    4 => '4.js',
    5 => '5.js',
    6 => '6.js',
];
/*数据库配置*/
$dbConfig['host'] = "192.168.0.22";
$dbConfig['dbName'] = 'ip';
$dbConfig['dbUser'] = 'root';
$dbConfig['dbPass'] = "root123";
require "mysql.php";
Db::createDb($dbConfig['host'], $dbConfig['dbName'], $dbConfig['dbUser'], $dbConfig['dbPass']);
