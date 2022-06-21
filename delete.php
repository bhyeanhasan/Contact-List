<?php
include "Configuration.php";
$mobile = $_GET['mobile'];
$sql = "DELETE FROM contact WHERE mobile=".$mobile;


if (mysqli_query($connection, $sql)) {
    header("location: View.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>