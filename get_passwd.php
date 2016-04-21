<?php define('RIGHT',TRUE);
require_once './base_config.php';


$error=array();
$data=array();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$login_id=$main->post('login_id');
	$tel=$main->post('tel');
	if(!$login_id)
	{
		$error['login_id']="username required";
	}
	if(!$tel)
	{
		$error['tel']="phone number required";
	}
	
	if(!$error)
	{
		$sql="select * from `admin` where `login_id`='$login_id' ";
		$info=$db->get_one($sql);

		if(!$info)
		{
			$error['login_id']="username not exist";
		}
		else
		{
			if($info['tel_1']!=$tel)
			{
				$error['tel']="phone number not correct";
			}
		}
		//把消息存入数据库
		if(!$error)
		{
			$data['user_id']=$info['id'];
			$data['dept']=$info['dept'];
			$data['pid']=$info['pid'];
			$data['content']="request new password";
			$data['is_deal']=0;
			$data['type']='0';
			$data['time']=time(now);
			$db->insert('news',$data);
			$prompt="Success. Wait manager to send new password via phone.";
		}
	}
}




$smarty->assign('login_id',$login_id);
$smarty->assign('tel',$tel);
$smarty->assign('error',$error);
$smarty->assign('prompt',$prompt);
$smarty->display('get_passwd.html');