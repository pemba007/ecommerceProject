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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>View Category</title>
</head>

<body>
     <div class="container">
       <div class="col-lg-12"><br><br>
         <a href="insert_category.php" class="btn btn-success insert-btn">Insert New Category</a><br></br>
          
            <div class="insert-content">
                <div class="card">
                  <div class="card-header bg-dark">
                    <h1 class="text-center text-white"> Category Information</h1>
                  </div>
               </div>
                <table align="center" border="1px" width="100%">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                   <?php 
                    include("../include/connect.php");
                    
                    $get_cat = "select * from tbl_category";
                    
                    $run_cat = mysqli_query($con, $get_cat); 
                    
                    $i = 0;
                    
                    while ($row_cat=mysqli_fetch_array($run_cat)){
                        
                        $cat_id = $row_cat['cat_id'];
                        $cat_title = $row_cat['cat_title'];
                        $i++;
                    ?>
                                        <tr align="center">
                                            <td>
                                                <?php echo $i;?>
                                            </td>
                                            <td>
                                                <?php echo $cat_title;?>
                                            </td>
                                            <td><button class="btn-primary btn"><a href="edit_cat.php?cat_id=<?php echo $row_cat['cat_id']; ?>" class="text-white">Edit</a> </button> </td>
                                            <td> <button class="btn-danger btn"> <a href="delete_category.php?cat_id=<?php echo $row_cat['cat_id']; ?>" class="text-white" value="delete" onclick='return confirmDelete()'> Delete </a></button> </td>
                                        </tr>
                                        <?php } ?>
                </table>
            </div>
    </div>        
</body>

</html>
 <?php } ?>