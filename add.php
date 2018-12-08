<?php
set_time_limit(0);
include 'setting.php';

$dir = "H:/spotlight/assets/";

$data = mysql_select("SELECT * FROM spotlight order by id ");

foreach ($data as $v) {
	$datastr[] = $v['str'];
	$datamd5[] = $v['md5'];
	$dataonlyid[] = $v['onlyid'];
	$dataid[] = $v['id'];
	$data_id = $v['onlyid'];
}



$array = array();
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if ($file == '..' || $file == '.') {
				continue;
			}

			$filename = substr($file,0,-4);
			$filemd5 = md5_file ($dir . $file);
			$fileinfo = getimagesize($dir . $file);
			if ($fileinfo[0] < 1080) {
				continue;
			}
			$exif = @ exif_read_data($dir . $file, 'IFD0');
			if (is_array($exif) && array_key_exists('DateTimeOriginal', $exif)) {
				$filetime = strtotime($exif['DateTimeOriginal']);
			} elseif (is_array($exif) && array_key_exists('DateTime', $exif)) {
				$filetime = strtotime($exif['DateTime']);
			} else {
				$filetime = filemtime ($dir . $file);
			}

			$temp = array($filename, $filemd5);
			$array[$filetime][] = $temp;
        }
        closedir($dh);
    }
}

ksort($array);
?>
<style>
.picarea {
	overflow:hidden;
	width:950px;
}
.pic {
	float:left;
	overflow:hidden;
	width:800px;
}
.pic img {
	float:left;
}
</style>
<?php
foreach($array as $no=>$item) {
	foreach($item as $k=>$v) {
		$filetime = $no;
		$filename = $array[$no][$k][0];
		$filemd5 = $array[$no][$k][1];
		if (in_array($filename, $datastr) && in_array($filemd5, $datamd5)){
			//echo '<img src="/assets/assets/' . $filename . '.jpg" width="150" />';
		} elseif (in_array($filemd5, $datamd5)){
			$key = array_search($filemd5, $datamd5);
			$data_onlyid = $dataonlyid[$key];
			echo '<div class="picarea"><div class="pic"><img src="/assets/assets/' . $filename . '.jpg" width="150" />' . $filename . ' <br/> ' . $filemd5 . '  <br/> ' . date("Y-m-d H:i:s",$filetime);
			echo ' <br/>file have same add onlyid';
			if ($data_onlyid % 2 == 0) {
				$t = $data_onlyid - 1; echo $t;
			} else {
				 echo $data_onlyid;
			}
			echo '<input value="' . $data_onlyid . '" ></input><button onclick="additem(this, \'' . $filename . '\', \'' . $filemd5 . '\')">入库</button></div>';
			echo '<a href="onlylist.php?onlyid=' . $data_onlyid . '"><img src="http://okvviq1ac.bkt.clouddn.com/spotlight/'  . $datastr[$key]. '.jpg?imageView2/2/w/100" width="150" /></a>';
		} else {
			$data_onlyid = 0;
			echo '<div class="picarea"><div class="pic"><img src="/assets/assets/' . $filename . '.jpg" width="150" />' . $filename . ' <br/> ' . $filemd5 . '  <br/> ' . date("Y-m-d H:i:s",$filetime);
			echo  'new image<input value="'  . '" ></input><button onclick="additem(this, \'' . $filename . '\', \'' . $filemd5 . '\')">入库</button></div>';
		}
		echo '</div>';
	}
}
?>
<script src="static/common.js"></script>
<script>
function additemcb(a) {
	alert(a);
}
function additem(e, id,md5) {
	var onlyid = e.previousSibling.value;
	xc_ajax.post('addspotlight.php','id=' + id + '&md5=' + md5 + '&onlyid=' + onlyid, additemcb);

}
</script>