<?php
    session_start(); // creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.

    // if(isset($_SESSION["user"])){
    //     header("location: product/index.php");
    // }

    if(!isset($_SESSION['user']) && !isset($_SESSION['adm'])) {
        header ("Location: ../login.php");   //
    }


    require_once "db_connect.php";

    $sql = "SELECT * FROM users "; // selecting logged-in user details from the session user 
    
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

   

    $sqlProduc = " SELECT * FROM animals";
    $resultProduct = mysqli_query($connect , $sqlProduc);

    $layout = "";

    if (mysqli_num_rows($resultProduct) > 0) {
        while($rowProduct = mysqli_fetch_assoc($resultProduct)){
                $layout .= "<div class='card container  ms-5 mt-3 mx-auto  row row-col-lg-4 row-col-md-3 row-col-sm-2 row-col-xs-1 ' 
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
                    <a href='product/adopt.php?id={$rowProduct["id"]}' class='btn btn-success'>Adopt</a>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="product/styles.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="ppp" src="../pictures/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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

    <div class="pets">   
        <h2 id="petsAvaliable">Pets Avaliable</h2>
    </div>

    <div class="conti container">  
        
<div class="thirdconti">
<a href="product/seniors.php">
<h2 class="typo"> Show Seniors</h2></a>
</div>
<div>
<a href="product/all.php"> 
<h2 class="typo"> Show All</h2></a>
   
</div>

</div>

    
        <div class="container mt-4 ms-2 
        row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1 
        gap-5">
        <?= $layout ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>