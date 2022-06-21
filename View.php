<?php
include "Configuration.php";

$sql = "SELECT * FROM contact";



if(isset($_POST['submitBtn'])){ //check if form was submitted
    $input = $_POST['key']; //get input text
    $sql = "SELECT * FROM contact WHERE firstname like '%$input%' or lastname like '%$input%' or email like '%$input%' or mobile like '%$input%'";
}

$result = mysqli_query($connection, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">    <title>Document</title>-->
    <link rel="stylesheet" href="css/bootstrap.min%20(5).css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="Register.html">Add Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="View.php">View Contact</a>
            </li>


        </ul>

    </div>
    <form class="d-flex" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
        <button class="btn btn-outline-success" type="submit" name="submitBtn">Search</button>
    </form>

</nav>


<div class="container">
    <div class="row justify-content-center">


        <?php
        while ($member = mysqli_fetch_array($result)) {
            ?>

            <div class="col-md-3 py-2 px-1"
                 style="border: red;border-radius: 20px;background-color: gainsboro;margin: 10px;padding: 2px;">
                <h5 style="text-align: center">Name: <?php echo $member['firstname'] . " " . $member['lastname']; ?></h5>
                <p style="text-align: center">Email: <?php echo $member['email']; ?></p>
                <p style="text-align: center">Mobile: <?php echo $member['mobile']; ?></p>
                <p style="text-align: center">Address: <?php echo $member['address']; ?></p>
                <div class="text-center">
                    <a class="btn btn-danger"  href='delete.php?mobile=<?php echo $member['mobile'] ?> '>Delete</a>
                    <a class="btn btn-info"  href='edit.php?mobile=<?php echo $member['mobile'] ?> '>Edit</a>
                </div>

            </div>

            <?php
        }
        ?>

    </div>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script></html>