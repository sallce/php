<?php define('RIGHT',TRUE);
include_once './base_config.php';
session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('./login.php');
}

require_once './model/basic_info/basic_info.class.php';


$sql="select * from `news` where `pid`='{$_SESSION['id']}'&&`is_deal`='0'";
$info=$db->get_all($sql);
$count=count($info);

$get =new basic_info;

$data=$get->get_basicinfo($db,$_SESSION['id']);

$smarty->assign('js_display',0);
$smarty->assign('title','basic information');
$smarty->assign('count',$count);
$smarty->assign('data',$data);
$smarty->assign('right',$_SESSION['right']);
$smarty->assign('content','basic_info/basic_info');
$smarty->display('index.html');

/**
* end file
*/

