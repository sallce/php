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
		$sql1="select count(*) from frd_group where owner='".$_SESSION['id']."'" ;
		$total=$db->get_one($sql1);
		$page=new page(array('total'=>$total[0],'perpage'=>20));
		$sql="select * from frd_group where owner='".$_SESSION['id']."'". $page->offset();
		$info=$db->get_all($sql);
		$page->show();
		//var_dump($info);die();
		$smarty->assign('info',$info);
		$smarty->assign('title','好友分组');
		$smarty->assign('content','friend/list_gr');
		$smarty->assign('js_display',4);
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