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
		if($_POST['sub'])
		{
			$error=array();
			if ( !strlen($main->post('login_id') ))
			{
				$error['login_id']="用户名不能为空";
			}
			if ( !strlen($main->post('name')) )
			{
				$error['name']="姓名不能为空";
			}
			if ( (!strlen($main->post('tel_1'))) && (!strlen($main->post('tel_2'))) )
			{
				$error['tel']="电话至少填写一个";
			}
			if(!$error)
			{
				$birth="{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
				$up=array_slice($_POST,5,6);
				$up['birth']=$birth;
				$up['name']=$_POST['name'];
				$up['login_id']=$_POST['login_id'];
				$db->update('admin',$up,"login_id='{$_SESSION['login_id']}'");
				$main->re_url('./self_baseinfo.php');
			}
		}
		if ( $_POST['cancel'] )
		{
			$main->re_url('./self_baseinfo.php');
		}
		if ( $info['sex']=='0' )
		{
			$sex['man']='selected';
		}
		else
		{
			$sex['nv']='selected';
		}
		$day=explode("-",$info['birth']);
		$smarty->assign("birth",$day);
		$smarty->assign('sex',$sex);
		$smarty->assign("info",$info);
		$smarty->assign("error",$error);
		$smarty->assign('title','修改个人信息');
		$smarty->assign('content','settting/edit_inf');
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