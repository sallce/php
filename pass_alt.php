<?php define('RIGHT',TRUE);
require_once './base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}


$user_id=isset($_GET['id'])?$_GET['id']:'';
$newsid=isset($_GET['newsid'])?$_GET['newsid']:'';

$sql="select * from `admin` where `id`='$user_id'";
$info=$db->get_one($sql);
$data=array();
$error=array();
$prompt="";
function cancle_trans($t)
	{
		$err=1;
		$sql="ROLLBACK";
		mysql_query($sql) or die('Affairs recall failed!!');
		$sysecho='affairs recall succeed: <br>'.$t;
		if (!$err) {
			$message='succeed to add log'.$sysecho;
		}
		else {
			$message='error:'.$sysecho.'!';
		}
		echo $message;
		exit;
	}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$passwd=$main->post('passwd');
	$passwd2=$main->post('passwd2');
	if(!$passwd)
	{
		$error['passwd']="new password";
	}
	if(!$passwd2)
	{
		$error['passwd2']="confrim password";
	}
	if(!$error)
	{
		if($passwd!=$passwd2)
		{
			$error['passwd2']="not matched";
		}
		if(!$error)
		{
			$content="Your new password is ".$passwd;
			$content=iconv("UTF-8","GBK//IGNORE",$content);
			
			//change password
			$data['passwd']=md5($passwd);
			$where="`id`='$user_id'";
			if($db->update('admin',$data,$where))
			{
				//send massage
				$url=MSGURL.'&tele='.$info['tel_1']."&msg=".urlencode($content);
				$fp = fopen($url,"r");
				stream_get_meta_data($fp);
				while(!feof($fp)) 
				{
					$result .= fgets($fp, 1024);
				}
				if(stripos($result,'success')===false)
				{
					$err=1;
					$sysecho.=$result."error:传递参数错误=-1 用户id或密码错误=-2 通道id错误=-3 手机号码错误=-4 短信内容错误=-5 余额不足错误=-6 绑定ip错误=-7 未带签名=-8 签名字数不对=-9 通道暂停=-10 该时间禁止发送=-11";
				}
				fclose($fp);
	
				if(!$err)
				{
					//begin affairs
					$sql="BEGIN";
					mysql_query($sql) or die('affairs begin');
					
					$sql="SET AUTOCOMMIT=off";
					mysql_query($sql) or die('not autocommit model failed');
	
					//massage content
					$data1['content']="change password";
					$data1['theme']="change password";
					$len=iconv_strlen($content);
					$msg_sum=$main->get_sum($len+16,1);
					$data1['sum']=$msg_sum;
	
					if(!$db->insert('content',$data1))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					$con_id=mysql_insert_id();
	
					
					$send_data['time']=time(now);
					$send_data['con_id']=$con_id;
					$send_data['login_id']=$_SESSION['id'];
					$send_data['tel']=$info['tel_1'];
					$send_data['name']=$info['name'];
					$send_data['type']=1;
					$send_data['status']=1;
					if(!$db->insert('send',$send_data))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					
					
					$sql="select * from `admin` where `id`='{$_SESSION['id']}'";
					$info2=$db->get_one($sql);
					$msg_log['user_id']=$info2['id'];
					$msg_log['receiver']=$info['tel_1'];
					$msg_log['rec_name']=$info['name'];
					$msg_log['cont_id']=$con_id;
					$msg_log['time']=time(now);
					$msg_log['path']=$info2['path'];
					if(!$db->insert('msg_log',$msg_log))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					
					
					$sql="select * from `msg_assign` where `user`='{$_SESSION['id']}'";
					$msg_assign=$db->get_one($sql);
					$new_msg['used']=$msg_sum+$msg_assign['used'];
					$new_msg['left']=$msg_assign['left']-$msg_sum;
					$where="`user`='{$_SESSION['id']}'";
					if(!$db->update('msg_assign',$new_msg,$where))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					
					
					$where="`id`='$newsid'";
					$data3['is_deal']='1';
					if(!$db->update('news',$data3,$where))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					
					$sql="COMMIT";
					mysql_query($sql) or die('affairs not submit');
	
	
					if (!$err) 
					{
						$message='send massage succeed';
					}
					else 
					{
						$message='error:'.$sysecho.'!';
					}
					
					$prompt="change password succeed, sent new password to user";
				}
	
				
			}
		}
	}
	
}




$smarty->assign('js_display',0);
$smarty->assign('info',$info);
$smarty->assign('error',$error);
$smarty->assign('newsid',$newsid);
$smarty->assign('prompt',$prompt);
$smarty->assign('title','修改密码');
$smarty->assign('content','pass_alt');
$smarty->display('index.html');
