<?php
include("dbconnect.php");

if (isset($_GET['customerID'])) {
    $id = $_GET['customerID'];

    // Fetch the current user data
    $sql = "SELECT * FROM customer WHERE customerID = '$id'";
    $result = mysqli_query($connection, $sql);
    $record = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $cusfname = $_POST['cusfname'];
        $cuslname = $_POST['cuslname'];
        $cusuname = $_POST['cusuname'];
        $cusemail = $_POST['cusemail'];
        $cusphoneno = $_POST['cusphoneno'];
        $cusaddress = $_POST['cusaddress'];

        // Update query
        $updateSql = "UPDATE customer SET cusfname='$cusfname', cuslname='$cuslname', cusuname='$cusuname', cusemail='$cusemail', cusphoneno='$cusphoneno', cusaddress='$cusaddress' WHERE customerID = '$id'";
        
        if (mysqli_query($connection, $updateSql)) {
            echo "<script>alert('User updated successfully!'); window.location.href='cuslist.php';</script>";
        } else {
            echo "<script>alert('Error updating user.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .edit-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .edit-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 768px) {
            .edit-container {
                width: 90%;
            }

            input[type="submit"] {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
     <?php 
      include ("admin_pannel.php");
    ?>
    <div class="edit-container">
    <h2>Edit User</h2>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="cusfname" value="<?php echo $record['cusfname']; ?>" required><br>
        
        <label>Last Name:</label>
        <input type="text" name="cuslname" value="<?php echo $record['cuslname']; ?>" required><br>
        
        <label>Username:</label>
        <input type="text" name="cusuname" value="<?php echo $record['cusuname']; ?>" required><br>
        
        <label>Email:</label>
        <input type="email" name="cusemail" value="<?php echo $record['cusemail']; ?>" required><br>
        
        <label>Phone Number:</label>
        <input type="text" name="cusphoneno" value="<?php echo $record['cusphoneno']; ?>" required><br>
        
        <label>Address:</label>
        <input type="text" name="cusaddress" value="<?php echo $record['cusaddress']; ?>" required><br>

        <input type="submit" name="update" value="Update User">
    </form>
</div>
</body>
</html>
