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
		* ��ȡ���˵����з���
		*	$number_id �����½�ߵ�id���
		*/
		public function all_group ($number_id)
		{
			$sql = "SELECT `id`,`group_name` FROM `frd_group` WHERE `owner` = '{$number_id}'";
			return $this->get_all($sql);
		}
		
		/**
		* ��ȡ�û��Զ�������������
		*	$number_id �����½�ߵ�id���
		*	$group_id ������Ӧ��id��,��$group_idΪ���ʾĬ�Ϸ�����Ϊͬ�·���
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
