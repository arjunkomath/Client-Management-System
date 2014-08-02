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
 
 $fname = $info['fname'];
 $id = $info['id'];
 $lname = $info['lname'];
 $amount = $info['amount'];
 $dateJoin = $info['dateJoin'];
 $dateRenew = $info['dateRenew'];
 $email = $info['email'];
 $status = $info['status'];
 
 }

 ?>
		<h1> <?php echo $fname.' '.$lname.'<small> ( ID : '.$id.' )</small>'; ?></h1>
	</div>
    
<ul class="list-group">
	<form id="defaultForm" class="form-horizontal" method="post" action="editProcess.php">
	<input type="number" name="id" hidden value=" <?php $id ?>">
  <li class="list-group-item"><b>Joining Date : </b><div class="input-group date">
            <input required type="text" value="<?php $dateJoin ?>" name="dateJoin" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div></li>
  <li class="list-group-item"><b>First Name : </b><input type="text" class="form-control input-md" name="fname" value="<?php $fname ?>"></li>
  <li class="list-group-item"><b>Last Name : </b><input type="text" class="form-control input-md" name="lname" value="<?php $lname ?>"></li>
  <li class="list-group-item"><b>e-mail : </b><input type="email" class="form-control input-md" name="email" value="<?php $email ?>"></li>
  <li class="list-group-item"><b>Phone : </b><input type="number" class="form-control input-md" name="phone" value="<?php $phone ?>"></li>
  <li class="list-group-item"><b>Address : </b><input type="text" class="form-control input-md" name="address" value="<?php $address ?>'"></li>
  
  <li class="list-group-item">
	<b>Product:</b>
  <select name="product" class="form-control input-md">
<?php
	$find=mysql_query("SELECT  `name` FROM  `products` ");
	$row=mysql_num_rows($find);
	if($row>0)
	{
		while($p=mysql_fetch_array($find))
			{
			echo '<option value="'.$p['name'].'">'.$p['name'].'</option>';
			}
	}
	?>
</select></li>

  <li class="list-group-item"><b>Renewal Date : </b><div class="input-group date">
            <input required type="text" value="<?php $dateRenew ?>" name="dateRenew" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div></li>

    <li class="list-group-item"><b>Amount : </b><input type="number" class="form-control input-md" name="amount" value="<?php $amount ?>"></li>
  
  <li class="list-group-item">
  <b>Status : </b>
<select name="status" value="<?php $status ?>" class="form-control input-md">
<option selected value="PAID">PAID</option>
<option value="UNPAID">UNPAID</option>
<option value="FREE">FREE</option>
</select></li>

<!-- Button -->
<li class="list-group-item">
    <button id="add" name="add" class="btn btn-success btn-lg">Edit</button>
</li></ul>

</form>

 
 <script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fName: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lName: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            dateJoin: {
                validators: {
					notEmpty: {
                        message: 'Please specify the date'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The date is not valid'
                    }
                }
            },
			dateRenew: {
                validators: {
					notEmpty: {
                        message: 'Please specify the date'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The date is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>

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
</div>

<?php include_once '../footer.php';?>
   </body>
</html>
 
<?php
	echo '</div>';
	?>
    