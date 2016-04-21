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
$where1="";
$where2="";
$where3="";
$a='theme';
$b='';
$class=isset($_GET['class'])?$_GET['class']:0;
$templates="mess/sending_mess";

if($class==1)
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$find_type=$main->post('find_type');
		$find_content=$main->post('find_content');
		$a=$find_type;
		$b=$find_content;
		if($find_type=='theme')
		{
			$where1="&&`theme`='$find_content'";
			$name="";
			$tel="";
			$sql="select * from `content` where `theme`='$find_content'";
			$info=$db->get_all($sql);
			for($i=0;$i<count($info);$i++)
			{
				$sql="select distinct `time` from `send` where `con_id`='{$info[$i]['id']}'&&`status`='0'";
				if($time=$db->get_one($sql))
				{
					$con['theme']=$info[$i]['theme'];
					$con['time']=$time['time'];
					$con['content']=$info[$i]['content'];
					$con['id']=$info[$i]['id'];
					$con_data[]=$con;
				}
			}
		}
		if($find_type=='name')
		{
			$where2="&&`name`='$find_content'";
			$templates="mess/sending_s";
			$name=$find_content;
			$sql="select distinct `tel` from `send` where `name`='$name'";
			$tel=$db->get_one($sql);
			$tel=$tel['tel'];
			$sql="select * from `send` where `status`='0'&&`login_id`='{$_SESSION['id']}'".$where2;
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
		}
		if($find_type=='tel')
		{
			$where3="&&`tel`='$find_content'";
			$templates="mess/sending_s";
			$tel=$find_content;
			$sql="select distinct `name` from `send` where `tel`='$tel'";
			$name=$db->get_one($sql);
			$name=$name['name'];
			$sql="select * from `send` where `status`='0'&&`login_id`='{$_SESSION['id']}'".$where3;
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
		}
	}
}
if($class==0)
{
	$sql="select count(distinct `con_id`) from `send` where `status`='0'&&`login_id`='{$_SESSION['id']}'";
	$count = $db->get_one($sql, MYSQL_NUM);
	$page = new page(array('total'=>$count[0],'perpage'=>8));
	$tmp = $page->offset();
	$page->show();
	
	$sql="select distinct `con_id` from `send` where `status`='0'&&`login_id`='{$_SESSION['id']}'".$tmp;
	$info=$db->get_all($sql);
	
	for($i=0;$i<count($info);$i++)
	{
		$sql="select distinct `time` from `send` where `con_id`='{$info[$i]['con_id']}'";
		$time=$db->get_all($sql);
		$sql="select * from `content` where `id`='{$info[$i]['con_id']}'";
		if($con_info=$db->get_one($sql))
		{
			$con_info['time']=$time[0]['time'];
			$con_data[]=$con_info;
		}
	}
}



$smarty->assign('js_display',1);
$smarty->assign('con_data',$con_data);
$smarty->assign('title','待发短信');
$smarty->assign('a',$a);
$smarty->assign('b',$b);
$smarty->assign('content',$templates);
$smarty->display('index.html');