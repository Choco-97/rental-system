<?php
include("dbconnect.php");

// Retrieve and escape user input
$id = mysqli_real_escape_string($connection, $_POST['equID']);
$equname = mysqli_real_escape_string($connection, $_POST['equname']);
$equcolor = mysqli_real_escape_string($connection, $_POST['equcolor']);
$equbrand = mysqli_real_escape_string($connection, $_POST['equbrand']);
$equprice = mysqli_real_escape_string($connection, $_POST['equprice']);
$eququantity = mysqli_real_escape_string($connection, $_POST['eququantity']);
$equvat = mysqli_real_escape_string($connection, $_POST['equvat']);
$equdescrp = mysqli_real_escape_string($connection, $_POST['equdescrp']);
$categoryID = mysqli_real_escape_string($connection, $_POST['categoryID']);

// Prepare SQL query
$sql = "UPDATE equipment SET 
            equipmentname='$equname',
            categoryID='$categoryID',
            color='$equcolor',
            brand='$equbrand',
            price='$equprice',
            quantity='$eququantity',
            VAT='$equvat',
            description='$equdescrp' 
        WHERE equipmentID='$id'";

// Execute query
if (mysqli_query($connection, $sql)) {
    echo "<script>
            alert('The equipment details are updated!');
            window.location.href='equlist.php';
          </script>";
} else {
    echo "<script>
            alert('Updating error!');
          </script>";
}

// Close the connection
mysqli_close($connection);
?>
