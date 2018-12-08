<?php
set_time_limit(0);
include 'setting.php';

$data = mysql_select("SELECT * FROM spotlight ");

	foreach($data as $v) {
		if ($v['md5'] == '') {
			echo $md5 = md5('assets/' . $v['str'] . '.jpg');
			if ($md5) {
				mysql_query("update spotlight set md5 = '$md5' where str = '{$v['str']}'");
			}
		}
	}
	echo  '<br />' . PHP_EOL;
?>