<?php define('RIGHT',TRUE);

require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

	//判断是否为ajax请求
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
	$messes = $main->post('messes');
	$messes = rtrim($messes,',');
	$mess = explode(',',$messes);
	
	for ( $i=0; $i < count($mess); $i++ )
	{
		//var_dump($mess[$i]);die();
		$db->delete('send',"`con_id` = $mess[$i]");
		$db->delete('content',"`id` = $mess[$i]");
	}
	die('删除成功!');
	
	
}


/**
* end file
*/
