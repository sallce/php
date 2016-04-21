<?php define('RIGHT',TRUE);
require_once '../../base_config.php';
session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$id=$_SESSION['id'];
$sql="select count(`id`) from `login_log` where `user`='$id'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>14));
$tmp = $page->offset();
$page->show();

$sql="select * from `admin` where `id`='$id'";
$user=$db->get_one($sql);
$sql="select * from `login_log` where `user`='$id'$tmp";
$info=$db->get_all($sql);



$smarty->assign('count',$count[0]);
$smarty->assign('info',$info);
$smarty->assign('user',$user);
$smarty->assign('title','登陆日志');
$smarty->assign('content','log/land_log');
$smarty->assign('js_display',6);
$smarty->display('index.html');