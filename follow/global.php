<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-29
 * Time: 11:49
 */
header("Content-type: text/html; charset=utf-8");
session_start();
$admin=isset($_SESSION['admin'])?$_SESSION['admin']:'';

$hostFile = "followHost.txt";
$urlFile = "followUrl.txt";