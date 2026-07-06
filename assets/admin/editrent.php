<?php
include("dbconnect.php"); // Database connection
if (isset($_GET['rentID'])) {
    $rentID = $_GET['rentID'];

    // Fetch existing rental information
    $sql = "SELECT * FROM rents WHERE rentID = '$rentID'";
    $result = mysqli_query($connection, $sql);
    $rental = mysqli_fetch_assoc($result);

    if (!$rental) {
        echo "Rental record not found.";
        exit;
    }

    // Handle form submission for editing
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $customername = $_POST['customername'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $duration = $_POST['duration'];
        $totalrentamount = $_POST['totalrentamount'];
        $totalquantity = $_POST['totalquantity'];
        $totalvat = $_POST['totalvat'];
        $grandtotal = $_POST['grandtotal'];
        $transporttype = $_POST['transporttype'];
        $paymenttype = $_POST['paymenttype'];
        $cardno = $_POST['cardno'];
        $holdername = $_POST['holdername'];
        $expdate = $_POST['expdate'];
        $rentstatus = $_POST['rentstatus'];

        // Update rental information in the database
        $updateSQL = "UPDATE rents SET 
            customername='$customername',
            phone='$phone',
            address='$address',
            startdate='$startdate',
            enddate='$enddate',
            duration='$duration',
            totalrentamount='$totalrentamount',
            totalquantity='$totalquantity',
            totalvat='$totalvat',
            grandtotal='$grandtotal',
            transporttype='$transporttype',
            paymenttype='$paymenttype',
            cardno='$cardno',
            holdername='$holdername',
            expdate='$expdate',
            rentstatus='$rentstatus'
            WHERE rentID='$rentID'";

        if (mysqli_query($connection, $updateSQL)) {
            echo "<script>alert('Rental information updated successfully.'); window.location.href='rentlist.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rent</title>
</head>
<body>
<h2>Edit Rental Information</h2>
<form method="post" action="">
    <label for="customername">User Name:</label>
    <input type="text" name="customername" value="<?php echo $rental['customername']; ?>" required><br>
    
    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" value="<?php echo $rental['phone']; ?>" required><br>
    
    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo $rental['address']; ?>" required><br>
    
    <label for="startdate">Start Date:</label>
    <input type="date" name="startdate" value="<?php echo $rental['startdate']; ?>" required><br>
    
    <label for="enddate">End Date:</label>
    <input type="date" name="enddate" value="<?php echo $rental['enddate']; ?>" required><br>
    
    <label for="duration">Duration:</label>
    <input type="text" name="duration" value="<?php echo $rental['duration']; ?>" required><br>
    
    <label for="totalrentamount">Total Rent Amount:</label>
    <input type="number" name="totalrentamount" value="<?php echo $rental['totalrentamount']; ?>" required><br>
    
    <label for="totalquantity">Total Quantity:</label>
    <input type="number" name="totalquantity" value="<?php echo $rental['totalquantity']; ?>" required><br>
    
    <label for="totalvat">Total VAT:</label>
    <input type="number" name="totalvat" value="<?php echo $rental['totalvat']; ?>" required><br>
    
    <label for="grandtotal">Grand Total:</label>
    <input type="number" name="grandtotal" value="<?php echo $rental['grandtotal']; ?>" required><br>
    
    <label for="transporttype">Transport Type:</label>
    <input type="text" name="transporttype" value="<?php echo $rental['transporttype']; ?>" required><br>
    
    <label for="paymenttype">Payment Type:</label>
    <input type="text" name="paymenttype" value="<?php echo $rental['paymenttype']; ?>" required><br>
    
    <label for="cardno">Card Number:</label>
    <input type="text" name="cardno" value="<?php echo $rental['cardno']; ?>" required><br>
    
    <label for="holdername">Holder Name:</label>
    <input type="text" name="holdername" value="<?php echo $rental['holdername']; ?>" required><br>
    
    <label for="expdate">Expire Date:</label>
    <input type="date" name="expdate" value="<?php echo $rental['expdate']; ?>" required><br>
    
    <label for="rentstatus">Rent Status:</label>
    <input type="text" name="rentstatus" value="<?php echo $rental['rentstatus']; ?>" required><br>
    
    <input type="submit" value="Update">
</form>
</body>
</html>
