<?php
    session_start();

    if(isset($_SESSION["user"])){ // if a session "user" is exist and have a value
        header("Location: home.php"); // redirect the user to the home page
    }

    if(isset($_SESSION["adm"])){ // if a session "adm" is exist and have a value
        header("Location: dashboard.php"); // redirect the admin to the dashboard page
    } 
    
    require_once "db_connect.php";

    $error = false;  // by default, a varialbe $error is false, means there is no error in our form

    function cleanInputs($input){ 
        $data = trim($input); // removing extra spaces, tabs, newlines out of the string
        $data = strip_tags($data); // removing tags from the string
        $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt"; 

        return $data;

        
    }

    $email = ""; // define variables and set them to empty string
    $emailError = $passError = ""; // define variables that will hold error messages later, for now empty string 

    if(isset($_POST["login"])){
        $email = cleanInputs($_POST["email"]);
        $password = cleanInputs($_POST["password"]);

        // simple validation for the "date of birth"
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // if the provided text is not a format of an email, error will be true
            $error = true;
            $emailError = "Please enter a valid email address";
        }

        // simple validation for the "password"
        if (empty($password)) {
            $error = true;
            $passError = "Password can't be empty!";
        }

        if(!$error){ // if there is no error with any input, data will be inserted to the database
            // hashing the password before inserting it to the database
            $password = hash("sha256", $password);

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

            $result = mysqli_query($connect, $sql);

            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 1){
                if($row["status"] == "adm"){
                    $_SESSION["adm"] = $row["id"]; // here a new session will be created with the name adm and it will save the user id 
                    header("Location: dashboard.php");
                }else {
                    $_SESSION["user"] = $row["id"]; // here a new session will be created with the name user and it will save the user id 
                    header("Location: home.php");
                }
            }else {
                echo "<div class='alert alert-danger'>
                        <p>Something went wrong, please try again later ...</p>
                      </div>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="pictures/product.png" alt="logo" style="height:100px!important; ">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" <?= $email ?>>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										
									</label>
									<input id="password" type="password" class="form-control" name="password" <?= $passError ?>>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button   name="login" type="submit"class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Register now!</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						CodeFactory 2023 &mdash; PetShop CR5 - Gazmend Aliu 
					</div>
				</div>
			</div>
		</div>
	</section>

<div>


						<div class="container">
								<div>
									ADMIN
								<p> ADM : admin@mail.com</p>
								<p> pass : 123123</p>
							</div>
							<div>
							
								<p> ADM : user1@mail.com</p>
								<p> pass : 123123</p>
							</div>
						</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>