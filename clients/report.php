<?php
session_start();
if(!isset($_SESSION['userName']))
header("Location:../index.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Management</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php include_once 'navInner.php'; ?>
    
    <div class="container">
    <div class="page-header">
    
    <?php 
	include '../config.php';
	$id=$_GET['id'];

	$data_p = mysql_query("SELECT * FROM `client` WHERE id='".$id."'") or die(mysql_error()); 
	
 while($info = mysql_fetch_array( $data_p )) 

 { 
	echo '<h1>'.$info['fname'].' '.$info['lname'].' <small>( ID : '.$info['id'].' ) </small><a href="edit.php?id='.$info['id'].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span>Edit</button></a>
</h1>
	</div>';
	echo'<ul class="list-group">
  <li class="list-group-item"><b>e-mail : </b><a href="mailto:'.$info['email'].'">'.$info['email'].'</a></li>
  <li class="list-group-item"><b>Phone : </b>'.$info['phone'].'</li>
  <li class="list-group-item"><b>Address : </b>'.$info['address'].'</li>
  <li class="list-group-item"><b>Product : </b>'.$info['product'].'</li>
  <li class="list-group-item"><b>Joining Date : </b>'.$info['dateJoin'].'</li>
  <li class="list-group-item"><b>Renewal Date : </b>'.$info['dateRenew'].'</li>
  <li class="list-group-item"><b>Amount : </b>'.$info['amount'].'</li>';
  if ($info['status']=="PAID") {
	  echo '<li class="list-group-item list-group-item-success"><b>Status : </b>'.$info['status'].'</li>';
  } else if ($info['status']=="UNPAID") {
	  echo '<li class="list-group-item list-group-item-danger"><b>Status : </b>'.$info['status'].'</li>';
  } else if ($info['status']=="FREE") {
	  echo '<li class="list-group-item list-group-item-info"><b>Status : </b>'.$info['status'].'</li>';
  }
  echo'</ul>';
  echo '<a href="message.php?id='.$info['id'].'"><button type="button" class="btn btn-success" >Send Message <span class="glyphicon glyphicon-bullhorn"></span></button></a>';
 } 
	echo '</div>';
	?>
    
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
        <?php include_once '../footer.php';?>
  </body>
</html>