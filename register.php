<?php

include "Configuration.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

$sql = "INSERT INTO contact (firstname, lastname, email, mobile, address) VALUES ('$firstname','$lastname','$email','$mobile','$address')";

if (mysqli_query($connection, $sql)) {
    header("location: View.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);

?>

