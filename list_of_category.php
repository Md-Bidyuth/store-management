<?php
 require('db_connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Category</title>
</head>
<body>
      <?php
          $query = "SELECT * FROM category";
          $query_data = $conn->query($query);
          echo "<table border=1>
               <tr> 
                  <th>Category</th> 
                  <th>Entry Date</th> 
                  <th>Action</th> 
               </tr>";
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $category_id = $data_array['category_id'];
             $category_name = $data_array['category_name'];
             $category_entry_date = $data_array['category_entry_date'];

          echo "<tr>
                  <td>$category_name</td>
                  <td>$category_entry_date</td>
                  <td> <a href='edit_category.php?id=$category_id'>Edit</a> </td>
                </tr>";   
          };

          echo "</table>";
        
      ?>


    
</body>
</html>