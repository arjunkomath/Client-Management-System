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
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../dist/css/bootstrapValidator.css"/>

    <!-- Include the FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />-->

    <script type="text/javascript" src="../vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>
	 <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet">     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  .login-box{
	  width:900px;
	  padding-top:10px;
	  margin-left:auto;
	  margin-right:auto;
	  }
  </style>
     
  </head>
  <body>
  	<link rel="stylesheet" href="../css/bootstrap.css"/>

    <?php include_once 'navInner.php'; ?>
    
    <div class="container">
    <div class="page-header">
    
    <?php 
	include '../config.php';
	$id=$_GET['id'];

	$data_p = mysql_query("SELECT * FROM `client` WHERE id='".$id."'") or die(mysql_error()); 
	
 while($info = mysql_fetch_array( $data_p )) 

 { 
	echo '<h1>'.$info['fname'].' '.$info['lname'].'<small> ( ID : '.$info['id'].' )</small></h1>
	</div>';
	echo'<ul class="list-group">
	<form class="form-horizontal" method="post" action="editProcess.php">
	<input type="number" name="id" hidden value="'.$info['id'].'">
  <li class="list-group-item"><b>Joining Date : </b><div class="input-group date">
            <input required type="text" value="'.$info['dateJoin'].'" name="dateJoin" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div></li>
  <li class="list-group-item"><b>First Name : </b><input type="text" class="form-control input-md" name="fname" value="'.$info['fname'].'"></li>
  <li class="list-group-item"><b>Last Name : </b><input type="text" class="form-control input-md" name="lname" value="'.$info['lname'].'"></li>
  <li class="list-group-item"><b>e-mail : </b><input type="email" class="form-control input-md" name="email" value="'.$info['email'].'"></li>
  <li class="list-group-item"><b>Phone : </b><input type="number" class="form-control input-md" name="phone" value="'.$info['phone'].'"></li>
  <li class="list-group-item"><b>Address : </b><input type="text" class="form-control input-md" name="address" value="'.$info['address'].'"></li>
  
  <li class="list-group-item">
	<b>Product:</b>
  <select name="product" class="form-control input-md">';

	$find=mysql_query("SELECT  `name` FROM  `products` ");
	$row=mysql_num_rows($find);
	if($row>0)
	{
		while($p=mysql_fetch_array($find))
			{
			echo '<option value="'.$p['name'].'">'.$p['name'].'</option>';
			}
	}
	
    echo'</select></li>

  <li class="list-group-item"><b>Renewal Date : </b><div class="input-group date">
            <input required type="text" value="'.$info['dateRenew'].'" name="dateRenew" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div></li>

    <li class="list-group-item"><b>Amount : </b><input type="number" class="form-control input-md" name="amount" value="'.$info['amount'].'"></li>
  
  <li class="list-group-item">
  <b>Status : </b>
<select name="status" class="form-control input-md">
<option selected value="PAID">PAID</option>
<option value="UNPAID">UNPAID</option>
<option value="FREE">FREE</option>
</select></li>';

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
  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
    $('.input-group.date').datepicker({
    format: "yyyy/mm/dd",
    startDate: "2012-01-01",
    endDate: "2015-01-01",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
    });
    </script>
    
    <?php include_once '../footer.php';?>

  </body>
</html>