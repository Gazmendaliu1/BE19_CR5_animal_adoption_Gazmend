<?php
    require_once "db_connect.php";
    require_once "file_upload.php";

    $error = false;


    function  cleanInput($param) {
        $data = trim($param);     //white spaces out
        $data = strip_tags($data);   // removes Java writes on name so noone can un codes on name bar ! 
        $data = htmlspecialchars($data);        // for special caracter ü ö ä ect.

        return $data ;

    }

    if (isset($_POST["sign-up"])) {

        $fname = cleanInput($_POST['fname']);
        $lname = cleanInput($_POST['lname']);
        $email = cleanInput($_POST['email']);
        $password = $_POST['password'];
        $date_of_birth = cleanInput($_POST['date_of_birth']);
        $picture = fileUpload($_FILES['picture']);
        // to clean the inputs


        if (empty($fname)) {
            $error = true ;
            $fnameError = "Please enter you first name";
            
        }
        
        $first_name =$_POST['fname'];
        $last_name =$_POST['lname'];
        $password= hash("sha256", $_POST['password']);
        $date_of_birth=$_POST['date_of_birth'];
        $email =$_POST['email'];
        
        $picture = fileUpload($_FILES['picture']); 
    


        $sql = "INSERT INTO `users`( `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`) 
        VALUES ('$first_name','$last_name','$password','$date_of_birth','$email','$picture[0]')";



          if(mysqli_query($connect,$sql)) {
                echo  "<div class='alert alert-success' role='alert'>
                New record has been created!,{$picture[1]}
              </div>";
              
              header('refresh: 3; url = home.php');
          } else {
                echo "<div class='alert alert-danger' role='alert'>
                Record error , {$picture[1]}
              </div> <br>";
          }
        
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Sign Up</h1>
            <form method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="fname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
                   
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
                    
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" id="date" name="date_of_birth">
                    
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Profile picture</label>
                    <input type="file" class="form-control" id="picture" name="picture">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                   
                </div>
                <!-- <div class="mb-3">
                    <label for="password" class="form-label">status</label>
                    <input type="status" class="form-control" id="status" name="status">
                   
                </div> -->
                <button name="sign-up" type="submit" class="btn btn-primary">Create account</button>
                
                <span>you have an account already? <a href="login.php">sign in here</a></span>
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>