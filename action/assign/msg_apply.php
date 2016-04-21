<?php
define('RIGHT',true);
require_once '../../base_config.php' ;

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$num=$main->post('num');
	if(!$num)
	{
		$err="请输入您要申请的短信条数";
	}
	
	if(!$err)
	{
		$data=array();
	
		$sql="select * from `admin` where `id`='{$_SESSION['id']}'";
		$info=$db->get_one($sql);
	
		$data['user_id']=$info['id'];
		$data['dept']=$info['dept'];
		$data['pid']=$info['pid'];
		$data['content']="申请增加短信配额".$num."条";
		$data['is_deal']=0;
		$data['type']='1';
		$data['time']=time('now');
		$db->insert('news',$data);
		$prompt="已提交您的申请，请耐心等待回复~";
	}
}

$smarty->assign('js_display',0);
$smarty->assign('title','申请短信配额');
$smarty->assign('err',$err);
$smarty->assign('info',$info);
$smarty->assign('prompt',$prompt);
$smarty->assign('content','assign/msg_apply');
$smarty->display('index.html');