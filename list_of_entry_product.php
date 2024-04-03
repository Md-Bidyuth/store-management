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


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Stored Product</title>
</head>
<body>
      <?php
          $query = "SELECT * FROM store_product";
          $query_data = $conn->query($query);
          echo "<table border=1>
               <tr> 
                  <th>Product Name</th> 
                  <th>Product Quantity</th> 
                  <th>Entry Date</th> 
                  <th>Action</th> 
               </tr>";
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $store_product_id = $data_array['store_product_id'];
             $store_product_name = $data_array['store_product_name'];
             $store_product_quantity = $data_array['store_product_quantity'];
             $store_product_entry_date = $data_array['store_product_entry_date'];

          echo "<tr>
                  <td>$all_product[$store_product_name]</td>
                  <td>$store_product_quantity</td> 
                  <td>$store_product_entry_date</td>
                  <td> <a href='edit_store_product.php?id=$store_product_id'>Edit</a> </td>
                </tr>";   
          };

          echo "</table>";
        
      ?>


    
</body>
</html>