<?php 
session_start(); 
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
?>
<html>

<head>
     <?php include("../include/head.php");?>
</head>

<body class="dashboard-body">
    <nav class="navbar  dashboard-nav navbar-fixed-top">
        <div class="container-fluid">
            <div class="topnav">
                <h3 class="text-center">Kumaripati TV Centre</h3>
            </div>
        </div>
        </div>
    </nav>
    <div class="row dashboard-row">
        <div class="col-lg-2 side-col">
            <div class="panel panel-primary">
                <div class="panel panel-body">
                    <div class="panel panel-primary">
                        <div id="sidemenu">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-home" style="font-size:24px;">&nbsp;</i> <a href="index.php?">Admin Dashboard</a></li>
                                <li><i class="fa fa-home" style="font-size:24px;">&nbsp;</i> <a href="index.php?view_customers">Customer Management</a></li>
                                <li><i class="fa fa-gift" style="font-size:24px;">&nbsp;</i> <a href="index.php?view_products">Products</a></li>
                                <li><i class="fa fa-briefcase" style="font-size:24px;">&nbsp;</i> <a href="index.php?view_category">Category</a></li>
                                <li><i class="fa fa-shopping-cart" style="font-size:24px;">&nbsp;</i> <a href="index.php?view_order">Orders</a></li>
                                <li><i class="fa fa-credit-card" style="font-size:24px;">&nbsp;</i> <a href="index.php?view_payment">Payment</a></li>
                                <li><i class="fa fa-sign-out" style="font-size:24px;">&nbsp;</i> <a href="logout.php">Admin Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>