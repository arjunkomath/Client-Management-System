<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
include"../config.php";

$id=$_POST['id'];
$dateJoin = $_POST['dateJoin'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$number = $_POST['phone'];
$address = $_POST['address'];
$product = $_POST['product'];
$amount = $_POST['amount'];
$status = $_POST['status'];
$dateRenew = $_POST['dateRenew'];

$insert = 'UPDATE `client` SET fname="'.$fname.'",lname="'.$lname.'",email="'.$email.'",phone="'.$number.'",address="'.$address.'",dateJoin="'.$dateJoin.'",dateRenew="'.$dateRenew.'",product="'.$product.'",amount="'.$amount.'",status="'.$status.'" WHERE `id`='.$id;

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:../home.php");
}

?>