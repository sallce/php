<?php define('RIGHT',TRUE);

require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}
$type=isset($_GET['cont'])?$_GET['cont']:'';

$sql="select count(`id`) from `send` where `status`='1'&&`login_id`='{$_SESSION['id']}'&&`name`='$type'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>8));
$tmp = $page->offset();
$page->show();

$sql="select * from `send` where `status`='1'&&`login_id`='{$_SESSION['id']}'&&`name`='$type'$tmp";
$info1=$db->get_all($sql);
for($i=0;$i<count($info1);$i++)
{
	$sql="select * from `content` where `id`='{$info1[$i]['con_id']}'";
	$cont=$db->get_one($sql);
	$peo['theme']=$cont['theme'];
	$peo['name']=$info1[$i]['name'];
	$peo['tel']=$info1[$i]['tel'];
	$peo['time']=$info1[$i]['time'];
	$peo['content']=$cont['content'];
	$con_data[]=$peo;
}

$smarty->assign('js_display',1);
$smarty->assign('title','已发短信');
$smarty->assign('con_data',$con_data);
$smarty->assign('type','name');
$smarty->assign('con',$type);
$smarty->assign('content','mess/sent_result');
$smarty->display('index.html');