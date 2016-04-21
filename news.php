<?php define('RIGHT',TRUE);
require_once './base_config.php';
session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}


$is_deal=isset($_GET['isdeal'])?$_GET['isdeal']:0;
if($is_deal==1)
{
	$title="read massages";
}
else
{
	$title="unread massages";
}

$sql="select count(`id`) from `news` where `pid`='{$_SESSION['id']}' && `is_deal`='$is_deal'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>2));
$tmp = $page->offset();
$page->show();

$sql="select * from `news` where `pid`='{$_SESSION['id']}' && `is_deal`='{$is_deal}'$tmp";
$pass_info=$db->get_all($sql);


for($i=0;$i<count($pass_info);$i++)
{
	$sql="select `name`,`id` from `admin` where `id`='{$pass_info[$i]['user_id']}'";
	$name=$db->get_one($sql);
	$pass_info[$i]['user']=$name['name'];
	$pass_info[$i]['user_id']=$name['id'];
}



$smarty->assign('pass_info',$pass_info);
$smarty->assign('js_display',0);
$smarty->assign('title',$title);
$smarty->assign('content','news');
$smarty->display('index.html');
