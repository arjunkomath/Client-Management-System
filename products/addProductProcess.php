<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
include"../config.php";

$name = $_GET['name'];
$details = $_GET['details'];


$insert = 'INSERT into products(name,details) VALUES("'.$name.'","'.$details.'")';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:viewProducts.php");
}

?>