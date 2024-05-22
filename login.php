<?php
  require('db_connection.php');
  session_start();
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include('template.php');?>
    <style>
    .custom-background {
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url('./store-bg.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 500px; 
    }

    body, .btn-login {
        color: #e2e1df;
    }
    
  </style>
</head>
<body>
       
       <div class="container bg-dark bg-opacity-25 p-20 custom-background">
          <div class="row">
              <div class="w-50 mx-auto bg-secondary bg-opacity-50 p-10 ">
              <?php
                    if(isset($_POST['user_email'])) {
                    $user_email = $_POST['user_email'];
                    $user_password = $_POST['user_password'];
                    
                    $query = "SELECT * FROM  user WHERE user_email = '$user_email' AND user_password = '$user_password'";
                    $query_data = $conn->query($query);

                    if(mysqli_num_rows($query_data)) {

                        $data_array = mysqli_fetch_array($query_data);
                        $user_first_name = $data_array['user_first_name'];
                        $user_last_name = $data_array['user_last_name'];

                        $_SESSION['user_first_name'] = $user_first_name;
                        $_SESSION['user_last_name'] = $user_last_name;

                        header('location: index.php');
                    } 
                    else{
                        echo "Error: " . $query . "<br>" . $conn->error;
                    }


                    }
                ?>

                


                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
                    Email: <input type="email" name="user_email" id="" class="form-control bg-light bg-opacity-75"> <br> <br>
                    Password: <input type="password" name="user_password" id="" class="form-control bg-light bg-opacity-75"> <br> <br>
                    <input type="submit" class="btn btn-secondary btn-login" value="Login">
                </form>
              </div>
          </div>
       </div>
        
      
</body>
</html>