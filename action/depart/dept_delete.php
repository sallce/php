<?php
define('RIGHT',true);
session_start();
session_write_close();

/**
* 这个文件我改成用ajax来提示删除工作   by:佚名
*/


require_once '../../base_config.php' ;
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	if(!$_SESSION['login_id'])
	{
		$main->re_url('../../login.php');
	}
	else
	{
		$right=array();
		$sql1="select * from admin where id='".$_SESSION['id']."'";
		$right=$db->get_one($sql1);
		if($right['pid']=='0')
		{
			
			
			//var_dump($_GET['id']);die();
			$result = $db->delete('dept',"id={$_GET['id']}");
			//var_dump($result);die();
			//$main->re_url("dept_list.php");
			
			//else if ( $main->post('cancel') )
			//{
			//	$main->re_url("dept_list.php");
			//}
		}
		//else
		//{
		//	$main->re_url("dept_list.php");
		//}
	}
	/**
	$smarty->assign('js_display',2);
	$smarty->assign('title','删除部门');
	$smarty->assign('content','depart/dept_delete');
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