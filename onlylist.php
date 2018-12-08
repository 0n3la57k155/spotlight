<meta charset="utf-8" />
<?php
set_time_limit(0);
include 'setting.php';
include 'uploadimg.php';
function echouploadImg($a, $b) {
	echo '';
}


$where = '';
if(isset($_GET['onlyid'])) {
	$where = 'where id = ' . $_GET['onlyid'];
}
?>
<link rel="stylesheet" href="pagebar" />
<style>
a {
	color:#666;
	text-decoration: none;
}
</style>
<div>
<?php
mysql_getpage("SELECT count(*) FROM only_spotlight $where ORDER BY id",30);
$data = mysql_getlimit("SELECT * FROM only_spotlight $where ORDER BY id DESC",30);
$i=0;
foreach($data as $v) {
	$i++;
	$str = $v['str'];
	$id = $v['id'];

	$filename = 'assets/' . $str . '.jpg';


	
	echo '<a href="http://okvviq1ac.bkt.clouddn.com/spotlight/' . $str . '.jpg"><img src="http://okvviq1ac.bkt.clouddn.com/spotlight/' . $str . '.jpg?imageView2/2/w/50" width="5%" /></a>' . $id . PHP_EOL;
	$sub_data = mysql_select("SELECT * FROM spotlight WHERE onlyid='$id' ORDER BY id DESC");
	foreach($sub_data as $sub_v) {
		$sub_str = $sub_v['str'];
		$sub_id = $sub_v['id'];
		$type = $sub_v['type'];
		
		if ($type==1) {
			$dir = 'assets/';
		}elseif($type==2) {
			$dir = 'ithome/';
		}elseif($type==3) {
			$dir = 'onedrive/';
		}elseif($type==4) {
			$dir = 'Spotbright/';
		}elseif($type==5) {
			$dir = '聚焦手机版/';
		}elseif($type==6) {
			$dir = 'vn/';
		}elseif($type==7) {
			$dir = 'vk/';
		}elseif($type==8) {
			$dir = 'vk/';
		}elseif($type==9) {
			$dir = 'wallpaper/';
		}elseif($type==10) {
			$dir = 'wallpaper/';
		}
		echo '<a href="' . $dir . $sub_str . '.jpg"><img src="' . $dir . $sub_str . '.jpg?imageView2/2/w/200" width="10%" /></a>'  . uploadimg($dir , $sub_str .'.jpg') . PHP_EOL;
	}
	echo  '<br />' . PHP_EOL;

}
?>
</div>
<?php mpagebar(); ?>
<br /><br /><br /><br />Email:bixinchao#163.com