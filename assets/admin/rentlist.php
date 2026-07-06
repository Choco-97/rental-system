<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent List</title>
      <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }
 .usercontainer {
        max-width: 500px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .rent-item {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 20px;
        transition: box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .rent-item:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .rent-details {
        display: flex;
        flex-direction: column;
    }

    .user-info {
        margin-bottom: 10px;
        font-size: 15px;
        color: #444;
    }

    .user-info strong {
        color: #007bff;
    }

    .rent-actions {
        margin-top: 15px;
    }

    .button {
        display: inline-block;
        padding: 10px 15px;
        margin-right: 10px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .button.edit {
        background-color: #007bff;
        color: white;
    }

    .button.edit:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .button.delete {
        background-color: #dc3545;
        color: white;
    }

    .button.delete:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    @media only screen and (max-width: 768px) {
        .usercontainer {
            width: 95%;
        }

        .rent-item {
            padding: 15px;
        }

        .user-info {
            font-size: 14px;
        }

        .button {
            padding: 8px 10px;
            font-size: 12px;
        }
    }
      .main-content {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

.search-container {
    margin-bottom: 20px;
    text-align: center;
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
    .rent-list
    {
        margin-left: 150px;
    }
    h2{
        margin-left:120px;
    }
    </style>
</head>
<body>
         <div class="main-content">
    <div class="search-results">
<div class="search-container">
    <form action="rentlist.php" method="post">
        <input class="usearch" type="text" name="keyword" placeholder="Enter any keyword">
        <input class="usubmit" type="submit" name="search" value="Search">
    </form>
</div>

<?php 
    include ("dbconnect.php");
    include ("admin_pannel.php");

    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];

        $sql = "SELECT * FROM rents WHERE 
                (rentID LIKE '%$keyword%' OR 
                 customername LIKE '%$keyword%')";

        $result = mysqli_query($connection, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 0) {
            echo "<script>
                    alert('No results found for the searched user!');
                  </script>";
        } else {
            echo "<h2>Searched Rent Lists</h2>";
            echo "<div class='rent-list'>"; // Add a wrapper for rent items
            for ($i = 0; $i < $num_rows; $i++) { 
                $record = mysqli_fetch_assoc($result);
                $id = $record['rentID'];

                echo "<div class='rent-item'>";
                echo "<div class='rent-details'>";
                    echo "<span class='user-info'>User Name: <strong>".$record['customername']."</strong></span>";
                    echo "<span class='user-info'>Phone Number: <strong>".$record['phone']."</strong></span>";
                    echo "<span class='user-info'>Address: <strong>".$record['address']."</strong></span>";
                    echo "<span class='user-info'>Start Date: <strong>".$record['startdate']."</strong></span>";
                    echo "<span class='user-info'>End Date: <strong>".$record['enddate']."</strong></span>";
                    echo "<span class='user-info'>Duration: <strong>".$record['duration']."</strong></span>";
                    echo "<span class='user-info'>Total Rent Amount: <strong>".$record['totalrentamount']."</strong></span>";
                    echo "<span class='user-info'>Total Quantity: <strong>".$record['totalquantity']."</strong></span>";
                    echo "<span class='user-info'>Total VAT: <strong>".$record['totalvat']."</strong></span>";
                    echo "<span class='user-info'>Grand Total: <strong>".$record['grandtotal']."</strong></span>";
                    echo "<span class='user-info'>Transport Type: <strong>".$record['transporttype']."</strong></span>";
                    echo "<span class='user-info'>Payment Type: <strong>".$record['paymenttype']."</strong></span>";
                    echo "<span class='user-info'>Card Number: <strong>".$record['cardno']."</strong></span>";
                    echo "<span class='user-info'>Holder Name: <strong>".$record['holdername']."</strong></span>";
                    echo "<span class='user-info'>Expire Date: <strong>".$record['expdate']."</strong></span>";
                    echo "<span class='user-info'>Rent Status: <strong>".$record['rentstatus']."</strong></span>";
                    echo "<div class='rent-actions'>";
                        echo "<a href='deleterent' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                        echo "<a href='editrent.php?rentID=".$id."' class='button edit'>Edit</a>";
                    echo "</div>"; // Close rent-actions
                echo "</div>"; // Close rent-details
                echo "</div>"; // Close rent-item
            }
            echo "</div>"; // Close rent-list
        }
    }
?>
</div>  
    <div class="usercontainer">
    <?php
     

        include("dbconnect.php");

        $sql = "select * from rents"; //all users only

        $result = mysqli_query($connection,$sql);

        $num_rows = mysqli_num_rows($result);

        if($num_rows == 0)
        {   
            echo "<script>
                    alert('There is no recored rents!');
                 </script>";
        }
        else{

                for($i=0;$i<$num_rows;$i++)
                {

                    $record = mysqli_fetch_assoc($result); 

                    $id=$record['rentID'];

                    echo "<div class='rent-item'>";
                            
                            echo "<div class='rent-details'>";
                                echo "<span class='user-info'>User Name: ".$record['customername']."</span>";
                                echo "<span class='user-info'>Phnoe number: ".$record['phone']."</span>";
                                echo "<span class='user-info'>Address: ".$record['address']."</span>";
                                echo "<span class='user-info'>Start Date: ".$record['startdate']."</span>";
                                echo "<span class='user-info'>End Date: ".$record['enddate']."</span>";
                                echo "<span class='user-info'>Duration: ".$record['duration']."</span>";
                                echo "<span class='user-info'>Total Rent Amount: ".$record['totalrentamount']."</span>";
                                echo "<span class='user-info'>Total Quantity: ".$record['totalquantity']."</span>";
                                echo "<span class='user-info'>Total VAT: ".$record['totalvat']."</span>";
                                echo "<span class='user-info'>Grand Total: ".$record['grandtotal']."</span>";
                                echo "<span class='user-info'>Transport Type: ".$record['transporttype']."</span>";
                                echo "<span class='user-info'>Payment Type: ".$record['paymenttype']."</span>";
                                echo "<span class='user-info'>Card Number: ".$record['cardno']."</span>";
                                echo "<span class='user-info'>Holder Name: ".$record['holdername']."</span>";
                                echo "<span class='user-info'>Expire Date: ".$record['expdate']."</span>";
                                echo "<span class='user-info'>Rent Status: ".$record['rentstatus']."</span>";
                            
                                                      
                                echo "<a href='deleterent.php' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                                echo "<a href='editrent.php?customerID=".$id."' class='button edit'>Edit</a>";
                           echo "</div>"; 
                    echo "</div>";    

                }
                
        }
    ?>
 </div>
</div>
<script type="text/javascript">

    function showConfirm(id)
    {
        if(confirm("Are you sure you want to delete?"))
        {
            window.location.href="deleteuser.php?customerID="+id;
        }
        
    }   

</script>
</body>
</html>