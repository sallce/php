<?php defined('RIGHT') OR exit('No direct script access allowed!');
// 载入Smarty库
require 'Smarty.class.php';

//配置扩展类
//例如你可以在index文件里包含它

class MySmarty extends Smarty {

	function MySmarty() {

		//类构造函数.创建实例的时候自动配置
		parent::__construct();

		//配置模板目录、配置编译目录、配置配置目录、配置缓存目录
		$this->template_dir =  SYSTEM_ROOT . '/templates/';
		$this->compile_dir =  SYSTEM_ROOT . '/templates_c/';
		$this->config_dir =  SYSTEM_ROOT . '/config/';
		$this->cache_dir =  SYSTEM_ROOT . '/cache/';

		$this->debugging = false;
		$this->caching = false;
		$this->cache_lifetime = 120;
		$this->assign('app_name','MySmarty');

		//配置编译标签(修改后需要清除编译目录里的文件)
		$this->left_delimiter = "<{";
		$this->right_delimiter = "}>";

	}

}

$smarty = new MySmarty;
?>