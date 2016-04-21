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
		require_once SYSTEM_ROOT.'/model/depart/dept.php' ;
		$right=array();
		$sql1="select * from admin where id='".$_SESSION['id']."'";
		$right=$db->get_one($sql1);
		if($right['pid']=='0')
		{
		
		$sql="select * from dept where id='".$_GET['id']."'";
		$info=$db->get_one($sql);
		if(!$info)
		{
			$main->re_url('dept_list.php');
		}
		$error=array();
		if($_POST['sub'])
		{
			if(!strlen($main->post('name')))
			{
				$error['name']="部门名称不能为空";
			}
			if(!strlen($main->post('header')))
			{
				$error['header']="请指定部门负责人";
			}
			if(!strlen($main->post('header_tel')))
			{
				$error['name']="电话不能为空";
			}
			if ( (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$_POST['email']))&&($main->post('mail')!="" ))
			{
				$error['email']="请输入正确的邮箱";
			}
			if ( !$error )
			{
				$up=array_slice($_POST,0,7);
				$db->update('dept',$up,"id='".$_GET['id']."'");
				$main->re_url("dept_list.php");
			}
		}
		if($_POST['cancel'])
		{
			$main->re_url('dept_list.php');
		}
		$smarty->assign('js_display',2);
		$smarty->assign("error",$error);
		$smarty->assign("info",$info);
		$smarty->assign('title','修改部门信息');
		$smarty->assign('content','depart/dept_change');
		$smarty->display('index.html');

		}
		else
		{
			$main->re_url('dept_list.php');
		}
	}
}
else
{
	$main->re_url('../../login.php');
}



/**
*end file
*/