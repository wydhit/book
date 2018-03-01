<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-03
 * Time: 13:32
 */
$time = microtime(true);

$ch = curl_init();
//设置选项，包括URL
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8888/index2.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//执行并获取HTML文档内容
$output = curl_exec($ch);
//释放curl句柄
curl_close($ch);
//打印获得的数据
print_r($output);

echo microtime(true) - $time;