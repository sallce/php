<?php
define('RIGHT',true);
session_start();
session_write_close();
require_once '../../base_config.php' ;
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	if ( !$_SESSION['login_id'] )
	{
		$main->re_url('../../login.php');
	}
	else
	{
		require_once SYSTEM_ROOT.'/model/depart/dept.php' ;
		$right=array();
		$sql="select id,name,path,concat(path,'-',id) as bpath from dept order by bpath";
		$dpt=$db->get_all($sql);
		foreach( $dpt as $key => $value )
		{
			$dpt[$key]['count']=2*(count(explode('-',$value['bpath']))-2);
		}
		$sql1="select * from admin where id='".$_SESSION['id']."'";
		$right=$db->get_one($sql1);
		if($right['pid']=='0')
		{
			if($main->post('sub'))
			{
			$error=array();
				if(!strlen($main->post('name')))
				{
					$error['name']="部门名不能为空";
				}
				if ( !strlen($main->post('header')) )
				{
					$error['header']="负责人不能为空";
				}
				if ( !strlen($main->post('office_phone')) )
				{
					$error['office_phone']="办公电话不能为空";
				}
				if ( !strlen($main->post('header_tel')) )
				{
					$error['header_tel']="联系方式不能为空";
				}
				if(!$error)
				{
					$in=array_slice($_POST,0,8);
					$sql1="select * from dept where id='".$_POST['up_dept']."'";
					$up_dept=$db->get_one($sql1);
					$in['pid']="{$up_dept['id']}";
					$in['path']="{$up_dept['path']}"."-{$in['pid']}";
					unset($in['up_dept']);
					//var_dump($in);die();
					$db->insert('dept',$in);
					$main->re_url('dept_list.php');
				}
			}
			$smarty->assign('dept',$dpt);
			$smarty->assign('js_display',2);
			$smarty->assign('error',$error);
			$smarty->assign('title','增加部门');
			$smarty->assign('content','depart/add_dept');
			$smarty->display('index.html');
		}
		else
		{
			$dept->re_url('dept_list.php');
		}
	}
}
else
{
	$main->re_url('../../login.php');
}



/*
end file
*/