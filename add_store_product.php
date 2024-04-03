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
    <title>Store Product</title>
</head>
<body>
      <?php
        if(isset($_GET['store_product_name'])) {
           $store_product_name = $_GET['store_product_name'];
           $store_product_quantity = $_GET['store_product_quantity'];
           $store_product_entry_date = $_GET['store_product_entry_date'];
           
           
           $query = "INSERT INTO store_product (store_product_name, store_product_quantity, store_product_entry_date ) VALUES ( '$store_product_name', '$store_product_quantity', '$store_product_entry_date')";
            
        if($conn->query($query) === TRUE) {
            echo "Data inserted successfully";
        } 
        else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }


        }
      ?>

     


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Product Name: <select name="store_product_name" id="">
            <?php
                show_data_options('product', 'product_id', 'product_name');
            ?>
        </select> <br> <br>
        Product Quantity: <input type="number" name="store_product_quantity" id=""> <br> <br>
        Product Entry Date: <input type="date" name="store_product_entry_date" id=""> <br> <br>
        <input type="submit" value="Add">
     </form>
</body>
</html>