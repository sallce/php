<?php
	header( 'Content-Type:   text/html;   charset=gbk ');

	$str = "撒旦法撒旦法阿斯顿发发生的阿斯顿发阿斯顿发阿斯顿发阿斯顿发阿斯顿发生大幅撒旦法安守范撒旦发生大幅圣达菲撒旦法打三分阿斯顿方式的方式的方式的范德萨发生大幅撒旦方式的大叔撒旦阿斯顿发撒旦法撒旦法撒旦法撒旦法撒旦法撒旦法的沙发打三分撒旦法撒旦法撒旦法撒旦法撒旦法速度方式";
	echo $a = iconv_strlen(iconv("UTF-8", "GBK", $str))."<br />";
	echo $a/2+8;

?>