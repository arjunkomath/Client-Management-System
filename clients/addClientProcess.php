<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");

include"../config.php";

$dateJoin = $_POST['dateJoin'];
$fname = $_POST['fName'];
$lname = $_POST['lName'];
$email = $_POST['email'];
$number = $_POST['number'];
$address = $_POST['address'];
$product = $_POST['product'];
$amount = $_POST['amount'];
$status = $_POST['status'];
$dateRenew = $_POST['dateRenew'];

$insert = 'INSERT into client(fname,lname,email,phone,address,dateJoin,dateRenew,product,amount,status) VALUES("'.$fname.'","'.$lname.'","'.$email.'","'.$number.'","'.$address.'","'.$dateJoin.'","'.$dateRenew.'","'.$product.'","'.$amount.'","'.$status.'")';

if (!mysql_query($insert))
  {
  die('Error: ' . mysql_error());
  }
else {
 header("Location:../home.php");
}

?>