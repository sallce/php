<?php
define('RIGHT',true);


require_once './base_config.php' ;
require_once './model/log/log.class.php';

session_start();
unset($_SESSION['id']);
unset($_SESSION['login_id']);
unset($_SESSION['shell']);
unset($_SESSION['right']);

$log=new log_note;
if($main->post('sub'))
	{
	$error=array();
	if(!strlen($main->post('user')))
		{
		$error['user']="user name request";
		}
	elseif(!strlen($main->post('pass')))
		{
		$error['pass']="password request";
		}
	elseif($_SESSION['checkcode']!=sha1($main->post('checkcode')))
		{
		$error['checkcode']="code not correct";
		}
	else
		{
		$sql="select * from admin where login_id='".$main->post('user')."'";
		$biao=$db->query($sql);
		$info=mysql_fetch_array($biao);
		if(!$info)
			{
			$error['user']="user name not exist";
			}
		if($info['passwd']!=md5($main->post('pass')))
			{
			$error['pass']="password not correct";
			}
		if(!$error)
			{
			$_SESSION['id']=$info['id'];
			$_SESSION['login_id']=$info['login_id'];
			$_SESSION['shell']=$main->shell_burn($info['login_id']);
			$_SESSION['right'] = $main->right($_SESSION['id']); //user rights
			session_write_close();
			//var_dump($_SESSION);die();
			$log->write_login_log($info['id'],$db);
			
			$main->re_url('index.php');

			}
		}
}
$smarty->assign('error',$error);
$smarty->display('denglu.html');
	
/**
* end file
*/
