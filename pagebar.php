<?php
header('Content-Type: text/css');
?>
a {
	color:#001ba0;
	text-decoration: none;
}
.wrapper {

}

/* Pagebar */
.pagebar{
	font-size:14px;
	padding: 28px 0;
}
.pagebar a, .pagebar .span, .pagebar .select{
	margin-left: 5px;
	float:left;
	width:32%;
	text-align:center;
	padding:5px 0;
	border:1px #fff solid;
	background: #cecece;
	font-size:2em;
}
.pagebar .select{
    position: relative;

}
.pagebar select{
    position: absolute;  
    left: 0px;  
    top: 0px;  
	opacity: 0;
	width: 100%;
	height:100%;

}
.pagebar .on{
	border:2px #ededed solid;
}
.pagebar .first{
	margin-left: 0;
}