<?php define('RIGHT',TRUE);
require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}
$pri=new privilege("{$_SESSION['login_id']}",$db,$main);


switch($_SESSION['right'])
{
	case '1':
		$tag='1';
		$title="管理员列表";
		$path=$pri->get_kpath();
		break;
	case '2':
		$tag='2';
		$title="用户列表";
		$path=$pri->get_kpath();
		break;
}


$sql="select * from `admin` where `login_id`='{$_SESSION['login_id']}'";
$info=$db->get_one($sql);

if($tag=='1')
{
	$sql="select count(`id`) from `admin` where `path`='$path'";
	$count = $db->get_one($sql, MYSQL_NUM);
	$page = new page(array('total'=>$count[0],'perpage'=>16));
	$tmp = $page->offset();
	$page->show();
	$sql="select * from `admin` where `path`='$path'$tmp";
	$res=$db->get_all($sql);
}
else
{
	$sql="select count(`id`) from `admin` where `path` like '$path%'";
	$count = $db->get_one($sql, MYSQL_NUM);
	$page = new page(array('total'=>$count[0],'perpage'=>16));
	$tmp = $page->offset();
	$page->show();
	$sql="select * from `admin` where `path` like '$path%'$tmp";
	$res=$db->get_all($sql);
}

$sql="select `name` from `dept`";
$dept=$db->get_all($sql);


$smarty->assign('res',$res);
$smarty->assign('dept',$dept);
$smarty->assign('tag',$tag);
$smarty->assign('title',$title);
$smarty->assign('content','user/adm_list');
$smarty->assign('js_display',3);
$smarty->display('index.html');