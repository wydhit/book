<?php
function getIp()
{
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    } else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else if (!empty($_SERVER["REMOTE_ADDR"])) {
        $cip = $_SERVER["REMOTE_ADDR"];
    } else {
        $cip = '';
    }
    preg_match("/[\d\.]{7,15}/", $cip, $cips);
    $cip = isset($cips[0]) ? $cips[0] : 'unknown';
    unset($cips);
    return $cip;
}

function howTimes($ip)
{
    $res = Db::getDb()->findOne("select count from ip_count where ip=?", [$ip]);
    if ($res === false) {/*没有记录*/
        insertOne($ip);
        return 1;
    } else {/*已经有记录了*/
        updateOne($ip);
        return $res['count'] + 1;
    }
}

/**
 * 插入一条新的数据
 * @param $ip
 */
function insertOne($ip)
{
    $time = time();
    $sql = "INSERT INTO `ip_count` (`ip`, `count`, `time`) VALUES (?, 1,$time )";
    Db::getDb()->insert($sql, [$ip]);
}

/**
 * 更新一条新的数据
 * @param $ip
 */
function updateOne($ip)
{
    $time = time();
    $sql = "UPDATE `ip_count` SET `count` = `count`+1 WHERE `ip` = ? ";
    Db::getDb()->insert($sql, [$ip]);
}

function autoCleanYesterday($day = 0)
{
    $time = strtotime(date('Y-m-d', time() - $day * 3600 * 24) . " 00:00:00");/*今天凌晨零点时间戳*/
    $sql = "DELETE FROM `ip_count` WHERE `time` < $time ";/*删除凌晨之前的*/
    $res=Db::getDb()->delete($sql);
}
