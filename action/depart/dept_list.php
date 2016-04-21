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
		$sql="select count(*) from dept";
		$total=$db->get_one($sql, MYSQL_NUM);
		$page=new page(array('total'=>$total[0],'perpage'=>10));
		$s="select * from dept " . $page->offset(); // 返回sql限制行数
		$page->show();
		$info=$db->get_all($s);
		$smarty->assign('js_display',2);
		$smarty->assign("info",$info);
		$smarty->assign('title','部门列表');
		$smarty->assign('content','depart/dept_list');
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