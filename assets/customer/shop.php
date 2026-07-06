<?php 
   include("dbconnect.php");  
   
   $selectedCategory = isset($_POST['category']) ? $_POST['category'] : '';
   $selectedPriceRange = isset($_POST['price_range']) ? $_POST['price_range'] : '';
   $searchTerm = isset($_POST['search_term']) ? $_POST['search_term'] : '';

   // Adjust the equipment query for filters and search
   $equipmentQuery = "SELECT * FROM equipment WHERE 1=1"; // Base query

   if (!empty($selectedCategory)) {
       $equipmentQuery .= " AND categoryID = '$selectedCategory'";
   }

   if (!empty($selectedPriceRange)) {
       // Extract price range values
       list($minPrice, $maxPrice) = explode('-', $selectedPriceRange);
       $equipmentQuery .= " AND price BETWEEN $minPrice AND $maxPrice";
   }

   if (!empty($searchTerm)) {
       // Search equipment by name (adjust as needed for other searchable fields)
       $equipmentQuery .= " AND equipmentname LIKE '%$searchTerm%'";
   }

   // Now fetch the equipment based on the filtered query
   $result = mysqli_query($connection, $equipmentQuery);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>DORA</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="bootstrap.css?<?php echo time();?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../admin/admin.css?<?php echo time();?>">

  <style>
    /* Styling only the category select dropdown */
    .category-form {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .category-select {
        width: 300px;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #007bff; /* Blue border */
        border-radius: 5px;
        background-color: #f9f9f9; /* Light background */
        transition: 0.3s ease;
    }

    .category-select:focus {
        border-color: #0056b3; /* Darker blue when focused */
        box-shadow: 0 0 8px rgba(0, 86, 179, 0.5);
        outline: none;
    }

    .category-select option {
        padding: 10px; /* Space inside options */
    }
.filter-container, .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            width: 100%;
            max-width: 800px;
        }

        /* Styling for the select boxes */
        .filter-container select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #007bff;
            border-radius: 4px;
            margin: 0 10px;
            width: 200px;
        }

        /* Styling for the search bar */
        .search-container input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .search-container button {
            padding: 10px 20px;
            margin-top: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        /* Default layout for screens larger than 700px */
        @media (min-width: 701px) {
            .filter-container, .search-container {
                flex-direction: row;
            }
        }

        /* Responsive layout for smaller screens (700px or less) */
        @media (max-width: 700px) {
            .filter-container, .search-container {
                flex-direction: column;
                width: 90%;
            }

            .filter-container select,
            .search-container input[type="text"],
            .search-container button {
                margin: 10px 0;
                width: 100%;
            }

            .search-container button {
                margin-left: 0;
                width: 300px;
            }
        }
</style>
</head>

<body class="sub_page">
 <?php include ("navbar.php") ?>


<?php
    // Fetch categories for the dropdown
    $categoryQuery = "SELECT * FROM category";
    $categoryResult = mysqli_query($connection, $categoryQuery);
?>

<!-- Category Selection Form -->
<div class="filter-container">
<form class="category-form" method="POST" action="">
    <label for="category"></label>
    <select name="category" class="category-select" id="category" onchange="this.form.submit()">
        <option value=""> Select a Category </option>
        <?php while ($catRow = mysqli_fetch_assoc($categoryResult)) { ?>
            <option value="<?php echo $catRow['categoryID']; ?>" <?php if($catRow['categoryID'] == $selectedCategory) echo 'selected'; ?>>
                <?php echo $catRow['categoryname']; ?>
            </option>
        <?php } ?>
    </select>

    <label for="price_range"></label>
    <select name="price_range" class="category-select" id="price_range" onchange="this.form.submit()">
        <option value="">Select Price Range</option>
        <option value="0-50" <?php if($selectedPriceRange == "0-50") echo 'selected'; ?>>0 - 50</option>
        <option value="51-100" <?php if($selectedPriceRange == "51-100") echo 'selected'; ?>>51 - 100</option>
        <option value="101-200" <?php if($selectedPriceRange == "101-200") echo 'selected'; ?>>101 - 200</option>
    </select>
 </form>
 </div>

 <div class="search-container">
<form method="post">
    <input type="text" name="search_term" placeholder="Search equipment..." value="<?php echo isset($_POST['search_term']) ? $_POST['search_term'] : ''; ?>">
    <button type="submit">Search</button>

</form>
</div>

<table class="equ-display-container">
<div class="equcontainer">
    <?php
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 0) {
            echo "<script>alert('There is no recorded Equipment!');</script>";
        } else {
            // Display equipment based on the filters
            for ($i = 0; $i < $num_rows; $i += 4) {
                $equipmentQueryPaged = $equipmentQuery . " LIMIT $i, 4";
                $result2 = mysqli_query($connection, $equipmentQueryPaged);
                $num_rows2 = mysqli_num_rows($result2);

                echo "<tr>";
                for ($x = 0; $x < $num_rows2; $x++) {
                    $row = mysqli_fetch_array($result2);

                    $equID = $row['equipmentID'];
                    $equname = $row['equipmentname'];
                    $price = $row['price'];
                    $image = $row['image1'];
                    list($width, $height) = getimagesize($image);
                    $w = $width / 2;
                    $h = $height / 2;
                    ?>

                    <td class="equ-descrp">
                        <img src="<?php echo $image ?>" width="<?php echo $w ?>" height="<?php echo $h ?>"/>
                        <hr>
                        <b><h3><?php echo $equname ?></h3></b>
                        <br>
                        <b><h3><?php echo $price ?></h3></b>
                        <button class="displayequ"><a href="equdetails.php?equipmentID=<?php echo $equID ?>">More Details</a></button>
                    </td>
                    <?php  
                }
                echo "</tr>";
            }
        }
    ?>
</div>
</table>
</body>
</html>