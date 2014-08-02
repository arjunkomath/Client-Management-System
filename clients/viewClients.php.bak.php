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
  <h1>List of Products <small>Refresh</small></h1>
	</div>
    
    
      <!-- Table -->
  <table class="table table-striped table-hover">
    <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Details</th>
    </thead>

    
    <?php
	
	include '../config.php';
 
 //This checks to see if there is a page number. If not, it will set it to page 1
 
 $pagenum=$_GET['pagenum'];

 if (!(isset($pagenum))) 

 { 

 $pagenum = 1; 

 } 
 
 //Here we count the number of results 

 //Edit $data to be your query 

 $data = mysql_query("SELECT * FROM products") or die(mysql_error()); 

 $rows = mysql_num_rows($data); 


 //This is the number of results displayed per page 

 $page_rows = 10; 


 //This tells us the page number of our last page 

 $last = ceil($rows/$page_rows); 

 
 //this makes sure the page number isn't below one, or more than our maximum pages 

 if ($pagenum < 1) 

 { 

 $pagenum = 1; 

 } 

 elseif ($pagenum > $last) 

 { 

 $pagenum = $last; 

 } 


 //This sets the range to display in our query 

 $max = ($pagenum - 1) * $page_rows .',' .$page_rows; 
 
  //This is your query again, the same one... the only difference is we add $max into it
 $data_p = mysql_query("SELECT * FROM `products` ORDER BY id ASC LIMIT ".$max) or die(mysql_error()); 

 //This is where you display your query results

 while($info = mysql_fetch_array( $data_p )) 

 { 
	echo'<tr>';
   echo '<td style="width:5%;">'.$info['id'].'</td>';
      echo '<td style="width:40%;">'.$info['name'].'</td>';
	     echo '<td style="width:55%;">'.$info['details'].'</td>';
		    echo '<td>'.'</td>';
	echo'</tr>';

 } 

   echo '</tr></table>';
 echo "<p>";

 
 // This shows the user what page they are on, and the total number of pages

 echo ' <div class="alert alert-info">Page '.$pagenum.' of '.$last.'</div><p>';

 
 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($pagenum == 1) 

 {

 } 

 else 

 {

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1'>".'<span class="label label-primary glyphicon glyphicon-step-backward">First</span></a> ';

 echo " ";

 $previous = $pagenum-1;

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'>".'<span class="label label-primary glyphicon glyphicon-chevron-left">Previous</span></a> ';

 } 


 //just a spacer

 echo '<span class="glyphicon glyphicon-th"></span>';


 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links

 if ($pagenum == $last) 

 {

 } 

 else {

 $next = $pagenum+1;

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'>".'<span class="label label-primary glyphicon glyphicon-chevron-right">Next</span></a> ';

 echo " ";

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>".'<span class="label label-primary glyphicon glyphicon-step-forward">Last</span></a> ';

 } 

 ?> 
    
    
	</div>
    
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
        
  </body>
</html>