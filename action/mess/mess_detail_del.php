<?php define('RIGHT',TRUE);

require_once '../../base_config.php';

session_start();
session_write_close();
	
	//判断是否为ajax请求
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
	$messes = $main->post('messes');
	$messes = rtrim($messes,',');
	$mess = explode(',',$messes);
	//var_dump($mess);die();
	
	for ( $i=0; $i < count($mess); $i++ )
	{
		$db->delete('send',"`id` = $mess[$i]");
	}
	die('删除成功!');
	
	
}


/**
* end file
*/
