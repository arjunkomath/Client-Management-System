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

	$data_p = mysql_query("SELECT * FROM `products` WHERE id='".$id."'") or die(mysql_error()); 
	
 while($info = mysql_fetch_array( $data_p )) 

 { 
	echo '<h1>'.$info['name'].'<small> ( ID : '.$info['id'].' )</small></h1>
	</div>';
	echo'<ul class="list-group">
	<form class="form-horizontal" method="post" action="editProcess.php">
	<input type="number" name="id" hidden value="'.$info['id'].'">
  <li class="list-group-item"><b>Name : </b><input type="text" class="form-control input-md" name="name" value="'.$info['name'].'"></li>
  <li class="list-group-item"><b>Details : </b><input type="text" class="form-control input-md" name="details" value="'.$info['details'].'"></li>';

echo '<!-- Button -->
<li class="list-group-item">
    <button id="add" name="add" class="btn btn-success btn-lg">Edit</button>
</li></ul>';

echo '</form>';
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