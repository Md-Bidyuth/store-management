<?php
  require('db_connection.php');
  include('template.php');
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
    <title>Add Product</title>
</head>
<body>
      <?php
        if(isset($_GET['product_name'])) {
           $product_name = $_GET['product_name'];
           $product_category = $_GET['product_category'];
           $product_code = $_GET['product_code'];
           $product_entry_date = $_GET['product_entry_date'];
           
           $query = "INSERT INTO product (product_name, product_category, product_code, product_entry_date ) VALUES ( '$product_name', '$product_category', '$product_code', '$product_entry_date')";
            
        if($conn->query($query) === TRUE) {
            echo "Data inserted successfully";
        } 
        else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }


        }
      ?>

      <?php 
         $query = "SELECT * FROM category";
         $query_data = $conn->query($query);
      ?>


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
         
        Product Name: <input type="text" name="product_name" id=""> <br> <br>
        Product Category: <select name="product_category" id="">
            <?php
                
                while($data_array = mysqli_fetch_array($query_data)) {
                    $category_id = $data_array['category_id'];
                    $category_name = $data_array['category_name'];
                 
                 echo "<option value='$category_id'>$category_name</option>";
                };
                
            ?>
        </select> <br> <br>
        Product Code: <input type="text" name="product_code" id=""> <br> <br>
        Product Entry Date: <input type="date" name="product_entry_date" id=""> <br> <br>
        <input type="submit" value="Add">
     </form>
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>