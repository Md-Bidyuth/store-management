<?php
  require('db_connection.php');
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
    <title>Add User</title>
</head>
<body>
      <?php
        if(isset($_GET['user_first_name'])) {
           $user_first_name = $_GET['user_first_name'];
           $user_last_name = $_GET['user_last_name'];
           $user_email = $_GET['user_email'];
           $user_password = $_GET['user_password'];
           
           
           $query = "INSERT INTO user (user_first_name, user_last_name, user_email, user_password ) VALUES ( '$user_first_name', '$user_last_name', '$user_email', '$user_password')";
            
        if($conn->query($query) === TRUE) {
            echo "Data inserted successfully";
        } 
        else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }


        }
      ?>

     


     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        First Name: <input type="text" name="user_first_name" id=""> <br> <br>
        Last Name: <input type="text" name="user_last_name" id=""> <br> <br>
        Email: <input type="email" name="user_email" id=""> <br> <br>
        Password: <input type="password" name="user_password" id=""> <br> <br>
        <input type="submit" value="Login">
     </form>
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>