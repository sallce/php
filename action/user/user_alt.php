<?php define('RIGHT',TRUE);
require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}


$err=array();
$info=array();

$id=isset($_GET['id'])?$_GET['id']:"";
$tag=isset($_GET['tag'])?$_GET['tag']:"";

$sql="select * from `admin` where `login_id`='{$_SESSION['login_id']}'";
$admin=$db->get_one($sql);

$sql="select `id`,`name` from `dept`";
$dept_list=$db->get_all($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$info['login_id']=$main->post('login_id');
	$info['name']=$main->post('name');
	$passwd=$main->post('passwd');
	$passwd2=$main->post('passwd2');
	$info['dept']=$main->post('dept');
	$info['office_phone']=$main->post('office_phone');
	$info['tel_1']=$main->post('tel1');
	$info['tel_2']=$main->post('tel2');
	$info['email']=$main->post('email');
	if(!$info['login_id'])
	{
		$err['login_id']="登陆id不能为空";
	}
	if(!$info['name'])
	{
		$err['name']="姓名不能为空";
	}
	if($passwd&&$passwd2)
	{
		if($passwd!=$passwd2)
		{
			$err['passwd2']="两次密码不一致";
		}
		else
		{
			$data['passwd']=md5($passwd);
		}
	}
	else
	{
		if($passwd||$passwd2)
		{
			$err['passwd2']="请输入两次密码";
		}
	}
	if($admin['pid']=='0')
	{
		if(!$info['dept'])
		{
			$err['dept']="请选择所属部门";
		}
	}
	else
	{
		$info['dept']=$admin['dept'];
	}
	if(!$info['office_phone'])
	{
		$err['office_phone']="办公电话不能为空";
	}
	if(!$info['tel_1'])
	{
		$err['tel1']="请输入手机号码";
	}
	else
	{
		if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[056789]{1}[0-9]{8}$/",$info['tel_1']))
		{
			$err['tel1']="请输入正确的手机号码";
		}
	}
	if($info['tel_2']&&(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[056789]{1}[0-9]{8}$/",$info['tel_2'])))
	{
		$err['tel2']="请输入正确的手机号码";
	}
	if(!$err)
	{
		$data['login_id']=$info['login_id'];
		$data['name']=$info['name'];
		$data['dept']=$info['dept'];
		$data['office_phone']=$info['office_phone'];
		$data['tel_1']=$info['tel_1'];
		$data['tel_2']=$info['tel_2'];
		$data['email']=$info['email'];
		$where="`id`='$id'";
		$db->update('admin',$data,$where);
		$prompt="修改成功";
	}
}



$smarty->assign('info',$info);
$smarty->assign('pid',$admin['pid']);
$smarty->assign('prompt',$prompt);
$smarty->assign('passwd',$passwd);
$smarty->assign('passwd2',$passwd2);
$smarty->assign('dept_list',$dept_list);
$smarty->assign('id',$id);
$smarty->assign('tag',$tag);
$smarty->assign('title','修改用户信息');
$smarty->assign('content','user/user_det');
$smarty->assign('js_display',3);
$smarty->display('index.html');