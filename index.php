<?php
include 'setting.php';
include("Mobile_Detect.php");
$detect = new Mobile_Detect();
$type = 1;
if ($detect->isMobile()) {
    $type = 0;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Windows Spotlight Images</title>
<link rel="stylesheet" href="pagebar.php" />
<link rel="stylesheet" href="static/style.css" />
<script src="static/common.js"></script>
</head>
<body>
<div class="head_and"><h1>Windows Spotlight Images</h1> <a href="download.php">Download & Github</a></div>
<div class="wrapper">
<?php
$query = "SELECT * FROM only_spotlight WHERE mod(id,2) = $type ORDER BY id DESC";
$count_query = "SELECT COUNT(*) FROM only_spotlight WHERE mod(id,2) = $type";
$data = mysql_fetch($query, $count_query, 10);

foreach($data as $v) {
	$str = $v['str'];
	$url = $web_pic . $str . '.jpg!600';	
	echo '<a href="image.php?id=' . $str . '"><img src="' . $url . '" /></a><br />' . PHP_EOL;
}
?>
</div>
<?php mpagebar(); ?>
<br /><br />
<div style="text-align:center;">ⓑ bixinchao#163.com 由<a href="https://portal.qiniu.com/signup?code=3lcny6zgo60ya" target="_blank">七牛云</a> 腾讯云提供免费存储</div>
<script src="static/view.js"></script>
<script src="static/img.js"></script>
</body>
</html>