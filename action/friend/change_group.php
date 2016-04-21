<?php
define('RIGHT',true);

require_once '../../base_config.php' ;
require_once SYSTEM_ROOT.'/common/page.class.php' ;
session_start();
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
$group_id = $main->post('group');
$_SESSION['group_id'] = $group_id;
}
session_write_close();
if($main->check_shell($_SESSION['shell'],$_SESSION['login_id']))
{
	if(!$_SESSION['login_id'])
	{
		$main->re_url('../../login.php');
	}
	else
	{
		$sql1="select * from frd_group where owner='".$_SESSION['id']."'";
		$frd_group=$db->get_all($sql1);
		//判断是否为ajax请求

			//$group_id = $main->post('group');
			$group_sql="and `group`='".$_SESSION['group_id']."'";
			$sql="select count(*) from friend where owner='".$_SESSION['id']."'{$xp_sql} {$group_sql}";
			//var_dump($sql);die();
			$total=$db->get_one($sql, MYSQL_NUM);
			$page=new page(array('total'=>$total[0],'perpage'=>10));
			$s="select * from friend where  owner='".$_SESSION['id']."' {$xp_sql} {$group_sql}" . $page->offset(); // 返回sql限制行数
			$page->show();												//and col = value
			$info=$db->get_all($s);
			foreach( $info as $key => $value )
			{
				if($value['group'] !='0'){
				$sql = "SELECT `group_name` FROM `frd_group` WHERE `owner` = '{$_SESSION['id']}' AND `id` = '{$value['group']}'";
				$group_name = $db->get_one($sql);
				$info[$key]['group'] = $group_name['group_name'];
				}else
				{
					$info[$key]['group'] = "系统分组";
				}
			}
			//$dpt="select * from dept";
			//$dept=$db->get_all($dpt);
			#var_dump($info);die();
		$smarty->assign('group_id',$group_id);
		$smarty->assign("total",$total[0]);
		$smarty->assign("frd_group",$frd_group);
		$smarty->assign("info",$info);
		//$smarty->assign("dept",$dept);
		$smarty->assign('title','好友列表');
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
		//$smarty->assign('content','friend/friend_list');
		$smarty->assign('js_display',4);
		$smarty->display('friend/change_group.html');
		
}else
{
		$smarty->assign('content','friend/change_group');
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