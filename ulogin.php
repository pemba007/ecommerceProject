<?php
 session_start();
?>
<!DOCTYPE html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale,1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

</head>
<header>
    <nav class="navbar navbar-change navbar-fixed-top" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left" style="display: block;">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="faqs.php">FAQS</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="display: block;">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                </ul>

            </div>

        </div>
    </nav>

</header>
<br></br>
<div class="container-fluid">
    <h1>User Login Form</h1>

    <body>
        <div class="jumbotron">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email Address" name="customer_email" required>
                </div>

                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="customer_password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn success">Submit</button>
                </div>
                <div>
                    <p> Not a member?<a href="register.php">SIGN UP</a></p>
                </div>
        </div>
       <?php
            include("include/connect.php");
            if(isset($_POST['login']))
            {
            $c_email= mysqli_real_escape_string($con, $_POST['customer_email']);
            $c_password= mysqli_real_escape_string($con,$_POST['customer_password']);
            $sel_user = "select * from tbl_customer where customer_email='$c_email' AND c_password='$c_password'";
            $run_user = mysqli_query($con, $sel_user); 
            $check_user = mysqli_num_rows($run_user); 
            if($check_user==0)
            {
            $_SESSION['customer_email']=$c_email; 
            echo "<script>window.open('shop.php?logged_in=You have successfully Logged in!','_self')</script>";
             }
            else {
            echo "<script>alert('Password or Username is wrong, try again!')</script>";
       
           }
    
        ?>
        </form>
    </body>

    </html>
    <?php
 } ?>
    