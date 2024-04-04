<?php
  require('db_connection.php');
  session_start();
  $user_first_name = $_SESSION['user_first_name'];
  $user_last_name = $_SESSION['user_last_name'];

  if(!empty($user_first_name) && !empty($user_last_name)) { 

    $query1 = "SELECT * FROM product";
    $query1_data = $conn->query($query1);
   
    $all_product = array();
   
    while($data_array1 = mysqli_fetch_assoc($query1_data)) {
       $product_id = $data_array1['product_id'];
       $product_name = $data_array1['product_name'];
   
       $all_product[$product_id] = $product_name;
    };
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
      

     
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
     Select Product: <select name="product_name" id="">
     <?php
          $query = "SELECT * FROM product";
          $query_data = $conn->query($query);
          
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $product_id = $data_array['product_id'];
             $product_name = $data_array['product_name'];
            
        
      ?>
        
        <option value="<?php echo $product_id ?>"> <?php echo $product_name ?> </option>
          <?php } ?>
        </select> 
        <input type="submit" value="Generate Report">
     </form>
     
     <h2>Store Product Report</h2>
     <?php
    //  report store product data
        if(isset($_GET['product_name'])) {
            
            $product_name2 = $_GET['product_name']; 
            $query2 = "SELECT * FROM store_product WHERE store_product_name = $product_name2";
            $query_data2 = $conn->query($query2);

            while($data_array = mysqli_fetch_array($query_data2)) {
                $store_product_name = $data_array['store_product_name'];
                $store_product_quantity = $data_array['store_product_quantity'];
                $store_product_entry_date = $data_array['store_product_entry_date'];

                echo "<h3>$all_product[$store_product_name]</h3>";
                echo "<table border=1><tr><td>Store Date</td> <td>Quantity</td></tr>";
                echo "<tr><td>$store_product_entry_date</td> <td>$store_product_quantity</td></tr>";
                echo "</table";
            }

            
        }
     ?>
     <br>
     <h2>Spend Product Report</h2>
     <?php
    //  report spend product data
        if(isset($_GET['product_name'])) {
            
            $product_name3 = $_GET['product_name']; 
            $query3 = "SELECT * FROM spend_product WHERE spend_product_name = $product_name3";
            $query_data3 = $conn->query($query3);
            
            while($data_array = mysqli_fetch_array($query_data3)) {
                $spend_product_name = $data_array['spend_product_name'];
                $spend_product_quantity = $data_array['spend_product_quantity'];
                $spend_product_entry_date = $data_array['spend_product_entry_date'];
                
                echo "<h3>$all_product[$spend_product_name]</h3>";
                echo "<table border=1><tr><td>spend Date</td> <td>Quantity</td></tr>";
                echo "<tr><td>$spend_product_entry_date</td> <td>$spend_product_quantity</td></tr>";
                echo "</table";
            }

            
        }
     ?>
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>