<?php define('RIGHT',TRUE);
require_once '../../base_config.php';
require_once '../../model/assign/assign.class.php';
session_start();
session_write_close();
if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$msg_assign = new assign;
$pri = new privilege($_SESSION['login_id'],$db,$main);

$kpath=$pri->get_kpath();
$sql="select count(`id`) from `admin` where `path`='$kpath'";
$count = $db->get_one($sql, MYSQL_NUM);
$page = new page(array('total'=>$count[0],'perpage'=>8));
$tmp = $page->offset();
$page->show();

$sql="select `id` from `admin` where `path`='$kpath'$tmp";
$user_id=$db->get_all($sql);

$data=array();
if($_SESSION['right']==1)
{
	$sql="select * from `msg_assign` where `user` = '{$_SESSION['id']}'";
	$res=$db->get_one($sql);
	$sql="select `name` from `dept` where `id`='{$res['user_dept']}'";
	$d=$db->get_one($sql);
	$sql="select `name` from `admin` where `id`='{$_SESSION['id']}'";
	$n=$db->get_one($sql);
	$res['dept']=$d['name'];
	$res['user']=$n['name'];
}
$data[]=$res;
for($i=1;$i<count($user_id);$i++)
{
	$one=$msg_assign->get_info($user_id[$i]['id'],$db);
	$data[]=$one;
}

$right=$_SESSION['right'];

if($right==1)
{
	$title="部门短信分配";
}
if($right==2)
{
	$title="用户短信分配";
}


$smarty->assign('js_display',5);
$smarty->assign('title',$title);
$smarty->assign('data',$data);
$smarty->assign('res',$res);
if($right==1)
{
	$smarty->assign('content','assign/dept_assign');
}
if($right==2)
{
	$smarty->assign('content','assign/assign');
}
$smarty->display('index.html');
