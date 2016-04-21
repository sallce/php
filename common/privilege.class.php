<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');
/**
* 权限判断类.
*/
Class privilege{
	private $path;
	private $id;
	private $db;
	private $_main;

	//构造函数，获取session值,从数据库中查取数据
	function __construct($session,$db,$main)
	{
		$sql="select * from `admin` where `login_id`='$session'";
		$res=$db->get_one($sql);
		$this->path=$res['path'];
		$this->id=$res['id'];
		$this->db=$db;
		$this->_main=$main;
	}

	//根据path判断级别
	public function rank_judge()
	{
		if(!isset($this->path))
		{
			$err_msg="please check the variable to ensure it has a value";
			$this->_main->error($err_msg);
		}
		else
		{
			$res=array();
			$res=explode('-',$this->path);
			$class=count($res)-1;
		}
		return $class;
	}

	//该管理员管理用户的path
	public function get_kpath()
	{
		if(!isset($this->path))
		{
			$err_msg="please check the variable to ensure it has a value";
			$this->_main->error($err_msg);
		}
		else
		{
			$kpath=$this->path.'-'.$this->id;
		}
		return $kpath;
	}

	//获取该管理员管理的所有人的login_id
	public function get_all()
	{
		$kpath=$this->get_kpath();
		$sql="select * from `admin` where `path` like '$kpath%'";
		$res=$this->db->get_all($sql);
		return $res;
	}
}


/**
* end file
*/
