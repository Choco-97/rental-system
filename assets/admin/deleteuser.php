<?php
include("dbconnect.php");

if (isset($_GET['customerID'])) {
    $id = $_GET['customerID'];

    // Delete query
    $deleteSql = "DELETE FROM customer WHERE customerID = '$id'";

    if (mysqli_query($connection, $deleteSql)) {
        echo "<script>alert('User deleted successfully!'); window.location.href='cuslist.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
}
?>