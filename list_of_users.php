<?php
 require('db_connection.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
</head>
<body>
      <?php
          $query = "SELECT * FROM user";
          $query_data = $conn->query($query);
          echo "<table border=1>
               <tr> 
                  <th>First Name</th> 
                  <th>Last Name</th> 
                  <th>Email</th> 
                  <th>Action</th> 
               </tr>";
          while($data_array = mysqli_fetch_assoc($query_data)) {
             $user_id = $data_array['user_id'];
             $user_first_name = $data_array['user_first_name'];
             $user_last_name = $data_array['user_last_name'];
             $user_email = $data_array['user_email'];

          echo "<tr>
                  <td>$user_first_name</td>
                  <td>$user_last_name</td> 
                  <td>$user_email</td>
                  <td> <a href='edit_user.php?id=$user_id'>Edit</a> </td>
                </tr>";   
          };

          echo "</table>";
        
      ?>


    
</body>
</html>