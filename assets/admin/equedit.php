<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit App From</title>
	<link rel="stylesheet" type="text/css" href="smc_style.css?<?php echo time();?>">
	   <style type="text/css">
	.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Title text */
.cat-text {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Style for form fields */
.cat-data input[type="text"], 
.cat-data select, 
.cat-data textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.cat-data input[type="text"]:focus, 
.cat-data select:focus, 
.cat-data textarea:focus {
    border-color: #007BFF;
    outline: none;
}

.cat-data textarea {
    height: 100px;
    resize: none;
}

/* Dropdown for Category */
.cat-data label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Style for image upload sections */
.image-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.image {
    flex: 1;
    text-align: center;
}

.image input[type="file"] {
    display: block;
    margin: 10px auto;
}

.pp {
    font-size: 14px;
    font-weight: bold;
    color: #555;
}

/* Style for buttons */
.buttons input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.buttons input[type="submit"]:hover {
    background-color: #218838;
}

/* Style for the back button */
.back-btn {
    display: block;
    width: 100px;
    margin: 20px auto;
    text-align: center;
    padding: 10px;
    background-color: #007BFF;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .image-section {
        flex-direction: column;
    }

    .image {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>
	<?php
	include("admin_pannel.php");
	
			include("dbconnect.php");

			$id=$_GET['id'];

			$sql = "select * from equipment where equipmentID=$id";

			$result = mysqli_query($connection,$sql);

			$record = mysqli_fetch_assoc($result);
	?>
<div class="container mt-5"> 
<section id="cat-content">
        <div class="cat-container">
            <div class="cat-text">
                Edit Equipment Form
            </div>
	<form action="equedit_process.php" method="post" enctype="multipart/form-data">
		
		<input type='hidden' name='equID' value='<?php echo $record['equipmentID']; ?>'>
		
		<div class="cat-data">
                  <input type="text"  name="equname" placeholder="Enter Your Equipment Name!"
                  value='<?php echo $record['equipmentname']; ?>'>
        </div>
        <!-- Dropdown for category -->
    <div class="cat-data">
        <label>Category</label>
        <select name="categoryID">
            <?php
            // Fetch categories from the database
            $categoryQuery = "SELECT categoryID, categoryName FROM category";
            $categoryResult = mysqli_query($connection, $categoryQuery);
            while ($category = mysqli_fetch_assoc($categoryResult)) {
                $selected = ($category['categoryID'] == $record['categoryID']) ? "selected" : "";
                echo "<option value='{$category['categoryID']}' {$selected}>{$category['categoryName']}</option>";
            }
            ?>
        </select>
    </div>

        <div class="cat-data">
                  <input type="text"  name="equcolor" placeholder="Enter Equipment Color!"
                  value='<?php echo $record['color']; ?>'>
        </div>
        <div class="cat-data">
                  <input type="text"  name="equbrand" placeholder="Enter Equipment Brand!"
                  value='<?php echo $record['brand']; ?>'>
        </div>
         <div class="cat-data">
                  <input type="text"  name="equprice" placeholder="Enter Equipment Price!"
                  value='<?php echo $record['price']; ?>'>
        </div>
         <div class="cat-data">
                  <input type="text"  name="eququantity" placeholder="Enter Equipment Quantity!"
                  value='<?php echo $record['quantity']; ?>'>
        </div>
         <div class="cat-data">
                  <input type="text"  name="equvat" placeholder="Enter Equipment VAT!"
                  value='<?php echo $record['VAT']; ?>'>
        </div>
        <div class="form-container">
		<div class="image-section">
		<div class="image">
					<label class="pp">Profile Picture</label>
					<input type="file" name="image1" value='<?php echo $record['image1']; ?>'>
		</div>
		<div class="image">
					<label class="pp">Profile Picture</label>
					<input type="file" name="image2" value='<?php echo $record['image2']; ?>'>
		</div>
		<div class="image">
					<label class="pp">Profile Picture</label>
					<input type="file" name="image3" value='<?php echo $record['image3']; ?>'>
		</div>
	</div>
		<div class="cat-data">
                  <textarea name="equdescrp" class="form-control-feed" placeholder="Equipment Description"><?php echo $record['description']; ?></textarea>
        </div>

        <div class="cat-data buttons">
        	 <input type="submit" name="equsave" value="update" />
        	</div>
</div>
	</form>
	<a href="javascript:history.go(-1);" class="back-btn">Back</a>
	</div>
</section>
	
</body>
</html>



