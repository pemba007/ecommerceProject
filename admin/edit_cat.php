<?php 
session_start(); 
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
?>
<?php 
 include('../include/connect.php');
if(isset($_GET['cat_id'])){

	$cat_id = $_GET['cat_id']; 
	
	$get_cat = "select * from tbl_category where cat_id='$cat_id'";

	$run_cat = mysqli_query($con, $get_cat); 
	
	$row_cat = mysqli_fetch_array($run_cat); 
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include('../include/head.php');?>
</head>
</body>
<?php include('../include/sidebar.php');?>
<form action="" method="post" style="padding:80px;">
    <b>Update Category</b>
    <input type="text" name="new_cat" value="<?php echo $cat_title;?>" />
    <input type="submit" name="update_cat" value="Update Category" />
</form>
</body>

</html>
<?php 

   if(isset($_POST['update_cat'])){
	
	$update_id = $cat_id;
	
	$new_cat = $_POST['new_cat'];
	
	$update_cat = "update tbl_category set cat_title='$new_cat' where cat_id='$update_id'";

	$run_cat = mysqli_query($con, $update_cat); 
	
	if($run_cat){
	
	echo "<script>alert(' Category has been updated!')</script>";
	echo "<script>window.open('dashboard.php?'view_category,'_self')</script>";
	}
	}

?>
<?php } ?>