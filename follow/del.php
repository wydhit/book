<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-29
 * Time: 10:41
 */

require "global.php";

if (empty($admin)) {
    exit("未登录");
}

if (isset($_GET['host']) && !empty($_GET['host'])) {
    $host = file($hostFile);
    foreach ($host as $k => $file) {
        if (trim($file) === trim($_GET['host'])) {
            echo "删除".$file;
            unset($host[$k]);
        }
    }
    file_put_contents($hostFile, join("\r\n", $host));
}

if (isset($_GET['url']) && !empty($_GET['url'])) {
    $url = file($urlFile);
    foreach ($url as $k => $file) {
        if (trim($file) === trim($_GET['url'])) {
            unset($url[$k]);
        }
    }
    file_put_contents($urlFile, join("\r\n", $url));
}
?>

<script>
    setTimeout(function () {
        window.close()
    },200);

</script>

