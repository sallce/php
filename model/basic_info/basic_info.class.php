<?php define('RIGHT',TRUE);
require_once './base_config.php';

class basic_info{

public function get_basicinfo($db,$id)
{
	$sql="select * from `msg_assign` where `user`='$id'";
	$info=$db->get_one($sql);
	$sql="select `name` from `dept` where `id`='{$info['user_dept']}'";
	$dept=$db->get_one($sql);
	$info['dept']=$dept['name'];
	return $info;
}




}