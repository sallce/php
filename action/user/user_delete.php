<?php define('RIGHT',TRUE);
require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

/**
$pri=new privilege("{$_SESSION['login_id']}",$db,$main);//需改动 $_SESSION['login_id']
$kpath=$pri->get_kpath();

$tag=isset($_GET['tag'])?$_GET['tag']:"";
$sql="select `path` from `admin` where `id`=$id";
$path=$db->get_one($sql);
*/
//if(strpos($kpath,$path['path'])==0)
//{

//判断是否为ajax请求
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
	
	$id=isset($_GET['id'])?$_GET['id']:"";
	$sql="`id`=$id";
	$db->delete('admin',$sql);
	/**
	if($tag==1)
	{
		header('LOCATION: ./user_list.php?table=admin');
	}
	else
	{
		header('LOCATION: ./user_list.php');
	}
	*/
}
//}
//else
//{
//	$main->error("您无权进行此操作");
//}

