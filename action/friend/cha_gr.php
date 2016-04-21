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
		if ( $_GET['id'] )
			{
				$s="select * from frd_group where owner='".$_SESSION['id']."'and id='".$_GET['id']."'";
				$old=$db->get_one($s);
				$smarty->assign("old",$old);
				if ( $_POST['yes'] )
				{
					$new['group_name']=$_POST['group_name'];
					$new['note']=$_POST['note'];
					//var_dump($new);die();
					$con="id='".$_GET['id']."' and owner='".$_SESSION['id']."'";
					//var_dump($con);die();
					$db->update('frd_group',$new,$con);
					$smarty->assign('point','1');
				}
				if ( $_POST['cancel'] )
				{
					$main->re_url("edit_gr.php");
				}
				$smarty->assign('title','编辑分组');
				$smarty->assign('content','friend/edit_gr');
				$smarty->assign('js_display',4);
				$smarty->display('index.html');
			}
	}
}
else
{
	$main->re_url('../../login.php');
}




/*
*end file
*/