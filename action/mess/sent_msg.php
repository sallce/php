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
$class=isset($_GET['class'])?$_GET['class']:0;

if($class==0)
{
	$sql="select count(distinct `con_id`) from `send` where `status`='1'&&`login_id`='{$_SESSION['id']}'";
	$count = $db->get_one($sql, MYSQL_NUM);
	$page = new page(array('total'=>$count[0],'perpage'=>8));
	$tmp = $page->offset();
	$page->show();
	
	$sql="select distinct `con_id` from `send` where `status`='1'&&`login_id`='{$_SESSION['id']}' order by `time` desc $tmp";
	
	$info=$db->get_all($sql);
	
	for($i=0;$i<count($info);$i++)
	{
		$sql="select distinct `time` from `send` where `con_id`='{$info[$i]['con_id']}'";
		$time=$db->get_all($sql);
		$sql="select * from `content` where `id`='{$info[$i]['con_id']}'";
		$con_info=$db->get_one($sql);
		$con_info['time']=$time[0]['time'];
		$con_data[]=$con_info;
	}
}
if($class==1)
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$find_type=$main->post('find_type');
		$find_content=$main->post('find_content');
		if($find_type=='theme')
		{
			$where1="&&`theme`='$find_content'";
			$name="";
			$tel="";
			$sql="select * from `content` where `theme`='$find_content'";
			$info=$db->get_all($sql);
			for($i=0;$i<count($info);$i++)
			{
				$sql="select distinct `time` from `send` where `con_id`='{$info[$i]['id']}'&&`status`='1'";
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
			header("LOCATION: ./sent_name.php?cont=$find_content");
			
		}
		if($find_type=='tel')
		{
			header("LOCATION: ./sent_tel.php?cont=$find_content");
		}
	}
}

//var_dump($con_data);die();
$smarty->assign('js_display',1);
$smarty->assign('title','已发短信');
$smarty->assign('con_data',$con_data);
$smarty->assign('cont',$find_content);
$smarty->assign('content','mess/sent_mess');
$smarty->display('index.html');