<?php define('RIGHT',TRUE);
require_once '../../base_config.php';


if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$user=isset($_GET['user_id'])?$_GET['user_id']:"";
$newsid=isset($_GET['newsid'])?$_GET['newsid']:"";

$sql="select * from `msg_assign` where `user`='$user'";
$info=$db->get_one($sql);

$sql="select `name`,`path` from `admin` where `id`='$user'";
$res=$db->get_one($sql);

$sql="select * from `msg_assign` where `user`='{$_SESSION['id']}'";
$info2=$db->get_one($sql);

if($_SESSION['right']==1)
{
	$class="部门";
	$sql="select `name` from `dept` where `id`='{$info['user_dept']}'";
	$a=$db->get_one($sql);
	$lev=$a['name'];

}
else
{
	$class="用户";
	$lev=$res['name'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data=array();
	$data2=array();
	$add=$main->post('add_num');
	if(!$add)
	{
		$err="请输入要增加的配额";
	}
	if(!$err)
	{
		$data2['assign']=$info2['assign']+$add;
		$data2['left']=$info2['left']-$add;
		if(($data2['assign']>$info2['all'])||($data2['left']<0))
		{
			$err="您没有足够的短信来分配";
		}
		if(!$err)
		{
			$where="`user`='{$_SESSION['id']}'";
			$db->update('msg_assign',$data2,$where);

			$data['all']=$info['all']+$add;
			$data['last_add']=$add;
			$data['left']=$info['left']+$add;
			$where="`user`='$user'";
			$db->update('msg_assign',$data,$where);
			
			$where6="`id`='$newsid'";
			$data6['is_deal']='1';
			$db->update('news',$data6,$where6);

			$prompt="增加成功";
		}

	}

}

$smarty->assign('js_display',0);
$smarty->assign('class',$class);
$smarty->assign('lev',$lev);
$smarty->assign('user_id',$user);
$smarty->assign('id',$id);
$smarty->assign('err',$err);
$smarty->assign('newsid',$newsid);
$smarty->assign('prompt',$prompt);
$smarty->assign('haha',2);
$smarty->assign('title','增加短信配额');
$smarty->assign('content','assign/add_msg');
$smarty->display('index.html');
