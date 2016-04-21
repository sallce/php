<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');
/**
* 这个文件是一个类,里面集成一些常用的方法
*/

$main = new Class_Main($smarty);
class Class_Main {
	# 属性
	private $title = array();
	private $smarty;
	private $system_time; // 系统当前的unix时间戳

	/**
	 * 构造函数
	 */
	public function __construct($smarty) {
		$this->smarty = $smarty;
		$this->system_time = microtime(TRUE);
	}

	/**
	 * 添加html标题
	 */
	public function add_title( $title )
	{
		$this->title[] = $title;
	}

	/**
	 * html文件头返回
	 */
	public function page() {
		header("Content-type: text/html; charset=utf-8");
		$title = $this->title;
		$this->smarty->assign('title', implode(' - ', array_reverse($title)));
	}

	/**
	 * 重定向
	 */
	public function re_url( $url ) {
		$url OR $this->error('空地址', '#000011');
		header("Location: {$url}");
	}

	/**
	 * 统一页面错误输出
	 */
	public function error( $err_msg = 'error', $err_num = '#000000' )
	{
		$this->page();
		$this->smarty->assign('err_msg', $err_msg);
		$this->smarty->assign('err_num', $err_num);
		$this->smarty->display('error.html');
		exit();
	}

	/**
	 * 返回客户端IP
	 */
	public function getIP() {
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
	/**
	 * 判断权限
	 */
	 public function right($id)//传入$_SESSION['id']
	 {
	 	$sql="select * from admin where id='".$id."'";
		$info=mysql_fetch_array(mysql_query($sql));
		$right=count(explode('-',$info['path']));
		return $right;
	 }

	/**
	 * 展示smarty视图前输出一些服务器执行信息
	 */
	public function display ($html_file)
	{
		mysqli_kill($this->link, $this->link->thread_id);
		$system_memory = number_format(memory_get_peak_usage(), 0, '.', ',') . 'byte';
		$system_upload_time = number_format(microtime(TRUE) - $this->system_time, 2, '.', ' ') . 's';
		$this->smarty->assign('system_upload_time', $system_upload_time);
		$this->smarty->assign('system_memory', $system_memory);
		$this->smarty->display($html_file);
	}
	
	/**
	* post表单传输数据,,去除空格和避免sql注入
	*/
	
	public function post($element)
	{
		$res=$_POST["$element"];
		$res=trim($res);
		$res=mysql_escape_string($res);
		return $res;
	}
	
		 public function shell_burn($login_id){
	 //传入$_SESSION['login_id']

		$shell=md5($login_id);
		return $shell;
	 }
	/**
	 * 生成shell
	 */
	 public function check_shell($session_shell,$login_id){
	 //传入$_SESSION['shell']和$_SESSION['login_id']

		if ( md5($login_id)==$session_shell )
		{
			return true;
		}
		else
		{
			return false;
		}
	 }
	 
	 public function get_sum($len,$sum)
	 {
	 	if($len>140)
		{
			$len-=140;
			$sum+=$this->get_sum($len,$sum);
		}
		return $sum;
		
	 }

}

/**
* end file
*/
