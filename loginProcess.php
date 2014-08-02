<?php
include"config.php";

$userName = $_POST['userName'];
$password = md5($_POST['password']);

$query = mysql_query("SELECT * FROM `admin` WHERE `userName` = '".$userName."' AND `password` = '".$password."'");

if(mysql_num_rows($query)){
	session_start();
	$_SESSION['userName'] = $userName;
	header('Location:home.php');
}
else {
	header('Location:index.php');
}

?>
