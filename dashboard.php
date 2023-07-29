<?php
    session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){ // if the session user and the session adm have no value
        header("Location: login.php"); // redirect the user to the home page
    }

    if(isset($_SESSION["user"])){ // if a session "user" is, exist and have a value
        header("Location: home.php"); // redirect the user to the home page
    }

    require_once "db_connect.php";

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["adm"]}"; // selecting logged-in user details from the session user 
    
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // admin can see all users and edit 

    $sqlUsers = "SELECT * FROM users WHERE status != 'adm'";
    $resultUsers = mysqli_query($connect, $sqlUsers);

    $layoutUser = "";

    if(mysqli_num_rows($resultUsers) > 0){
        while($userRow = mysqli_fetch_assoc($resultUsers)){
            $layoutUser .= "<div>
            <div class='card ' style='width: 8rem ; row row-col-lg-4row-col-md-3 row-col-sm-2 row-col-xs-1'>
                <img src='pictures/{$userRow["picture"]}' class='card-img-top' alt='...'>
                <div class='card-body'>
                <h5 class='card-title'>{$userRow["first_name"]} {$userRow["last_name"]}</h5>
                <p class='card-text'>{$userRow["email"]}</p>
                <a href='update.php?id={$userRow["id"]}' class='btn btn-warning'>Update</a>
            </div>
        </div>
      </div>";
        }
    }else {
        $layoutUser .= "No results found!";
    }


    $sqlProduc = " SELECT * FROM animals";
    $resultProduct = mysqli_query($connect , $sqlProduc);

    $layout = "";

    if (mysqli_num_rows($resultProduct) > 0) {
        while($rowProduct = mysqli_fetch_assoc($resultProduct)){
                $layout .= "<div class='card container  containerr  row row-col-lg-4 row-col-md-3 row-col-sm-2 row-col-xs-1 ms-5' 
                style='width: 20rem;'>
                <br>
               <img src='../pictures/{$rowProduct["picture"]}' class='card-img-top ' alt='...'>
               <div class='card-body'>
                   <h5 class='card-title pinki'> Name: {$rowProduct["name"]}</h5>
                   <h5 class='card-title'> Breed: {$rowProduct["breed"]}</h5>  
                   <h5 class='card-title'> Location: {$rowProduct["location"]}</h5> 
                   <h5 class='card-title'> Price: <mark> {$rowProduct["price"]}</mark></h5>            
                   <hr>
                   <div class='pinki'>
                   <a href='product/details.php?id={$rowProduct["id"]}' class='btn btn-primary'>Details</a>
                   <a href='product/update.php?id={$row["id"]}' class='btn btn-success'>Update</a>
                   <a href='product/delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
                       </div>
               
               </div>
               </div>";
        }
    } else {
        $layout.= "No Result";
    }
    mysqli_close($connect);

   


  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $row["first_name"] ?></title>
    <link rel="stylesheet" href="product/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="ppp" src="../pictures/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="product/products.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="product/create.php">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php?id=<?= $row["id"] ?>">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <h2 class="text-center">Welcome <?= $row["first_name"] . " " . $row["last_name"] ?></h2>

   
 
    <div class="container">
        <div class="row row-cols-3">
            <?= $layoutUser ?>
        </div>
    </div>
                                            <hr>  <hr>
    <div class="container">
        <div class="row row-cols-3">
            <?= $layout ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>