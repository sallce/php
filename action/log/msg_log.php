<?php define('RIGHT',TRUE);
require_once '../../base_config.php';
session_start();
session_write_close();
if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$id=$_SESSION['id'];
$sql="select count(`id`) from `msg_log` where `user_id`='$id'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>8));
$tmp = $page->offset();
$page->show();

$sql="select * from `msg_log` where `user_id`=$id$tmp";
$info=$db->get_all($sql);

for($i=0;$i<count($info);$i++)
{
	$sql="select * from `content` where `id`='{$info[$i]['cont_id']}'";
	$con=$db->get_one($sql);
	$info[$i]['content']=$con['content'];
}


$smarty->assign('title','短信日志');
$smarty->assign('info',$info);
$smarty->assign('count',$count[0]);
$smarty->assign('content','log/SMS_diary');
$smarty->assign('js_display',6);
$smarty->display('index.html');