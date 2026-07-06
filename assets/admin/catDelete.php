<?php
session_start();
include('dbconnect.php');

// Check if categoryID is set in the URL
if (isset($_GET['categoryID'])) {
    $catID = $_GET['categoryID'];

    // Delete the category from the database
    $sql_delete = "DELETE FROM category WHERE categoryID = '$catID'";

    if (mysqli_query($connection, $sql_delete)) {
        echo "<script>alert('Category deleted successfully!'); window.location.href='category.php';</script>";
    } else {
        echo "<script>alert('Error deleting category!'); window.location.href='category.php';</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.location.href='category.php';</script>";
}
?>
