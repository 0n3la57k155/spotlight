<?php
include 'setting.php';

if(! isset($_GET['id'])) {
	exit;
}
$str = $_GET['id'];
$url = $web_pic . $str . '.jpg';

$data = mysql_getrow("SELECT * FROM spotlight WHERE str = '$str'");
$only_data = mysql_getrow("SELECT * FROM only_spotlight WHERE str = '$str'");

$title = $only_data['title'];
$caption = $only_data['caption'];
$like = $only_data['like'];
$id = $only_data['id'];
$md5 = $data['md5'];


if ($only_data['id']%2==1) {
	$mid = $only_data['id'] + 1;
	$m = mysql_getrow("SELECT * FROM only_spotlight WHERE id = '$mid'");
	$mimg = $m['str'];
	$mtitle = '1080x1920';
}elseif ($only_data['id']%2==0) {
	$mid = $only_data['id'] - 1;
	$m = mysql_getrow("SELECT * FROM only_spotlight WHERE id = '$mid'");
	$mimg = $m['str'];
	$mtitle = '1920x1080';
	
	$title = $m['title'];
	$caption = $m['caption'];

}
	$previd = $id + 2;
	$nextid = $id - 2;
	$prev = mysql_getrow("SELECT * FROM only_spotlight WHERE id = '$previd'");
	$next = mysql_getrow("SELECT * FROM only_spotlight WHERE id = '$nextid'");
	mysql_xquery("UPDATE only_spotlight SET view1 = view1+1 WHERE str='$str'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title><?php if ($title) {echo $title . ' - ';} ?><?php if ($caption) {echo $caption . ' - ';} ?>Windows Spotlight Images</title>
<link rel="stylesheet" href="static/style.css" />
<script src="static/common.js"></script>
</head>
<body>
<div class="main">
	<div class="pic">
<?php
echo '<img src="' . $url . '" />' . PHP_EOL;
?>
	</div>
	<div class="side">
		<div class="home"><a href="index.php">Windows Spotlight Images</a></div>
		<div class="info"><h1><?php echo $title; ?></h1><h2><?php echo $caption; ?></h2></div>
		<div class="md5">md5: <?php echo $md5; ?></div>
		<div class="like"><a class="btn" href="like.php?id=<?php echo $str; ?>">Like</a> <span class="likemuch"><?php echo $like; ?></span> <span class="redheart">♥</span></div>
		<div><a class="btn widthbtn" href="<?php echo $url; ?>?attname=" title="Get the original image">Download</a></div>
		<div><?php if (! empty($prev)): ?><a class="btn widthbtn" href="image.php?id=<?php echo $prev['str']; ?>">Prev</a><?php endif; ?></div>
		<div><?php if (! empty($next)): ?><a class="btn widthbtn" href="image.php?id=<?php echo $next['str']; ?>">Next</a><?php endif; ?></div>
		<div><a class="btn widthbtn" href="image.php?id=<?php echo $mimg; ?>"><?php echo $mtitle; ?></a></div>
		</div>
</div>
<script src="static/view.js"></script>
<script src="static/like.js"></script>
<script src="static/img.js"></script>
</body>
</html>