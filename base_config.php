<?php defined('RIGHT') OR exit('sorry! you are no right to see it.');

header( 'Content-Type:   text/html;   charset=utf-8 ');
// system directory
define('SYSTEM_ROOT', $_SERVER['DOCUMENT_ROOT']);
// action directory
define('ACTION', $_SERVER['DOCUMENT_ROOT'] . '/action');
// model directory
define('MODEL', $_SERVER['DOCUMENT_ROOT'] . '/model');

define('MSGURL',"http://115.182.33.133/houtai/sms.php?cpid=2357&password=lydx2012&channelid=1462&");
date_default_timezone_set('Asia/Shanghai');


/**
* conf file
*/
require SYSTEM_ROOT . '/config/configs.php';
/**
* Smarty
*/
require SYSTEM_ROOT . '/smarty_class/MySmarty.class.php';


require SYSTEM_ROOT . '/common/main.class.php';
require SYSTEM_ROOT . '/common/privilege.class.php';
require SYSTEM_ROOT . '/common/page.class.php';
require SYSTEM_ROOT . '/common/who_when.php';


/**
session_start();
session_write_close();
var_dump($_SESSION['id']);die();
*/
/**
* end file
*/
