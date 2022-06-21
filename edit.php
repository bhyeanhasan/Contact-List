<?php
include "Configuration.php";
$mobile = $_GET['mobile'];
$sql = "SELECT * FROM contact WHERE mobile=".$mobile;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register Page</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
</nav>

<div class="container">
    <div class="row">

        <div class="col-md-3"></div>



        <?php
        while ($member = mysqli_fetch_array($result)) {
            ?>

            <div style="margin-top: 10vh;text-align: center;" class="col-md-6">
                <form action="update.php" method="post">
                    <h2 mb-5>Give All Information</h2>

                    <input class="form-control form-group" type="text" placeholder="First Name" name="firstname" required value="<?php echo $member['firstname']; ?>">
                    <input class="form-control form-group" type="text" placeholder="Last Name" name="lastname" value="<?php echo $member['lastname']; ?>">
                    <input class="form-control form-group" type="email" placeholder="Email" name="email" value="<?php echo $member['email']; ?>" >
                    <input class="form-control form-group" type="text" placeholder="Mobile Number" name="mobile" value="<?php echo $member['mobile']; ?>">
                    <input class="form-control form-group" type="text" placeholder="Address" name="address" value="<?php echo $member['address']; ?>">
                    <input class="form-group btn btn-success" type="submit" value="Add to Contact"  >

                </form>
            </div>

            <?php
        }
        ?>

        <div class="col-md-3"></div>

    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
