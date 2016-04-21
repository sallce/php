<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');

require_once 'base_config.php';

class log_note  {


	public function write_login_log($id,$db)
	{
		$sql="select * from `admin` where `id`='$id'";
		$info=$db->get_one($sql);
		$log['user']=$info['id'];
		$log['log_time']=time();
		$log['log_ip']=$this->getIp();
		$log['path']=$info['path'];
		$db->insert('login_log',$log);
	}
	
	public function write_msg_log()
	{
		
	}
	
	public function getIp() {
		if (@$_SERVER["HTTP_X_FORWARDED_FOR"])
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		else if (@$_SERVER["HTTP_CLIENT_IP"])
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		else if (@$_SERVER["REMOTE_ADDR"])
			$ip = $_SERVER["REMOTE_ADDR"];
		else if (@getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if (@getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if (@getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
		else
			$ip = "Unknown";
		return $ip;
	}

}