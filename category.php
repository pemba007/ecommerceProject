<?php
   include("include/connect.php");
 ?>
 <div class="container">
 <?php 
  if(isset($_GET['cat']))
  {
  	$cat_id = $_GET['cat'];
  }
  else
  {
  	$cat_id = '';
  }
  $sql = "SELECT * FROM tbl_product WHERE product_cat = '$cat_id'";
  $qry = mysqli_query($con, $sql);
  while ($product_array = mysqli_fetch_array($qry)) {
  	$image = $product_array['product_image'];
?>
<div class="col-md-4 text-center">
      <form method="post" class="form-group" action="shop.php?action=add&product_id=<?php echo $product_array["product_id"]; ?>">
      <div style="border: 1px solid #333; background-color: #fff;">
      <?php echo "<img src='upload/$image' class='img-thumbnail img-responsive' id='image'>"; ?>
      <h4 class="text-info"><?php echo $product_array["product_name"]; ?></h4>
      <h4 class="text-danger">$<?php echo $product_array["product_price"]; ?></h4>
      Qty<input type="text" name="quantity" value="1" size="2" />
      <input type="hidden" name="hidden_name" value='<?php echo $product_array["product_name"]; ?>' />
      <input type="hidden" name="hidden_price" value='<?php echo $product_array["product_price"]; ?>' />
      <input type="submit" value="Add to cart" class="btn btn-success" name="shopping_cart" />
      </div>
      </form>
    </div>

  <?php
  }
  ?>
 </div>
 
