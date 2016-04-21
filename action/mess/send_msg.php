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
	$error=array();
	$message='';
	function cancle_trans($t)
	{
		$err=1;
		$sql="ROLLBACK";
		mysql_query($sql) or die('事务无法回滚!!');
		$sysecho='信息提交错误！事务成功回滚！请记录下面信息，咨询管理员: <br>'.$t;
		if (!$err) {
			$message='添加成功！'.$sysecho;
		}
		else {
			$message='错误:'.$sysecho.'!';
		}
		echo $message;
		exit;
	}

	
	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
		$rec=$main->post('receiver');
		if(!$rec)
		{
			$error['tel']="请添加手机号码";
		}
		
		$recev = str_replace('，',',',$rec);
		$recev = trim($recev,",");
		$receiver=explode(',',$recev);
		$receiver=array_unique($receiver);
		$peo_sum=count($receiver);
		if($peo_sum>500)
		{
			$error['tel']="一次最多同时发送500条短信";
		}
		$rece=trim($receiver[0]);
		for($i=1;$i<$peo_sum;$i++)
		{
			$rece=$rece.','.trim($receiver[$i]);
		}
		if(!$error)
		{
			for($i=0;$i<$peo_sum;$i++)
			{
				if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[0256789]{1}[0-9]{8}$/",$receiver[$i]))
				{
					$error['tel']="您输入的手机号码有误";
					break;
				}
			}
		}
		for($i=0;$i<$peo_sum;$i++)
		{
			$sql="select `name` from `friend` where `tel_1`='{$receiver["$i"]}'";
			$info=$db->get_one($sql);
			$name[]=$info['name'];
		}
		
		
		$theme=$main->post('theme');
		
		//按短信长度，分割成若干条短信。
		$content=$main->post('content');
		if(!$content)
		{
			$error['content']="内容不能为空";
		}
		$content1=iconv("UTF-8","GBK//IGNORE",$content);
		$len=iconv_strlen($content1);
		$msg_sum=$main->get_sum($len+16,1);
		
		$type=$main->post('send_class');
		if($type == '')
		{
			$error['time']="请选择发送类型";
		}
		if($type=='2')
		{
			//获取时间
			$time=$main->post('send_time');
			$time.=":00";
			$time=strtotime($time);
			if($time<time(now))
			{
				$error['time']="您选择的时间有误";
			}
			$status=0;
		}
		else
		{
			$time=time(now);
			$status=1;
		}
		$sql="select * from `msg_assign` where `user`='{$_SESSION['id']}'";
		$msg_assign=$db->get_one($sql);
		if($peo_sum*$msg_sum>$msg_assign['left'])
		{
			$error['msg_assign']="您的短信配额不足，请联系管理员为您分配短信";
		}
		if(!$error)
		{
			//即时发送
			if($type=='1')
			{
				$url=MSGURL.'&tele='.$recev."&msg=".urlencode($content1);
				$fp = fopen($url,"r");
				stream_get_meta_data($fp);
				while(!feof($fp)) 
				{
					$result .= fgets($fp, 1024);
				}
				if(stripos($result,'success')===false)
				{
					$err=1;
					$sysecho.=$result."错误描述:传递参数错误=-1 用户id或密码错误=-2 通道id错误=-3 手机号码错误=-4 短信内容错误=-5 余额不足错误=-6 绑定ip错误=-7 未带签名=-8 签名字数不对=-9 通道暂停=-10 该时间禁止发送=-11";
				}
				fclose($fp);
	
				if(!$err)
				{
					//开始事务
					$sql="BEGIN";
					mysql_query($sql) or die('事务无法开始');
					//多个sql查询SET AUTOCOMMIT=0
					$sql="SET AUTOCOMMIT=off";
					mysql_query($sql) or die('非 autocommit 模式失败');
					
					//将短信内容存入内容表中
					$data['content']=$content;
					$data['theme']=$theme;
					$data['sum']=$msg_sum;
					
					if(!$db->insert('content',$data))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					$con_id=mysql_insert_id();
					
					//存发送短信数据
					for($j=0;$j<$peo_sum;$j++)
					{
						$send_data['time']=$time;
						$send_data['con_id']=$con_id;
						$send_data['login_id']=$_SESSION['id'];
						$send_data['tel']=$receiver[$j];
						$send_data['name']=$name[$j];
						$send_data['type']=$type;
						$send_data['status']=$status;
						if(!$db->insert('send',$send_data))
						{
							$err=1;
							//$sysecho=mysql_error();
							cancle_trans(mysql_error());
						}
					}
					
					//修改短信配额
					$new_msg['used']=$peo_sum*$msg_sum+$msg_assign['used'];
					$new_msg['left']=$msg_assign['left']-$peo_sum*$msg_sum;
					$where="`user`='{$_SESSION['id']}'";
					if(!$db->update('msg_assign',$new_msg,$where))
					{
						$err=1;
						//$sysecho=mysql_error();
						cancle_trans(mysql_error());
					}
					$sql="select * from `admin` where `id`='{$_SESSION['id']}'";
					$info=$db->get_one($sql);
					//写短信日志
					for($i=0;$i<$peo_sum;$i++)
					{
						$msg_log['user_id']=$info['id'];
						$msg_log['receiver']=trim($receiver[$i]);
						$msg_log['rec_name']=$name[$i];
						$msg_log['cont_id']=$con_id;
						$msg_log['time']=$time;
						$msg_log['path']=$info['path'];
						if(!$db->insert('msg_log',$msg_log))
						{
							$err=1;
							//$sysecho=mysql_error();
							cancle_trans(mysql_error());
						}
					}
					
					//提交事务
					$sql="COMMIT";
					mysql_query($sql) or die('事务无法提交');
			
					
					if (!$err) 
					{
						//$message='信息发送成功！';
						$smarty->assign('point','1');
					}
					else 
					{
						$message='错误:'.$sysecho.'!';
					}
				}
				//header("location: ".$_SERVER['HTTP_REFERER']);
			}
				
			if($type=='2')
			{
				//将短信内容存入内容表中
				$data['content']=$content;
				$data['theme']=$theme;
				$data['sum']=$msg_sum;
				$db->insert('content',$data);
				$con_id=mysql_insert_id();
				//存发送短信数据
				for($j=0;$j<$peo_sum;$j++)
				{
					$send_data['time']=$time;
					$send_data['con_id']=$con_id;
					$send_data['login_id']=$_SESSION['id'];
					$send_data['tel']=$receiver[$j];
					$send_data['name']=$name[$j];
					$send_data['type']=$type;
					$send_data['status']=$status;
					$db->insert('send',$send_data);
				}
				$smarty->assign('point','2');
			}
			
		}
	}
	

if($error)
{
	$smarty->assign('rec',$rec);
	$smarty->assign('theme',$theme);
	$smarty->assign('cont',$content);
	if($type=='1')
	{
		$smarty->assign('type',$type);
	}
	if($type=='2')
	{
		$smarty->assign('type',$type);
		$smarty->assign('time',$time);
	}
}

$errors = "";
foreach( $error as $key => $value )
{
	$errors .= $value ."<br />";

}

//var_dump($error);die();

$smarty->assign('js_display',1);
$smarty->assign('error',$errors);
$smarty->assign('message',$message);
$smarty->assign('title','短信群发');
$smarty->assign('content','mess/send_mess');
$smarty->display('index.html');
	
/**
* end file
*/