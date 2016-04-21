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
		//var_dump($_GET['id']);die();
		$sql = "SELECT `group_name`,`id` FROM `frd_group` WHERE `owner` = '{$_SESSION['id']}'";
		$all_group = $db->get_all($sql);
		$sql = "SELECT `group_name` FROM `frd_group` WHERE `id` = '{$_GET['id']}'";
		$group_name = $db->get_one($sql);
		//判断是否为ajax请求
		if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
			if ( $_GET['way']=='delete' )
			{
				$cond1="`owner`='".$_SESSION['id']."' and `group`='".$_GET['id']."'";
				$cond="`id`='".$_GET['id']."'";
				$db->delete("frd_group",$cond);
				$db->delete("friend",$cond1);
				die('1');
			}
			elseif ( $_GET['way']=='change' )
			{
				$new['group']=$_GET['one_group'];
				if($_GET['one_group'] == $_GET['id']){
					die('不能移至相同的分组!');
				}
				$con="owner='".$_SESSION['id']."' and `group`='".$_GET['id']."'";
				$db->update("friend",$new,$con);
				$con1="id='".$_GET['id']."'";
				$db->delete("frd_group",$con1);
				die('1');
			}
			
		}
	}
		
		$smarty->assign('group_name',$group_name);
		$smarty->assign('group_id',$_GET['id']);
		$smarty->assign('all_group',$all_group);
		$smarty->assign('title','删除分组');
		//$smarty->assign('content','friend/delete_gr');
		$smarty->assign('js_display',4);
		$smarty->display('friend/delete_gr.html');
}
else
{
	$main->re_url('../../login.php');
}




/*
*end file
*/