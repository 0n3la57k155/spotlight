<?php
include 'setting.php';

if (isset($_POST['id'])) {
	$str = $_POST['id'];
	$md5 = $_POST['md5'];
	$onlyid = $_POST['onlyid'];
	$rs = mysql_select("SELECT * FROM spotlight WHERE md5='$md5'");
	if (empty($onlyid) && empty($rs)) {
//new
		mysql_xquery("INSERT INTO only_spotlight SET str='$str',createtime=NOW()");
		$onlyid = mysqlx_insert_id();
	} elseif (empty($onlyid)) {
//same
		$onlyid = $rs[0]['onlyid'];
		foreach($rs as $v) {echo  $v['str'];
			if ($str == $v['str']) {
				echo 'Already has this picture';
				exit;
			}
		}
	}
	echo $onlyid;
	mysql_xquery("INSERT INTO spotlight SET str='$str', md5='$md5', onlyid='$onlyid', type=1");
	$id = mysqlx_insert_id();
	echo ' * ';echo $id;
}