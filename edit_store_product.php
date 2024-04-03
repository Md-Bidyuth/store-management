<?php
  require('db_connection.php');
  include('template.php');
  require('my_function.php');
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Store Product</title>
</head>
<body>
      <?php
         if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query1 = "SELECT * FROM store_product WHERE store_product_id = $id";
            $query_data1 = $conn->query($query1);
            $data_array1 = mysqli_fetch_assoc($query_data1);

            $store_product_id = $data_array1['store_product_id'];
            $store_product_name = $data_array1['store_product_name'];
            $store_product_quantity = $data_array1['store_product_quantity'];
            $store_product_entry_date = $data_array1['store_product_entry_date'];
           

            }

         if(isset($_GET['store_product_name'])) {
            $new_store_product_id = $_GET['store_product_id'];
            $new_store_product_name = $_GET['store_product_name'];
            $new_store_product_quantity = $_GET['store_product_quantity'];
            $new_store_product_entry_date = $_GET['store_product_entry_date'];
    
            $new_query = "UPDATE store_product SET 
                store_product_name = '$new_store_product_name', 
                store_product_quantity = '$new_store_product_quantity', 
                store_product_entry_date = '$new_store_product_entry_date' 
            WHERE store_product_id = '$new_store_product_id' ";
    
                    if($conn->query($new_query)) {
                        echo "Updated Successfully";
                        header('location: list_of_entry_product.php');
                    } 
                    else {
                        echo "Update Failed";
                    }
            }        


      ?>


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="number" name="store_product_id" id="" value="<?php echo $store_product_id; ?>" hidden>
        Product Name: <select name="store_product_name" id="">
            <?php
                 $query = "SELECT * FROM product";
                 $query_data = $conn->query($query);
         
             while($data_array = mysqli_fetch_array($query_data)) {
                 $data_id = $data_array['product_id'];
                 $data_name = $data_array['product_name'];
             ?>
          
          <option value='<?php echo $data_id ?>' <?php if ($data_id == $store_product_name) { echo 'selected';} ?> > <?php echo $data_name; ?> </option>
           
             <?php } ?>
        </select> <br> <br>
        Product Quantity: <input type="number" name="store_product_quantity" id="" value="<?php echo $store_product_quantity; ?>"> <br> <br>
        Product Entry Date: <input type="date" name="store_product_entry_date" id="" value="<?php echo $store_product_entry_date; ?>"> <br> <br>
        <input type="submit" value="submit">
     </form>
</body>
</html>