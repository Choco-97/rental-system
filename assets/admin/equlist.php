<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">

   <style type="text/css">
    /* Style for the search form */
    form{
        margin-left: 500px;
        margin-top: 10px;
    }
  .usearch {
    width: 300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
  }

  .usubmit {
    padding: 10px 20px;
    border: none;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }

  .usubmit:hover {
    background-color: #218838;
  }
   @media only screen and (max-width: 768px) {
    form{
        margin: 0;
    }
   }

   </style>
</head>
<body>

<?php 
    include("admin_pannel.php");
?>

<!-- Search form -->
<form method="GET" action="">
    <input type="text" name="search" class="usearch" placeholder="Search equipment..." value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>">
    <button type="submit" class="usubmit"> Search</button>
</form>

  <div class="equcontainer">
   <?php
    include("dbconnect.php");

    // Check if the search parameter exists
    if(isset($_GET['search'])) {
        $search = mysqli_real_escape_string($connection, $_GET['search']);
        // Modify the SQL query to search the equipment table based on user input
        $sql = "SELECT * FROM equipment WHERE 
                equipmentname LIKE '%$search%' OR 
                color LIKE '%$search%' OR 
                brand LIKE '%$search%' OR 
                description LIKE '%$search%'";
    } else {
        // Default query if there's no search
        $sql = "SELECT * FROM equipment";
    }

    $result = mysqli_query($connection, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0) {
        echo "<script>
                alert('No matching equipment found.');
             </script>";
    } else {
        // Equipment exists
        for($i = 0; $i < $num_rows; $i++) {
            $record = mysqli_fetch_assoc($result);
            $id = $record['equipmentID'];

            echo "<div class='equ-item'>";

            echo "<div class='image-container'>";
            echo "<img src='".$record['image1']."' class='item-img'><br>";
            echo "<img src='".$record['image2']."' class='item-img'><br>";
            echo "<img src='".$record['image3']."' class='item-img'><br>";
            echo "</div>"; // Close image-container

            echo "<div class='equ-details'>";
            echo "<span class='campaign-info'>Equipment Name: ".$record['equipmentname']."</span>";
            echo "<span class='campaign-info'>Color: ".$record['color']."</span>";
            echo "<span class='campaign-info'>Brand: ".$record['brand']."</span>";
            echo "<span class='campaign-info'>Price: ".$record['price']."</span>";
            echo "<span class='campaign-info'>Quantity: ".$record['quantity']."</span>";
            echo "<span class='campaign-info'>Description: ".$record['description']."</span>";

            echo "<a href='#' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
            echo "<a href='equedit.php?id=".$id."' class='button edit'>Edit</a>";

            echo "</div>"; // Close equ-details
            echo "</div>"; // Close equ-item
        }
    }
?>

 </div>
<script type="text/javascript">

    function showConfirm(id)
    {
        if(confirm("Are you sure you want to delete?"))
        {
            window.location.href="deleteequ.php?id="+id;
        }
        
    }   
</script>




</body>
</html>