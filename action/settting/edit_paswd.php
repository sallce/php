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
		if ( $main->post('sub') )
		{
		$error=array();
			if ( !strlen($main->post('pass_old')) )
			{
				$error['pass_old']="密码不能为空";
			}
			if ( !strlen($main->post('pass1')) )
			{
				$error['pass1']="新密码不能为空";
			}
			if ( $main->post('pass1')!=$main->post('pass2') )
			{
				$error['pass2']="两次输入的密码不一致";
			}
			if ( !$error )
			{
				$sql="select * from admin where login_id='".$_SESSION['login_id']."'";
				$info=mysql_fetch_array($db->query($sql));
				if($info['passwd']!=md5($_POST['pass_old']))
				{
					$error['pass_old']="密码不正确";
				}
				if(!$error)
				{
					$up=array('passwd'=>md5($_POST['pass1']));
					$db->update('admin',$up,"login_id='{$_SESSION['login_id']}'");
				}
			}
		}
		if($_POST['cancel'])
		{
			$main->re_url('self_baseinfo.php');
		}
$smarty->assign('error',$error);
$smarty->assign('title','修改密码');
$smarty->assign('content','settting/edit_paswd');
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