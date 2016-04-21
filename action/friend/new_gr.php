<?php
define('RIGHT',true);
session_start();
session_write_close();
require_once '../../base_config.php' ;
require_once SYSTEM_ROOT.'/common/page.class.php' ;
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	if(!$_SESSION['login_id'])
	{
		$main->re_url('../../login.php');
	}
	else
	{
	if ( $_POST['yes'] )
	{
		$new=array();
		$new['owner']=$_SESSION['id'];
		$new['group_name']=$_POST['name'];
		$new['note']=$_POST['note'];
		$db->insert('frd_group',$new);
		$smarty->assign('point','1');
	}
	if ( $_POST['cancel'] )
	{
		$main->re_url('edit_gr.php');
	}
		$smarty->assign('error',$error);
		$smarty->assign('title','添加分组');
		$smarty->assign('content','friend/new_gr');
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