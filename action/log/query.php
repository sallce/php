<?php define('RIGHT',TRUE);
require_once '../../base_config.php';


if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$start_time=isset($_GET['st'])?$_GET['st']:'';
$end_time=isset($_GET['et'])?$_GET['et']:'';
$type=isset($_GET['t'])?$_GET['t']:'';
$login_id=isset($_GET['ld'])?$_GET['ld']:'';

if($login_id)
{
	$sql="select * from `admin` where `login_id`='$login_id'";
	$que=$db->get_one($sql);
	if($type==1)
	{
		$sql="select count(`id`) from `msg_log` where `user_id`='{$que['id']}'&&`time`>='$start_time'&&`time`<='$end_time'";
		$count = $db->get_one($sql, MYSQL_NUM);
		$page = new page(array('total'=>$count[0],'perpage'=>8));
		$tmp = $page->offset();
		$page->show();

		$sql="select * from `msg_log` where `user_id`='{$que['id']}'&&`time`>='$start_time'&&`time`<='$end_time'$tmp";
		$info=$db->get_all($sql);

		for($i=0;$i<count($info);$i++)
		{
			$sql="select * from `content` where `id`='{$info[$i]['cont_id']}'";
			$con=$db->get_one($sql);
			$info[$i]['content']=$con['content'];
		}
	}
	if($type==2)
	{
		$sql="select count(`id`) from `login_log` where `user`='{$que['id']}'&&`log_time`>='$start_time'&&`log_time`<='$end_time'";
		$count = $db->get_one($sql, MYSQL_NUM);
		$page = new page(array('total'=>$count[0],'perpage'=>14));
		$tmp = $page->offset();
		$page->show();

		$sql="select * from `admin` where `id`='{$que['id']}'";
		$user=$db->get_one($sql);
		$sql="select * from `login_log` where `user`='{$que['id']}'&&`log_time`>='$start_time'&&`log_time`<='$end_time'$tmp";
		$info=$db->get_all($sql);
	}
}
else
{
	if($type==1)
	{
		$sql="select count(`id`) from `msg_log` where `user_id`='{$_SESSION['id']}'&&`time`>='$start_time'&&`time`<='$end_time'";
		$count = $db->get_one($sql, MYSQL_NUM);
		$page = new page(array('total'=>$count[0],'perpage'=>8));
		$tmp = $page->offset();
		$page->show();

		$sql="select * from `msg_log` where `user_id`='{$_SESSION['id']}'&&`time`>='$start_time'&&`time`<='$end_time'$tmp";
		$info=$db->get_all($sql);

		for($i=0;$i<count($info);$i++)
		{
			$sql="select * from `content` where `id`='{$info[$i]['cont_id']}'";
			$con=$db->get_one($sql);
			$info[$i]['content']=$con['content'];
		}
	}
	if($type==2)
	{
		$sql="select count(`id`) from `login_log` where `user`='{$_SESSION['id']}'&&`log_time`>='$start_time'&&`log_time`<='$end_time'";
		$count = $db->get_one($sql, MYSQL_NUM);
		$page = new page(array('total'=>$count[0],'perpage'=>14));
		$tmp = $page->offset();
		$page->show();

		$sql="select * from `admin` where `id`='{$_SESSION['id']}'";
		$user=$db->get_one($sql);
		$sql="select * from `login_log` where `user`='{$_SESSION['id']}'&&`log_time`>='$start_time'&&`log_time`<='$end_time'$tmp";
		$info=$db->get_all($sql);
	}
}


$smarty->assign('title','用户日志查询');
$smarty->assign('info',$info);
$smarty->assign('user',$user);
$smarty->assign('count',$count[0]);
if($type==1)
{
	$smarty->assign('content','log/SMS_diary');
}
if($type==2)
{
	$smarty->assign('content','log/land_log');
}
$smarty->assign('js_display',6);
$smarty->display('index.html');