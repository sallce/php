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
		$sql="select * from admin where login_id='".$_SESSION['login_id']."'";
		$info=mysql_fetch_array($db->query($sql));
		$sql1="select * from dept where id='".$info['dept']."'";
		$dept=mysql_fetch_array($db->query($sql1));
		$smarty->assign("dept",$dept);
		$smarty->assign("error",$error);
		$smarty->assign("info",$info);
		$smarty->assign('title','个人信息');
		$smarty->assign('content','settting/look_inf');
		$smarty->assign('js_display',7);
		$smarty->display('index.html');

	}
}
else
{
	$main->re_url('../../login.php');
}


/*
*end file
*/