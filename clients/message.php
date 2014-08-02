<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
include"../config.php";

$id=$_GET['id'];

$message = '<html><body>';

$data_p = mysql_query("SELECT * FROM `settings`") or die(mysql_error()); 
	
 while($info = mysql_fetch_array( $data_p )) 

 { 
 
 $body = $info['message'];

 }

$data_p = mysql_query("SELECT * FROM `client` WHERE id='".$id."'") or die(mysql_error()); 
	
 while($info = mysql_fetch_array( $data_p )) 

 { 
 	$b1 = str_ireplace("[FNAME]",$info['fname'],$body);
	$b2 = str_ireplace("[DATERENEW]",$info['dateRenew'],$b1);
	$final = str_ireplace("[BREAK]","<br />",$b2);
	 
	$to      = $info['email'];
	$message .= $final;
 }
 
 $message .= '</html></body>';
 $subject = 'Account Renewal Notice';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
mail($to, $subject, $message, $headers);

header("Location:../home.php");

?>