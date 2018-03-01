<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-29
 * Time: 9:51
 */

require "global.php";

/*host*/
if (file_exists($hostFile)) {
    $host = file($hostFile);
} else {
    $host = [];
}
$hostUnique = array_unique($host);
foreach ($hostUnique as $k => $item) {
    $hostUnique[$k] = trim($item);
    if (empty(trim($item))) {
        unset($hostUnique[$k]);
    }
}
if (count($hostUnique) !== count($host)) {
    file_put_contents($hostFile, join("\r\n", $hostUnique));
}
/*url*/
if (file_exists($urlFile)) {
    $url = file($urlFile);
} else {
    $url = [];
}
$urlUnique = array_unique($url);
foreach ($urlUnique as $ks => $items) {
    $urlUnique[$ks] = trim($items);
    if (empty(trim($items))) {
        unset($urlUnique[$ks]);
    }
}
if (count($urlUnique) !== count($url)) {
    file_put_contents($urlFile, join("\r\n", $urlUnique));
}

/*筛选*/
$hostLimit = isset($_GET['host']) ? trim($_GET['host']) : '';
if ($hostLimit) {
    foreach ($urlUnique as $ks => $items) {
        if (strpos($items, $hostLimit) == false) {
            unset($urlUnique[$ks]);
        }
    }
}




?>
<html>
<head>
    <title>记录</title>
    <style>
        .left {
            width: 30%;
            float: left;
        }
        .right {
            width: 69%;
            float: right;
        }
        .box,.right,.left {
            border: 1px #efefef solid;
        }
        .foot{
            position: absolute;
            left: 0;
            bottom: 0;

        }
    </style>
</head>
<body>
<div class="box">
    <div class="left">
        <div>网站记录</div>
        <?php foreach ($hostUnique as $key => $value): ?>
            <a href="?host=<?php echo $value ?>"><?php echo $value ?>[筛选]</a>
            | <a target="_blank" href="http://<?php echo $value ?>">访问</a>

        <?php if ($admin): ?>
                |<a target="_blank" href="del.php?host=<?php echo $value ?>">[删除]</a>
        <?php endif ?>

            <br/>
        <?php endforeach ?>
    </div>
    <div class="right">
        <div><a href="?">网址记录</a></div>
        <?php foreach ($urlUnique as $key => $value): ?>
            <?php echo $value ?>

            <?php if ($admin): ?>
                |<a target="_blank" href="del.php?url=<?php echo $value ?>">[删除]</a>
            <?php endif ?>


            <br/>


        <?php endforeach ?>
    </div>
</div>


<div class="foot">
    <a href="admin.php">login</a>
    javascript:(function (href) {window.open("http://<?php echo $_SERVER['HTTP_HOST'] ?>/followIn.php?href="+href);})(top.location.href);
</div>
</body>
</html>

