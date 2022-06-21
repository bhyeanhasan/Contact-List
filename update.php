<?php

include "Configuration.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

$sql = "UPDATE contact SET firstname='$firstname', lastname='$lastname', email='$email',address='$address'  WHERE  mobile= '$mobile'";

if (mysqli_query($connection, $sql)) {
    header("location: View.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);

?>

