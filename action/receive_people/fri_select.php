<?php define('RIGHT',true);
session_start();
session_write_close();
$number_id = $_SESSION['id'];
require_once '../../base_config.php';
//require_once MODEL . '/receive_people/fri_select.class.php';
//$db = new fri_select;
//获取所有分组
$all_group = all_group($db,$number_id);
//var_dump($all_group);die();
/**
* 获取相应分组的人员
*/

//判断是否为ajax请求
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )
{
	if(isset($_POST['group_id'])){
		$group_id = $_POST['group_id'];
		$group_people = group_people($db,$number_id,$group_id);
	}elseif ( isset($_POST['condition']) && isset($_POST['search_class']) )
	{
		$search_class = $main->post('search_class');
		$class_check = ($search_class == 'name') ? '0' :'1'; // 用来显示用户选择哪种查询方式
		$smarty->assign('class_check',$class_check);
		$condition = $main->post('condition');
		$sql = "SELECT `name`,`tel_1`,`group` FROM `friend` WHERE `{$search_class}` = '{$condition}'";
		$group_people = $db->get_all($sql);
	}
}else
{
	$group_id = 0;
	$group_people = group_people($db,$number_id,$group_id);
}

foreach( $group_people as $key => $value )
{
	if ( $value['group'] == '0')
	{
		$group_people[$key]['group'] = '系统分组';
	}else
	{
		$sql = "SELECT `group_name` FROM `frd_group` WHERE `owner` = '{$number_id}' AND `id` = '{$value['group']}'";
		$result = $db->get_one($sql);
		$group_people[$key]['group'] = $result['group_name'];
	}
}


		/**
		* 获取此人的所有分组
		*	$number_id 传入登陆者的id编号
		*/
		function all_group ($db,$number_id)
		{
			$sql = "SELECT `id`,`group_name` FROM `frd_group` WHERE `owner` = '{$number_id}'";
			return $db->get_all($sql);
		}
		
		/**
		* 获取用户自定义分组的所有人
		*	$number_id 传入登陆者的id编号
		*	$group_id 组所对应的id号,当$group_id为零表示默认分组亦为同事分组
		*/
		function group_people ($db,$number_id,$group_id)
		{
			$group_id = empty($group_id) ? '0' : $group_id;
			$sql = "SELECT `name`,`tel_1`,`group` FROM `friend` WHERE `owner` = '{$number_id}' AND `group` = '{$group_id}'";
			return $db->get_all($sql);
		}


$smarty->assign('group_id',$group_id);

$smarty->assign('all_group',$all_group);
$smarty->assign('group_people',$group_people);
$smarty->display('receive_people/fri_select.html');
