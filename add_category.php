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
    <title>Store Management</title>
    <?php include('template.php') ;?>
</head>
</head>
<body>
<div class="container">
        <div class="container-fluid"> <!-- topbar start   -->
            <?php include('topbar.php'); ?>
            
        </div> <!-- topbar end   -->


        <div class="container-fluid">
            <div class="row"> 
                <div class="col-sm-3 bg-info-subtle p-0 m-0"> <!-- leftbar start   -->
                   <?php include('leftbar.php'); ?>
                </div> <!-- leftbar end   -->
                <div class="col-sm-9"> <!-- rightbar start   -->
                    <div class="container col-9 p-10  bg-secondary bg-opacity-50">
                    <?php
                        if(isset($_GET['category_name'])) {
                        $category_name = $_GET['category_name'];
                        $category_entry_date = $_GET['category_entry_date'];
                        // echo $category_name, $category_entry_date;
                        $query = "INSERT INTO category (category_name, category_entry_date ) VALUES ( '$category_name', '$category_entry_date')";
                            
                        if($conn->query($query) === TRUE) {
                            echo "Data inserted successfully";
                            // header('location: list_of_category');
                        } 
                        else{
                            echo "Error: " . $query . "<br>" . $conn->error;
                        }


                        }
                    ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        Category: 
                        <input type="text" name="category_name" id="" class="form-control"> <br> <br>
                        Entry Date: 
                        <input type="date" name="category_entry_date" id="" class="form-control"> <br> <br>
                        <input type="submit" class="btn btn-secondary" value="Add">
                    </form>
                    </div>
                </div> <!-- rightbar end   -->
            </div>
        </div>


        <div class="container-fluid border-top border-success mt-2">
            <?php include('bottombar.php') ?>
        </div>
    </div>       


    
     
</body>
</html>

<?php 
     } else {
        header('location: login.php');
     }  
?>