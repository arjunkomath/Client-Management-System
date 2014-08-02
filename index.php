<?php
session_start();
if(isset($_SESSION['userName']))
header("Location:home.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Management</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  .login-box{
	  width:470px;
	  padding-top:100px;
	  margin-left:auto;
	  margin-right:auto;
	  }
  </style>
     
  </head>
  <body>
  	<link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php include_once 'navMain.php'; ?>

<div class="login-box">
      <form class="form-signin" role="form" method="post" action="loginProcess.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="userName" required autofocus> <br>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
     <!--   <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label> --><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
</div>
   </body>
</html>