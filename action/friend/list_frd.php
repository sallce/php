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
		$sql1="select * from frd_group where owner='".$_SESSION['id']."'";
		$frd_group=$db->get_all($sql1);
		if ( ($main->post('xp')=='x') and (strlen($main->post('forxp'))))
		{
			$xp_sql="and name='".$main->post('forxp')."'";
		}
		if ( ($main->post('xp')=='p') and (strlen($main->post('forxp'))))
		{
			$xp_sql="and tel_1='".$main->post('forxp')."'";
		}
		
		
			$sql="select count(*) from friend where owner='".$_SESSION['id']."' {$xp_sql} {$group_sql}";
			$total=$db->get_one($sql, MYSQL_NUM);
			$page=new page(array('total'=>$total[0],'perpage'=>10));
			$s="select * from friend where  owner='".$_SESSION['id']."' {$xp_sql} {$group_sql} ORDER BY `id`  DESC" . $page->offset(); // 返回sql限制行数
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
			//var_dump($info);die();
			//$dpt="select * from dept";
			//$dept=$db->get_all($dpt);
			#var_dump($info);die();
		$smarty->assign("total",$total[0]);
		$smarty->assign("frd_group",$frd_group);
		$smarty->assign("info",$info);
		//$smarty->assign("dept",$dept);
		$smarty->assign('title','好友列表');
		$smarty->assign('content','friend/friend_list');
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