<?php define('RIGHT',TRUE);

require_once '../../base_config.php';

session_start();
session_write_close();

if(!$main->check_shell($_SESSION['shell'],$_SESSION['login_id'])){
	$main->re_url('../../login.php');
}

$id=isset($_GET['id'])?$_GET['id']:"";

$where="`id`='$id'";
$db->delete('content',$where);

$where="`con_id`='$id'";
$db->delete('send',$where);

header('LOCATION: ./sending_msg.php');