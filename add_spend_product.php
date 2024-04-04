<?php
  require('db_connection.php');
  include('template.php');
  require('my_function.php');
  session_start();
  $user_first_name = $_SESSION['user_first_name'];
  $user_last_name = $_SESSION['user_last_name'];

  if(!empty($user_first_name) && !empty($user_last_name)) { 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spend Product</title>
</head>
<body>
      <?php
        if(isset($_GET['spend_product_name'])) {
           $spend_product_name = $_GET['spend_product_name'];
           $spend_product_quantity = $_GET['spend_product_quantity'];
           $spend_product_entry_date = $_GET['spend_product_entry_date'];
           
           
           $query = "INSERT INTO spend_product (spend_product_name, spend_product_quantity, spend_product_entry_date ) VALUES ( '$spend_product_name', '$spend_product_quantity', '$spend_product_entry_date')";
            
        if($conn->query($query) === TRUE) {
            echo "Data inserted successfully";
        } 
        else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }


        }
      ?>

     


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Product Name: <select name="spend_product_name" id="">
            <?php
                show_data_options('product', 'product_id', 'product_name');
            ?>
        </select> <br> <br>
        Product Quantity: <input type="number" name="spend_product_quantity" id=""> <br> <br>
        Product Entry Date: <input type="date" name="spend_product_entry_date" id=""> <br> <br>
        <input type="submit" value="Add">
     </form>
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>