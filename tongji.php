<?php
require 'setting.php';

$a1 = is($_SERVER['HTTP_REFERER']);
$a2 = $_SERVER['HTTP_USER_AGENT'];
$a3 = $_SERVER['REMOTE_ADDR'];
$a4 = $_GET['url'];
$a5 = $_GET['x'];
$a6 = $_GET['y'];
mysql_xquery("INSERT wsp_tongji SET `a1` = '$a1', `a2` = '$a2', `a3` = '$a3', `a4` = '$a4', `a5` = '$a5', `a6` = '$a6'");