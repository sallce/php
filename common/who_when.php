<?php
defined('RIGHT') OR exit('sorry! you are no right to see it.');
session_start();
session_write_close();
error_reporting(7);
require SYSTEM_ROOT . '/common/db.class.php';

$db=new DB();
$sql="select * from admin where id='".$_SESSION['id']."'";
$info=$db->get_one($sql);
$when=date("Y年m月d日");
$week=array('星期一','星期二','星期三','星期四','星期五','星期六','星期日');
$day=date("N");
$day=$week[$day-1];
$smarty->assign('who',$info['name']);
$smarty->assign('when',$when);
$smarty->assign('week',$day);
$smarty->assign('right',$_SESSION['right']);

/**
* end file
*/