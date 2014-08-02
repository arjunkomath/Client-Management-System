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
	echo '<h1>'.$info['name'].' <small>( ID : '.$info['id'].' )  </small><a href="edit.php?id='.$info['id'].'"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span>Edit</button></a>
</h1>
	</div>';
	echo'<ul class="list-group">
  <li class="list-group-item"><b>ID : </b>'.$info['id'].'</a></li>
  <li class="list-group-item"><b>Name : </b>'.$info['name'].'</a></li>
  <li class="list-group-item"><b>Details : </b>'.$info['details'].'</li>';
  echo'</ul>';
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