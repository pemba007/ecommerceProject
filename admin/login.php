<?php 
session_start();
?>
<!DOCTYPE>
<html>

<head>
     <?php include("../include/head.php");?>
</head>

<body>
    <h2 style="color:white; text-align:center;">
        <?php echo @$_GET['not_admin']; ?>
    </h2>
    <h2 style="color:white; text-align:center;">
        <?php echo @$_GET['logged_out']; ?>
    </h2>
    <div class="container-fluid">
        <h1>Admin Login</h1>

        <body>
            <div class="jumbotron">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" name="email" class="form-control" placeholder=" enter email" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="psw"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="enter password" name="psw" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>

                    </div>
            </div>
            </form>
    </div>
</body>

</html>
<?php 
 include("../include/connect.php");
  if(isset($_POST['login']))
  {
	  $email=mysqli_real_escape_string($con,$_POST['email']);
	  $password=mysqli_real_escape_string($con,$_POST['psw']);
	  $sel_ad = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
	  $run_ad = mysqli_query($con, $sel_ad); 
	  if($run_ad){
	  	$row = mysqli_fetch_array($run_ad,MYSQLI_ASSOC);
	  	$check_ad = mysqli_num_rows($run_ad); 
		  if($check_ad==1){
		  $_SESSION['email']=$email; 
		  echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
		  }
	  
	}else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	}
	}	
?>