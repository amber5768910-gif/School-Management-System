<?php
error_reporting(0);
if(!isset($_SESSION))
{
session_start();    
}
include("../connect.php");
if(isset($_POST['btnlogin']))               
{
	$uname=$_POST['Username'];
    $pas=$_POST['txtpassword'];
    $user_role=$_POST['txtuserrole'];
        $sql="SELECT * FROM staff where username='".$uname."' and password='".$pas."' limit 1";
        $a=mysqli_query($con,$sql);
        if(mysqli_num_rows($a)>=1)
        {
        $row=mysqli_fetch_array($a);
		$_SESSION['user_id']=$row['id'];
        $_SESSION['Name']=$row['name'];
	    $_SESSION['tuname']=$row['username'];
        $_SESSION['userrole']=$row['role'];
        $_SESSION['user_role']=$user_role; 
         $_SESSION['NAME']=$TXTNAME;
        echo "<Script> window.location.href='admin/index.php'</script>";
        }
        else
        {
        echo "<Script> alert('Invalid User')</script>";     
        }
}     
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Login - School Management System</title>
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form method="POST" class="login-form" action="">        
        <div class="login-wrap">
                <div class="input-group">
                    <label for="Username">Username</label>
                    <input type="text" id="Username" class="form-control" name="Username" required autofocus>
                </div>             
                <div class="input-group">
                    <label for="password">Password</label>
                      <input type="password" id="txtpassword"class="form-control" name="txtpassword" required>
            </div>
            <div class="input-group">
            	<label>User Type</label>
		      </div>
              <div class="input-group">         
                                <select name="txtuserrole"  class="form-control">            
                                <option VALUE="<?PHP echo $_POST['txtuserrole']; ?>" selected><?PHP echo $_POST['txtuserrole']; ?></option>
                                <option VALUE="teacher" selected>TEACHER</option>
                                <option VALUE="principal">PRINCIPAL</option>
                                <option VALUE="admin">ADMIN</option>
                                </select>
                                <br/>
               <br/>                   
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <input class="btn btn-primary btn-lg btn-block" type="submit" name="btnlogin" value="login"/>
        </div>
      </form>

    </div>


  </body>
</html>
