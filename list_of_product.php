<?php
 require('db_connection.php');

 $query1 = "SELECT * FROM category";
 $query1_data = $conn->query($query1);

 $all_category = array();

 while($data_array1 = mysqli_fetch_assoc($query1_data)) {
    $category_id = $data_array1['category_id'];
    $category_name = $data_array1['category_name'];

    $all_category[$category_id] = $category_name;
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
    <title>List of Product</title>
</head>
<body>
      <?php
          $query = "SELECT * FROM product";
          $query_data = $conn->query($query);
          echo "<table border=1>
               <tr> 
                  <th>Product Name</th> 
                  <th>Product Category</th> 
                  <th>Product Code</th> 
                  <th>Action</th> 
               </tr>";
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $product_id = $data_array['product_id'];
             $product_name = $data_array['product_name'];
             $product_category = $data_array['product_category'];
             $product_code = $data_array['product_code'];

          echo "<tr>
                  <td>$product_name</td>
                  <td>$all_category[$product_category]</td>
                  <td>$product_code</td>
                  <td> <a href='edit_product.php?id=$product_id'>Edit</a> </td>
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