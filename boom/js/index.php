<?php
require "config.php";
require "function.php";
$ip = getIp();//当前访问者ip
autoCleanYesterday(0);
$num = howTimes($ip);//第几次访问

if (isset($jsConfig[$num])) {
    $jsFile = $jsConfig[$num];
} else {
    $jsFile = $jsConfig[0];
}
//echo "document.writeln('第$num 次访问 [这一行调试用,调试结束后删除index.php ".$jsFile."行]');";
if (file_exists(JS_DIR . $jsFile)) {
    $content = file_get_contents(JS_DIR . $jsFile);
} else {
    $content = "";
}
header('Content-type: application/x-javascript');
header("Expires:-1");
header("Cache-Control:no_cache");
header("Pragma:no-cache");
header('Accept-Ranges: bytes');
//echo "document.writeln('第$num 次访问 [这一行调试用,调试结束后删除index.php ".__LINE__."行]');";
echo $content;