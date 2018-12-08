<meta charset="utf-8" />
<title>Windows Spotlight Images</title>
<?php
include 'setting.php';
include("Mobile_Detect.php");
$detect = new Mobile_Detect();
$type = 0;
if ($detect->isMobile()) {
    $type = 0;
}
?>
<link rel="stylesheet" href="pagebar.php" />
<h1>Windows Spotlight Images</h1>
<h3>提示：本站图片质量很高，使用手机请在WIFI下访问。</h3>
<div>
<?php
$where = '';
if (isset($_GET['from'])) {
	$where = " AND createtime > ' ". $_GET['from'] . "'";
}
mysql_getpage("SELECT count(*) FROM only_spotlight where mod(id,2) = $type $where ORDER BY id ",30);
$data = mysql_getlimit("SELECT * FROM only_spotlight where mod(id,2) = $type $where ORDER BY id DESC",30);
$i=0;
if ($type == 1) {
foreach($data as $v) {
	$i++;
	$str = $v['str'];
	$id = $v['id'];
	$url = $web_pic . $str . '.jpg?imageView2/2/w/440/q/100';	
	echo '<a href="image.php?id=' . $str . '"><img src="' . $url . '" width="33%" /></a>' . PHP_EOL;
}
} else {
foreach($data as $v) {
	$i++;
	$str = $v['str'];
	$id = $v['id'];
	$url = $web_pic . $str . '.jpg?imageView2/2/w/880/q/100';	
	echo '<a href="image.php?id=' . $str . '"><img src="' . $url . '" width="49%" /></a>' . PHP_EOL;
}
}

?>
</div>
<?php mpagebar(); ?>
<br /><br />
<div style="">友情链接 <a href="https://spotlight.it-notes.ru/">https://spotlight.it-notes.ru</a></div>
<div style="text-align:center;"><a href="http://www.shijuewuyu.com/spotlight/">http://www.shijuewuyu.com/spotlight</a> ⓑ bixinchao#163.com 由七牛云存储免费提供图片服务</div>
<br />