<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");

include"../config.php";

$id = $_GET['id'];

$del = 'DELETE FROM `products` WHERE id='.$id.'';

if (!mysql_query($del))
  {
  die('Error: ' . mysql_error());
  }
else {
		header("Location:removeProducts.php");	
}

?>