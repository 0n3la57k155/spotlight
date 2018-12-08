<meta charset="utf-8" />
<?php
include 'setting.php';
?>
<div>
<?php
mysql_getpage("SELECT count(*) FROM spotlight WHERE type =10 ORDER BY id",100);
$data = mysql_getlimit("SELECT * FROM spotlight WHERE type =10 ORDER BY id DESC",100);
$i=0;
foreach($data as $v) {
	$str = $v['str'];
	$id = $v['id'];
	$onlyid = $v['onlyid'];	
	$url = $os_pic . $str . '.jpg';	
	echo '<a href="only.php?onlyid=' . $onlyid . '"><img src="' . $url . '" width="5%" /></a>' . PHP_EOL;
}
?>
</div>
<?php mpagebar(); ?>