<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-29
 * Time: 10:30
 */

$name = 'wyd';
$pwd = 'root123';

if (!isset($_POST['name']) || $_POST['name'] !== $name || !isset($_POST['pwd']) || $_POST['pwd'] !== $pwd) {
    echo "登录失败";
} else {
    session_start();
    $_SESSION['admin'] = $name;
    $_SESSION['adminTime'] = time();
}
?>

<form method="post">
    <input name="name">
    <input type="password" name="pwd">
    <input type="submit">
</form>




