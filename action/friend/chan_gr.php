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
		$gr="select * from frd_group where owner='".$_SESSION['id']."'";
		$group=$db->get_all($gr);
		$sql="select * from friend where id='".$_POST['id']."'";
		$info=$db->get_one($sql);
		
		//判断是否为ajax请求
		if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
		{
		
			
			if ( $info['group']==$_POST['group'] )
				{
					$result="好友已所属这个分组!";
				}
			else
			{
			
					if ( $_POST['way']=='0' )//移动
					{
						$new['group']=$_POST['group'];
						$con="`id`='".$_POST['id']."'";
						if ( $db->update('friend',$new,$con) )
						{
							$result = true;
						}
					}
					elseif ( $_POST['way']=='1' )//复制
					{
						$up=array_slice($info,1,count($info)-1);
						$up['group']=$_POST['group'];
						if ( $db->insert('friend',$up) )
						{
							$result = true;
						}
						//$main->re_url('list_frd.php');
					}
			}
			die($result);
		}
		/**
		if ( $_POST['cancel'] )
		{
			$main->re_url('list_frd.php');
		}
		*/
	}
	$smarty->assign('frd_group',$group);
	$smarty->assign('info',$info);
	$smarty->assign('title','操作好友');
	//$smarty->assign('content','friend/chan_gr');
	$smarty->assign('js_display',4);
	$smarty->display('friend/chan_gr.html');
}
else
{
	$main->re_url('../../login.php');
}


/**
*end file
*/