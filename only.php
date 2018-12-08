<meta charset="utf-8" />
<?php
set_time_limit(0);
include 'setting.php';

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

	$filename = '/pic/assets/' . $str . '.jpg';


	
	echo '<a href="' . $web_pic . $str . '.jpg"><img src="'  . $web_pic .  $str . '.jpg?imageView2/2/w/100" width="5%" /></a>' . $id . PHP_EOL;
	$sub_data = mysql_select("SELECT * FROM spotlight WHERE onlyid='$id' ORDER BY id DESC");
	foreach($sub_data as $sub_v) {
		$sub_str = $sub_v['str'];
		$sub_id = $sub_v['id'];
		$type = $sub_v['type'];
		
		if ($type==1) {
			$dir = '/assets/assets/';
		}elseif($type==2) {
			$dir = '/assets/assets/';//ithome
		}elseif($type==3) {
			$dir = '/assets/onedrive/';//onedrive
		}elseif($type==4) {
			$dir = '/assets/Spotbright/';//Spotbright
		}elseif($type==5) {
			$dir = '/assets/聚焦手机版/';//聚焦手机版
		}elseif($type==6) {
			$dir = '/assets/vn/';//vn
		}elseif($type==7) {
			$dir = '/assets/vk/';//vk
		}elseif($type==8) {
			$dir = '/assets/vk/';//vk
		}elseif($type==9) {
			$dir = '/assets/assets/';//wallpaper
		}elseif($type==10) {
			$dir = '/assets/assets/';//wallpaper
		}
		echo '<a href="' . $dir . $sub_str . '.jpg"><img src="' . $dir . $sub_str . '.jpg?imageView2/2/w/200" width="10%" /></a>' . PHP_EOL;
	}
	echo  '<br />' . PHP_EOL;

}
?>
</div>
<?php mpagebar(); ?>
<br /><br /><br /><br />Email:bixinchao#163.com