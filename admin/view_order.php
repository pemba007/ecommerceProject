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
    <div class="card">
        <div class="card-header bg-dark">
            <h1 class="text-center text-white"> View Order</h1>
        </div>
        <table class="table table-responsive table-bordered">
            <table align="center" border="1px" width="100%">
                <tr>
                    <th>Order_id</th>
                    <th>Customer_id</th>
                    <th>Shipping_name</th>
                    <th>Shipping_email</th>
                    <th>Shipping_phoneno</th>
                    <th>Shipping_address</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Delete</th>
                </tr>

                <?php 
	include("../include/connect.php");
	
	$get_order = "select * from tbl_order";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$customer_id = $row_order['customer_id'];
		$shipping_name = $row_order['shipping_name'];
		$shipping_email = $row_order['shipping_email'];
		$shipping_phoneno = $row_order['shipping_phoneno'];
		$shipping_address = $row_order['shipping_address'];
		$status = $row_order['status'];
		$amount = $row_order['amount'];
		$tax = $row_order['tax'];
		$i++;

		
	?>
                <tr align="center">
                    <td>
                        <?php echo $order_id;?>
                    </td>
                    <td>
                        <?php echo $customer_id; ?>
                    </td>
                    <td>
                        <?php echo $shipping_name;?>
                    </td>
                    <td>
                        <?php echo $Shipping_phoneno;?>
                    </td>
                    <td>
                        <?php echo $shipping_address;?>
                    </td>
                    <td>
                        <?php echo $status;?>
                    </td>
                    <td>
                        <?php echo $amount;?>
                    </td>
                    <td>
                        <?php echo $tax;?>
                    </td>
                    <td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>

                </tr>
                <?php } ?>




            </table>

    </div> <!--  panel body end  -->
    </div> <!--  panel end  -->





</body>

</html>
<?php } ?>