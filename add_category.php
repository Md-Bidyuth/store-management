<?php
  require('db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management</title>
</head>
<body>
      <?php
        if(isset($_GET['category_name'])) {
           $category_name = $_GET['category_name'];
           $category_entry_date = $_GET['category_entry_date'];
           echo $category_name, $category_entry_date;
           $query = "INSERT INTO category (category_name, category_entry_date ) VALUES ( '$category_name', '$category_entry_date')";
            
        if($conn->query($query) === TRUE) {
            echo "Data inserted successfully";
        } 
        else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }


        }
      ?>


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Category: 
        <input type="text" name="category_name" id=""> <br> <br>
        Entry Date: 
        <input type="date" name="category_entry_date" id=""> <br> <br>
        <input type="submit" value="submit">
     </form>
</body>
</html>