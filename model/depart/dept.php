<?php
defined('RIGHT') OR exit('sorry! you are no right to see it.');
require_once SYSTEM_ROOT.'/common/db.class.php' ;
class dept extends DB
{
	public function __construct()
	{
		parent::__construct();
	}
	public function user_right($login_id)
	{
		$sql="select * from admin where login_id='".$login_id."'";
		$right=mysql_fetch_array($this->query($sql));
		return $right;
	}
	public function re_url( $url ) 
	{
	$url OR $this->error('空地址', '#000011');
	header("Location: {$url}");
	}
}

/*
end file;
*/