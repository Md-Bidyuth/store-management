<?php
  require('db_connection.php');
  include('template.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
      <?php
          if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query1 = "SELECT * FROM product WHERE product_id = $id";
            $query_data1 = $conn->query($query1);
            $data_array1 = mysqli_fetch_assoc($query_data1);

            $product_id = $data_array1['product_id'];
            $product_name = $data_array1['product_name'];
            $product_category = $data_array1['product_category'];
            $product_code = $data_array1['product_code'];
            $product_entry_date = $data_array1['product_entry_date'];

            }

        if(isset($_GET['product_name'])) {
            $new_product_id = $_GET['product_id'];
            $new_product_name = $_GET['product_name'];
            $new_product_category = $_GET['product_category'];
            $new_product_code = $_GET['product_code'];
            $new_product_entry_date = $_GET['product_entry_date'];

            $new_query = "UPDATE product SET 
                product_name = '$new_product_name', 
                product_category = '$new_product_category', 
                product_code = '$new_product_code', 
                product_entry_date = '$new_product_entry_date' 
            WHERE product_id = '$new_product_id' ";

                if($conn->query($new_query)) {
                    echo "Updated Successfully";
                    header('location: list_of_product.php');
                } 
                else {
                    echo "Update Failed";
                }
        }
            
      ?>

      <?php 
         $query = "SELECT * FROM category";
         $query_data = $conn->query($query);
      ?>


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="text" name="product_id" id="" value="<?php echo  $product_id ?>" hidden> <br> 
        Product Name: <input type="text" name="product_name" id="" value="<?php echo  $product_name ?>"> <br> <br>
        Product Category: <select name="product_category" id="">
            <?php
                
                while($data_array = mysqli_fetch_array($query_data)) {
                    $category_id = $data_array['category_id'];
                    $category_name = $data_array['category_name'];
               ?>  
                 <option value='<?php echo $category_id ?>' <?php if($category_id == $product_category) { echo 'selected';} ?> > <?php echo $category_name ?></option>;
            
             <?php } ?>

        </select> <br> <br>
        Product Code: <input type="text" name="product_code" id="" value="<?php echo  $product_code ?>"> <br> <br>
        Product Entry Date: <input type="date" name="product_entry_date" id="" value="<?php echo  $product_entry_date ?>"> <br> <br>
        <input type="submit" value="Add">
     </form>
</body>
</html>