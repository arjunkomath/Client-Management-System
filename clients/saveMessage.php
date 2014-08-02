<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
include"../config.php";

$message= $_POST['message'];

$insert = 'UPDATE settings SET message="'.$message.'"';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:../home.php");
}

?>