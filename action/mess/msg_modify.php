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
$id=isset($_GET['id'])?$_GET['id']:"";

$sql="select * from `content` where `id`='$id'";
$msg=$db->get_one($sql);

$sql="select `tel` from `send` where `con_id`='$id'";
$info=$db->get_all($sql);

$sql="select distinct `time` from `send` where `con_id`='$id'";
$time=$db->get_one($sql);
$time1=$time['time'];
for($i=0;$i<count($info);$i++)
{
	$tel=$tel.$info[$i]['tel'].',';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$rec=$main->post('receiver');
	$tel=$rec;
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
			if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[056789]{1}[0-9]{8}$/",$receiver[$i]))
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
	$msg['theme']=$theme;

	//按短信长度，分割成若干条短信。
	$content=$main->post('content');
	$msg['content']=$content;
	if(!$content)
	{
		$error['content']="内容不能为空";
	}
	$content1=iconv("UTF-8","GBK//IGNORE",$content);
	$len=iconv_strlen($content1);
	$msg_sum=$main->get_sum($len+16,1);
	
	//获取时间
	$time=$main->post('send_time');
	$time.=":00";
	$time=strtotime($time);
	$time1=$time;
	if($time<time(now))
	{
		$error['time']="您选择的时间有误";
	}
	$status=0;
	$type='0';

	$sql="select * from `msg_assign` where `user`='{$_SESSION['id']}'";
	$msg_assign=$db->get_one($sql);
	if($peo_sum*$msg_sum>$msg_assign['left'])
	{
		$error['msg_assign']="您的短信配额不足，请联系管理员为您分配短信";
	}
	
	if(!$error)
	{
		$data['content']=$content;
		$data['theme']=$theme;
		$data['sum']=$msg_sum;
		$where="`id`='$id'";
		$db->update('content',$data,$where);
		//删除原来的send信息
		$where1="`con_id`='$id'";
		$db->delete('send',$where1);
		//存发送短信数据
		for($j=0;$j<$peo_sum;$j++)
		{
			$send_data['time']=$time;
			$send_data['con_id']=$id;
			$send_data['login_id']=$_SESSION['id'];
			$send_data['tel']=$receiver[$j];
			$send_data['name']=$name[$j];
			$send_data['type']=$type;
			$send_data['status']=$status;
			$db->insert('send',$send_data);
		}
		$prompt="修改成功";
		$smarty->assign('point','1');
	}
}
$errors = "";
foreach( $error as $key => $value )
{
	$errors .= $value ."<br />";

}

$smarty->assign('js_display',1);
$smarty->assign('title','修改短信');
$smarty->assign('tel',$tel);
$smarty->assign('msg',$msg);
$smarty->assign('id',$id);
$smarty->assign('time',$time1);
$smarty->assign('error',$errors);
$smarty->assign('prompt',$prompt);
$smarty->assign('content','mess/modify_mess');
$smarty->display('index.html');