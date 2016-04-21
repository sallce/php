<?php define('RIGHT',TRUE);
require_once '../../base_config.php';
session_start();
session_write_close();
if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}
$err=array();

$id=isset($_GET['id'])?$_GET['id']:"";
$tag=isset($_GET['tag'])?$_GET['tag']:"";
$det=isset($_GET['det'])?$_GET['det']:"";

$sql="select * from `admin` where `login_id`='{$_SESSION['login_id']}'";
$admin=$db->get_one($sql);

$sql="select * from `admin` where `id`=$id";
$info=$db->get_one($sql);

$sql="select `id`,`name` from `dept`";
$dept_list=$db->get_all($sql);


$smarty->assign('info',$info);
$smarty->assign('pid',$admin['pid']);
$smarty->assign('det',$det);
$smarty->assign('id',$id);
$smarty->assign('tag',$tag);
$smarty->assign('dept_list',$dept_list);
$smarty->assign('title','修改用户信息');
$smarty->assign('content','user/user_det');
$smarty->assign('js_display',3);
$smarty->display('index.html');