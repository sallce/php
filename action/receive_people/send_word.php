<?php define('RIGHT',TRUE);
/**
* 用php来算出写了多少个汉字
*/

if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
	if(isset($_POST['word'])){
		echo iconv_strlen((iconv("UTF-8", "GBK",$_POST['word'])));
	}
}

/**
* end file
*/
