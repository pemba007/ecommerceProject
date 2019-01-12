<?php 
@session_start(); 
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
?>
<!DOCTYPE HTML>
<html>
<head>
 <?php include("../include/head.php");?>
</head>
<body>
<div class="panel panel-default">
              <div class="panel panel-heading"><h4 class="text-center">View Payment </h4></div>
              <div class="panel panel-body">
			  <table align="center" border="1px" width="100%">
	<tr>
        <th>S.N</th>
		<th>Customer Email</th>
		<th>Product (S)</th>
		<th>Paid Amount</th>
		<th>Transaction ID</th>
		<th>Payment Date</th>
        </tr>
<?php 
	include('../include/connect.php');
	
	$get_payment = "select * from tbl_payment";
	
	$run_payment = mysqli_query($con, $get_payment); 
	
	$i = 0;
	
	while ($row_payment=mysqli_fetch_array($run_payment)){
		
		$amount = $row_payment['amount'];
		$trx_id = $row_payment['trx_id']; 
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_c['customer_id'];
		
		$i++;
		
		$get_pro = "select * from tbl_product where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
		$get_c = "select * from tbl_customer where customer_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['customer_email'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_email; ?></td>
		<td>
		<?php echo $pro_title;?><br>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $amount;?></td>
		<td><?php echo $trx_id;?></td>
		<td><?php echo $payment_date;?></td>
	</tr>
	<?php } ?>
</table>
			    </div>
			  </div>
 </body>
</html>
<?php } ?>