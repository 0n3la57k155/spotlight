var ps = '';
for(i=0; j=navigator.plugins[i]; i++) {
	ps += j.name + ' / ';
}
var tz = new Date().getTimezoneOffset()/60;

$url = 'tongji.php?url=' + location + '&x=' + screen.width + '&y=' + screen.height + '&platform=' + navigator.platform + '&language=' + navigator.language + '&ps=' + ps + '&tz=' + tz;
$url += '&iw=' + innerWidth;
$url += '&ih=' + innerHeight;
$url += '&referrer=' + encodeURIComponent(document.referrer);
	xc_ajax.get($url, function(res) {

	});	
