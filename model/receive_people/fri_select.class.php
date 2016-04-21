<?php defined('RIGHT') OR exit('sorry! you are no right to see it!');
require_once '../../base_config.php';
	
	#doc
	#	classname:	fri_select
	#	scope:		PUBLIC
	#
	#/doc
	
	class fri_select extends DB
	{
		#	internal variables
		
		#	Constructor
		function __construct (  )
		{
			parent::__construct();
		}
		###	
		
		/**
		* 获取此人的所有分组
		*	$number_id 传入登陆者的id编号
		*/
		public function all_group ($number_id)
		{
			$sql = "SELECT `id`,`group_name` FROM `frd_group` WHERE `owner` = '{$number_id}'";
			return $this->get_all($sql);
		}
		
		/**
		* 获取用户自定义分组的所有人
		*	$number_id 传入登陆者的id编号
		*	$group_id 组所对应的id号,当$group_id为零表示默认分组亦为同事分组
		*/
		public function group_people ($number_id,$group_id)
		{
			$group_id = empty($group_id) ? '0' : $group_id;
			$sql = "SELECT `name`,`tel_1`,`group` FROM `friend` WHERE `owner` = '{$number_id}' AND `group` = '{$group_id}'";
			return $this->get_all($sql);
		}
		
	}
	###
	
/**
* end file
*/
