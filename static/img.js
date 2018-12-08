var imgs=document.images;
for(i=0;j=imgs[i];i++) {
	j.onerror = function(){changeNewSrc(this)}	
}

function changeNewSrc(thisImg) {
	if (location.pathname.indexOf('image.php')>0) {
		$style = ''
	} else {
		$style = '!600'
	}
	var host = "http://tx.shijuewuyu.com/";
	newsrc = host + /\S{64}.jpg/.exec(thisImg.src) + $style;
	thisImg.src=newsrc;
}