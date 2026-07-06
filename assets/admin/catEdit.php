<?php
session_start();
include('dbconnect.php');

// Get categoryID from URL
if (isset($_GET['categoryID'])) {
    $catID = $_GET['categoryID'];

    // Fetch the category data from the database
    $sql_select = "SELECT * FROM category WHERE categoryID = '$catID'";
    $result = mysqli_query($connection, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $catname = $row['categoryname'];
        $status = $row['status'];
    } else {
        echo "<script>alert('Category not found!'); window.location.href='category.php';</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); window.location.href='category.php';</script>";
}

// Handle form submission to update the category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catname = trim($_POST['catname']);
    $rdostatus = trim($_POST['rdostatus']);

    if (empty($catname)) {
        echo "You must enter category name.";
    } else {
        $sql_update = "UPDATE category SET categoryname = '$catname', status = '$rdostatus' WHERE categoryID = '$catID'";
        
        if (mysqli_query($connection, $sql_update)) {
            echo "<script>alert('Category updated successfully!'); window.location.href='category.php';</script>";
        } else {
            echo "Update error.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Category</title>
    <style type="text/css">
        
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .cat-text {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .cat-container {
            padding: 20px;
        }

        .cat-data {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        input[type="radio"] {
            margin-left: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }


        /* Responsive styling */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }

            .cat-text {
                font-size: 20px;
            }

            input[type="submit"],
            a {
                display: block;
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
		 <?php 
      include ("admin_pannel.php");
    ?>
    <div class="container mt-5"> 
<section id="cat-content">
    <div class="cat-container">
            <div class="cat-text">
                Edit Category Form
            </div>
    <form action="" method="POST">
    	<div class="cat-data">
        <label>Category Name:</label>
        <input type="text" name="catname" value="<?php echo htmlspecialchars($catname); ?>" required>
        </div>
        <br>
        <div class="cat-data">
        <label>Status:</label>
        <input type="radio" name="rdostatus" value="Active" <?php echo ($status === 'Active') ? 'checked' : ''; ?>> Active
        <input type="radio" name="rdostatus" value="InActive" <?php echo ($status === 'InActive') ? 'checked' : ''; ?>> 
        InActive
        </div><br>
        <input type="submit" value="Update">
        <a href="category.php">Cancel</a>
    </form>
</div>
</section>
</body>
</html>
