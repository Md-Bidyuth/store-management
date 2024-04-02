<?php
  require('db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Management</title>
</head>
<body>
      <?php
          if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM category WHERE category_id = $id";
            $query_data = $conn->query($query);
            $data_array = mysqli_fetch_assoc($query_data);

            $category_id = $data_array['category_id'];
            $category_name = $data_array['category_name'];
            $category_entry_date = $data_array['category_entry_date'];
    
          }

          if(isset($_GET['category_name'])) {
            $new_category_id = $_GET['category_id'];
            $new_category_name = $_GET['category_name'];
            $new_category_entry_date = $_GET['category_entry_date'];

            $new_query = "UPDATE category SET 
                category_name = '$new_category_name',
                category_entry_date = '$new_category_entry_date' 
                WHERE category_id = $new_category_id";
            
            if($conn->query($new_query) === TRUE) {
                 echo "Updated Successfully";
                 header('location: list_of_category.php');
            }
            else {
                echo "Update failed";
            }

          }
      ?>


     <form action="edit_category.php" method="GET">
        <input type="text" name="category_id" id="" value="<?php echo $category_id ?>" hidden>
        Category: 
        <input type="text" name="category_name" id="" value="<?php echo $category_name ?>"> <br> <br>
        Entry Date: 
        <input type="date" name="category_entry_date" id="" value="<?php echo $category_entry_date ?>"> <br> <br>
        <input type="submit" value="submit">
     </form>
</body>
</html>