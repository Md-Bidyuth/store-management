<?php
 require('db_connection.php');

 $query1 = "SELECT * FROM product";
 $query1_data = $conn->query($query1);

 $all_product = array();

 while($data_array1 = mysqli_fetch_assoc($query1_data)) {
    $product_id = $data_array1['product_id'];
    $product_name = $data_array1['product_name'];

    $all_product[$product_id] = $product_name;
 };

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
    <title>List of Spent Product</title>
</head>
<body>
      <?php
          $query = "SELECT * FROM spend_product";
          $query_data = $conn->query($query);
          echo "<table border=1>
               <tr> 
                  <th>Product Name</th> 
                  <th>Product Quantity</th> 
                  <th>Spend Date</th> 
                  <th>Action</th> 
               </tr>";
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $spend_product_id = $data_array['spend_product_id'];
             $spend_product_name = $data_array['spend_product_name'];
             $spend_product_quantity = $data_array['spend_product_quantity'];
             $spend_product_entry_date = $data_array['spend_product_entry_date'];

          echo "<tr>
                  <td>$all_product[$spend_product_name]</td>
                  <td>$spend_product_quantity</td> 
                  <td>$spend_product_entry_date</td>
                  <td> <a href='edit_spend_product.php?id=$spend_product_id'>Edit</a> </td>
                </tr>";   
          };

          echo "</table>";
        
      ?>


    
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>