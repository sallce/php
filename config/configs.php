<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');
/**
 * 环境配置
 */
# 开发环境
define('ENVIRONMENT', 'testing');

# 错误提示设置
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
		
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
			/**
			/*session_start();
			$_SESSION['id'] = '1';
			$_SESSION['shell'] = md5('lzh');
			$_SESSION['login_id'] = 'lzh';
			$_SESSION['right'] = '1'; 
			session_write_close();*/
			
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}
/**
* end file
*/

