<?php define('RIGHT',TRUE);

require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}


$id=isset($_GET['id'])?$_GET['id']:"";

$sql="select `theme`,`content` from `content` where `id`='$id'";
$cont=$db->get_one($sql);

$sql="select count(`id`) from `send` where `con_id`='$id'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>10));
$tmp = $page->offset();
$page->show();

$sql="select * from `send` where `con_id`='$id'$tmp";
$info=$db->get_all($sql);

//var_dump($info);die();
$smarty->assign('js_display',1);
$smarty->assign('theme',$cont['theme']);
$smarty->assign('msg_content',$cont['content']);
$smarty->assign('info',$info);
$smarty->assign('title','短信详情');
$smarty->assign('content','mess/sending_saerch_result');
$smarty->display('index.html');