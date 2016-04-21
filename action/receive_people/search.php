<?php define('RIGHT',true);
error_reporting(7);
require './db.class.php';
$db = new DB;
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['search_name'] )
{
	$search_name = trim($_POST['search_name']);
	$sql = "SELECT * FROM  `admin` WHERE `name` = '{$search_name}' ";
	$result = $db->get_all($sql);
	for ( $i=0; $i < count($result); $i++ )
	{
		$str = '<input type="checkbox" name="people" value="' . $result[$i]['name'] . '" class="the"/><label>' . $result[$i]['name'] . '</label>';
	}
	echo $str;
}
?>
