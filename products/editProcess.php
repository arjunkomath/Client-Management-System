<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
include"../config.php";

$id=$_POST['id'];
$name = $_POST['name'];
$details = $_POST['details'];

$insert = 'UPDATE `products` SET name="'.$name.'", details="'.$details.'" WHERE `id`='.$id;

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:viewProducts.php");
}

?>