<?php  
session_start();
include('dbconnect.php');

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the logged-in customer's ID
$customerID = $_SESSION['customerID'];

// Fetch current customer data from the database
$sql_select = "SELECT * FROM customer WHERE customerID = '$customerID'";
$result = mysqli_query($connection, $sql_select);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['cusfname'];
    $lname = $row['cuslname'];
    $address = $row['cusaddress'];
    $phoneno = $row['cusphoneno'];
} else {
    echo "<script>alert('Customer not found!'); window.location.href='customer_profile.php';</script>";
}

// Handle form submission to update the customer profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $address = trim($_POST['address']);
    $phoneno = trim($_POST['phoneno']);

    if (empty($fname) || empty($lname) || empty($address) || empty($phoneno)) {
        echo "All fields are required.";
    } else {
        $sql_update = "UPDATE customer SET cusfname = '$fname', cuslname = '$lname', cusaddress = '$address', cusphoneno = '$phoneno' WHERE customerID = '$customerID'";
        
        if (mysqli_query($connection, $sql_update)) {
            // Update session variables with new data
            $_SESSION['cusfname'] = $fname;
            $_SESSION['cuslname'] = $lname;
            $_SESSION['cusaddress'] = $address;
            $_SESSION['cusphoneno'] = $phoneno;

            echo "<script>alert('Profile updated successfully!'); window.location.href='userprofile.php';</script>";
        } else {
            echo "Update error.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: palegoldenrod;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 600px;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: darkgoldenrod;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: darkgoldenrod;
        }
        input {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: darkgoldenrod;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Profile</h1>
    <form action="" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($fname); ?>" required>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($lname); ?>" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>" required>

        <label for="phoneno">Phone No:</label>
        <input type="text" name="phoneno" id="phoneno" value="<?php echo htmlspecialchars($phoneno); ?>" required>

        <input type="submit" value="Update Profile">
    </form>
</div>
</body>
</html>
