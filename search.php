<meta charset="utf-8" />
<?php
include 'setting.php';

function is_url( $text )
{  
    return filter_var( $text, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) !== false;  
}
?>
<form>
文件名
<input name="q" />
<input type="submit" />
</form>

<form>
URL
<input name="q" />
<input type="submit" />
</form>

<form method="post" enctype="multipart/form-data">
Upload
<input type="file" name="imgfile" id="imgfile" onchange="submit()"  />
<input type="submit" />
</form>

<form action="onlylist.php">
onlyID
<input name="onlyid" />
<input type="submit" />
</form>
<table>
<tr>
<td>
<?php
if (isset($_GET['q']) && is_url( $q )) {
	$md5 = md5(file_get_contents($q));
	$where = "md5 = '$md5'";
} elseif(isset($_FILES['imgfile']) && ! is_array($_FILES['imgfile']['error'])) {
	$md5 = md5_file($_FILES['imgfile']['tmp_name']);
	$where = "md5 = '$md5'";
} elseif(isset($_GET['q'])) {
	$str = $_GET['q'];
	$where = "str LIKE '%$str%'";
} else {
	exit;
}
$data = mysql_select("SELECT * FROM spotlight WHERE $where  order by id");

	foreach($data as $sub_v) {
		$sub_str = $sub_v['str'];
		$sub_id = $sub_v['id'];
		$type = $sub_v['type'];
		
		if ($type==1) {
			$dir = '/assets/assets/';
		}elseif($type==2) {
			$dir = '/assets/ithome/';
		}elseif($type==3) {
			$dir = '/assets/onedrive/';
		}elseif($type==4) {
			$dir = '/assets/Spotbright/';
		}elseif($type==5) {
			$dir = '/assets/聚焦手机版/';
		}elseif($type==6) {
			$dir = '/assets/vn/';
		}elseif($type==7) {
			$dir = '/assets/vk/';
		}elseif($type==8) {
			$dir = '/assets/vk/';
		}elseif($type==9) {
			$dir = '/assets/wallpaper/';
		}elseif($type==10) {
			$dir = '/assets/wallpaper/';
		}
		echo '<a href="' . $dir . $sub_str . '.jpg"><img src="' . $dir . $sub_str . '.jpg?imageView2/2/w/200" width="10%" /></a>'  . $sub_v['onlyid'] . PHP_EOL;
	}
	echo  '<br />' . PHP_EOL;
?>
</td>
</table>