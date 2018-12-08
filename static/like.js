document.getElementsByClassName("btn")[0].onclick = function () {
	num = document.getElementsByClassName("likemuch")[0].innerHTML;
	if ( ! num) {
		num = 0;
	} else {
		num = parseInt(num);
	}
	document.getElementsByClassName("likemuch")[0].innerHTML = num +1;
	xc_ajax.get(this.href, function(res) {

	});
	return false;
}