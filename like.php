<?php
include 'setting.php';

if(! isset($_GET['id'])) {
	exit;
}
$str = $_GET['id'];
mysql_xquery("UPDATE only_spotlight SET `like` = `like` + 1 WHERE str = '$str'");