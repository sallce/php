<?php
define('RIGHT',true);
session_start();
session_write_close();
require_once '../../base_config.php' ;
//var_dump($_SESSION);die();
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	$sql="select * from frd_group where owner='".$_SESSION['id']."'";
	$frd_group=$db->get_all($sql);
	if(!$_SESSION['login_id'])
	{
		$main->re_url('../../login.php');
	}
	else
	{
		if ( $_POST['sub'] )
		{
		//var_dump($_POST);die();
		
		$error=array();
			if(!$main->post('name'))
			{
				$error['name']="此项为必填项";
			}
			if ( !$main->post('tel_1') )
			{
			
				$error['tel_1']="此项为必填项";
			}elseif ( !preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[056789]{1}[0-9]{8}$/",$main->post('tel_1')) )
			{
				$error['tel_1']="您输入的手机号码有误";
			}
			if ( $main->post('group') == '' )
			{
				$error['group'] = "好友组不能为空!";
			}
			if(!$error)
			{
				$birth="{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
				$new=array_slice($_POST,4,12);
				$new['owner']=$_SESSION['id'];
				$new['name']=$_POST['name'];
				$new['birthd']=$birth;
				$db->insert('friend',$new);
				$smarty->assign('point','1');
				//$main->re_url('list_frd.php');
			}
		}
		if ( $_POST['cancel'] )
		{
			$main->re_url('list_frd.php');
		}
		$s="select * from dept";
		$dept=$db->get_all($s);
	$smarty->assign("new",$_POST);
	$smarty->assign("dept",$dept);
	$smarty->assign("frd_group",$frd_group);
	$smarty->assign("error",$error);
	$smarty->assign('title','添加好友');
	$smarty->assign('content','friend/friend_dd');
	$smarty->assign('js_display',4);
	$smarty->display('index.html');
	}
}
else
{
	$main->re_url('../../login.php');
}


/**
*end file
*/