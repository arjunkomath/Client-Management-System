<?php session_start(); ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <a class="navbar-brand" href="#"><b>Client Manager</b></a>  
        <ul class="nav navbar-nav">
        <li ><a href="../home.php">View Clients</a></li>
        <li class="active"><a href="viewProducts.php">View Products</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Clients <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../clients/add.php">Add</a></li>
            <li><a href="../home.php">View</a></li>
            <li><a href="../clients/removeClient.php">Remove</a></li>
            <li class="divider"></li>
            <li><a href="../clients/search.php">Search</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Products <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="add.php">Add</a></li>
            <li><a href="viewProducts.php">View</a></li>
            <li><a href="removeProducts.php">Remove</a></li>
            <li class="divider"></li>
            <li><a href="search.php">Search</a></li>
          </ul>
        </li>
      </ul> 
        <!--  <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
       <?php
        if(isset( $_SESSION['userName'] )) {
		echo '<a href="../logout.php"><button type="button" class="btn btn-danger navbar-btn navbar-right">Sign Out</button></a>';
		echo '<p class="navbar-text navbar-right">Signed in as '.$_SESSION['userName'].'&nbsp;</p>';
		}
		else {
		echo'<a href="../index.php"><button type="button" class="btn btn-success navbar-btn navbar-right">Sign in</button></a>';
		}
		?>
      </div>
    </nav>