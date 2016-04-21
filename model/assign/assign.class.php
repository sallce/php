<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');

require_once '../../base_config.php';

class assign {

//获取管理的人员的id
	public function get_id($kpath,$db)
	{
		$sql="select `id` from `admin` where `path`='$kpath'";
		$user_id=$db->get_all($sql);
		return $user_id;
	}
	
//获取管理的人员的一条信息
	public function get_info($user_id,$db)
	{
		$data=array();
		$sql="select * from `msg_assign` where `user`='{$user_id}'";
		$info=$db->get_one($sql);
		$sql="select `name` from `dept` where `id`='{$info['user_dept']}'";
		$res=$db->get_one($sql);
		$data['dept']=$res['name'];
		$sql="select `name` from `admin` where `id`='{$info['user']}'";
		$res=$db->get_one($sql);
		$data['user']=$res['name'];
		$data['all']=$info['all'];
		$data['assign']=$info['assign'];
		$data['last_add']=$info['last_add'];
		$data['used']=$info['used'];
		$data['left']=$info['left'];
		$data['id']=$user_id;
		return $data;
	}
	
//添加一个用户后，短信分配表里增加一条记录
	public function add_one_note($id,$dept,$db)
	{
		$data=array();
		$data['user']=$id;
		$data['user_dept']=$dept;
		$db->insert('msg_assign',$data);
	}

}