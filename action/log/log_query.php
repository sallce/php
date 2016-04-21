<?php define('RIGHT',TRUE);
require_once '../../base_config.php';


if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}
$sql="select * from `admin` where `id`='{$_SESSION['id']}'";
$info=$db->get_one($sql);


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$err=array();
	$error=array();
	$error['end_time']="默认为当前时间";
	$start_time=$main->post('start_time');
	$start_time=strtotime($start_time);
	$end_time=$main->post('end_time');
	$end_time=strtotime($end_time);
	if(!$end_time)
	{
		$endtime=time(now);
	}
	$type=$main->post('type');
	$login_id=$main->post('login_id');
	if(!$start_time)
	{
		$err['start_time']=$error['start_time']="请输入起始时间";
	}
	if($login_id)
	{
		$sql="select * from `admin` where `login_id`='$login_id'";
		$que=$db->get_one($sql);
		if(!$que)
		{
			$err['login_id']=$error['login_id']="没有该用户";
		}
		else
		{
			if(!strstr($que['path'],$info['path'].$info['id']))
			{
				$err['login_id']=$error['login_id']="您无权查看此用户日志";
			}
		}
		if(!$err)
		{
			header("LOCATION: ./query.php?st={$start_time}&et={$end_time}&t={$type}&ld={$login_id}");
		}
	}
	else
	{
		if(!$err)
		{
			header("LOCATION: ./query.php?st={$start_time}&et={$end_time}&t={$type}");
		}
	}
}

$smarty->assign('title','用户日志查询');
$smarty->assign('error',$error);
$smarty->assign('type',$type);
$smarty->assign('content','log/user_log');
$smarty->assign('js_display',6);
$smarty->display('index.html');