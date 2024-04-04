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
    <title>Edit User</title>
</head>
<body>
      <?php 
         if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query1 = "SELECT * FROM user WHERE user_id = $id";
            $query_data1 = $conn->query($query1);
            $data_array1 = mysqli_fetch_assoc($query_data1);

            $user_id = $data_array1['user_id'];
            $user_first_name = $data_array1['user_first_name'];
            $user_last_name = $data_array1['user_last_name'];
            $user_email = $data_array1['user_email'];
            $user_password = $data_array1['user_password'];
           

            }

         if(isset($_GET['user_first_name'])) {
            $new_user_id = $_GET['user_id'];
            $new_user_first_name = $_GET['user_first_name'];
            $new_user_last_name = $_GET['user_last_name'];
            $new_user_email = $_GET['user_email'];
            $new_user_password = $_GET['user_password'];
    
            $new_query = "UPDATE user SET 
                user_first_name = '$new_user_first_name', 
                user_last_name = '$new_user_last_name', 
                user_email = '$new_user_email',
                user_password = '$new_user_password'
            WHERE user_id = '$new_user_id' ";
    
                    if($conn->query($new_query)) {
                        echo "Updated Successfully";
                        header('location: list_of_users.php');
                    } 
                    else {
                        echo "Update Failed";
                    }
            }        


      ?>


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <input type="text" name="user_id" id="" value = "<?php echo $user_id ?>" hidden>
          First Name: <input type="text" name="user_first_name" id="" value = "<?php echo $user_first_name ?>"> <br> <br>
          Last Name: <input type="text" name="user_last_name" id="" value = "<?php echo $user_last_name ?>"> <br> <br>
          Email: <input type="email" name="user_email" id="" value = "<?php echo $user_email ?>"> <br> <br>
          Password: <input type="password" name="user_password" id="" value = "<?php echo $user_password ?>"> <br> <br>
          <input type="submit" value="submit">
     </form>
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>