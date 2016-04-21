<?php
define('RIGHT',true);
session_start();
session_write_close();
require_once '../../base_config.php' ;
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	if(!$_SESSION['login_id'])
	{
		$main->re_url('../../login.php');
	}
	else
	{
		//if ( $_POST['yes'] )
		//{
		
		//判断是否为ajax请求
		if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
		{
			$con="id='".$_GET['id']."'";
			$db->delete('friend',$con);
		}
			//$main->re_url('list_frd.php');
		//}
		//if ( $_POST['cancel'] )
		//{
		//	$main->re_url('list_frd.php');
		//}
	}
	/**
	$smarty->assign('title','删除好友');
	$smarty->assign('content','friend/delete_f');
	$smarty->assign('js_display',4);
	$smarty->display('index.html');
	*/
}
else
{
	$main->re_url('../../login.php');
}



/*
*end file
*/