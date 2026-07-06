<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent List</title>
      <style>
 * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .usearch {
            padding: 10px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .usubmit {
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .usubmit:hover {
            background-color: #218838;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .usercontainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            max-width: 1000px;
            margin-left: 250px;
        }

        .rent-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: calc(50% - 20px); /* Two items per row */
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
        }

        .rent-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .rent-details {
            display: flex;
            flex-direction: column;
        }

        .user-info {
            font-size: 14px;
            margin: 5px 0;
            color: #333;
        }

        .button {
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            font-weight: bold;
            cursor: pointer;
        }

        .button.delete {
            background-color: #ff4c4c;
            color: white;
        }

        .button.delete:hover {
            background-color: #ff6666;
        }

        .button.edit {
            background-color: #4CAF50;
            color: white;
        }

        .button.edit:hover {
            background-color: #66bb6a;
        }

        @media screen and (max-width: 900px) {
            .rent-item {
                width: calc(50% - 20px); /* 2 items per row on smaller screens */
            }
             .usercontainer {
               margin: 0;
            }
        }

        @media screen and (max-width: 600px) {
            .rent-item {
                width: 100%; /* 1 item per row on mobile */
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
        margin-left: 350px;
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
    <form action="returnlist.php" method="post">
            <input class="usearch" type="text" name="keyword" placeholder="Enter any keyword">

            <input class="usubmit" type="submit" name="search" value="Search">
        </form>
    
        
        </div>
        <?php 
        include ("dbconnect.php");
        include ("admin_pannel.php");


            if (isset($_POST['search'])) 
        {
            $keyword = $_POST['keyword'];

            $sql = $sql = "select * from returns where 
                                             (returnID LIKE '%$keyword%' OR 
                                             returndate LIKE '%$keyword%')";
        
            $result = mysqli_query($connection,$sql);

            $num_rows = mysqli_num_rows($result);

            if ($num_rows==0) 
            {
                echo "<script>
                    alert('Not found the searched user!');
                </script>";
            }
            else
            {
                echo "<h2>Searched Return Lists </h2>";
                echo "<div class='rent-list'>"; // Add a wrapper for rent items
                for ($i=0; $i <$num_rows ; $i++) 
                { 
                    $record = mysqli_fetch_assoc($result);

                    $id=$record['rentID'];

                    echo "<div class='rent-item'>";
                         
                            echo "<div class='rent-details'>";
                                echo "<span class='user-info'>User Name: ".$record['cusname']."</span>";
                                echo "<span class='user-info'>Phnoe number: ".$record['phonenumber']."</span>";
                                echo "<span class='user-info'>Address: ".$record['address']."</span>";
                                echo "<span class='user-info'>Return Date: ".$record['returndate']."</span>";
                                echo "<span class='user-info'>End Date: ".$record['enddate']."</span>";
                                echo "<span class='user-info'>Total late fees: ".$record['totallatefees']."</span>";
                                echo "<span class='user-info'>Equipment Condition: ".$record['equcondition']."</span>";
                                echo "<span class='user-info'>Total Quantity: ".$record['totalquantity']."</span>";
                                echo "<span class='user-info'>Damage Description: ".$record['damage']."</span>";
                                echo "<span class='user-info'>Pickup type: ".$record['pickuptype']."</span>";
                                echo "<span class='user-info'>other pickup location: ".$record['otherpickup']."</span>";
                                echo "<span class='user-info'>Rent ID: ".$record['rentID']."</span>";
                           
                                echo "<a href='#' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                                echo "<a href='editrent.php?rentID=".$id."' class='button edit'>Edit</a>";
                           echo "</div>"; 
                    echo "</div>";     
                    echo "</div>"; 
                    echo "</div>";       
                }   
            }   
        }
    
?>
</div>

    
    <div class="usercontainer">
    <?php
     

        include("dbconnect.php");

        $sql = "select * from returns"; //all users only

        $result = mysqli_query($connection,$sql);

        $num_rows = mysqli_num_rows($result);

        if($num_rows == 0)
        {   
            echo "<script>
                    alert('There is no recored returns!');
                 </script>";
        }
        else{

                for($i=0;$i<$num_rows;$i++)
                {

                    $record = mysqli_fetch_assoc($result); 

                    $id=$record['rentID'];

                    echo "<div class='rent-item'>";
                            
                            echo "<div class='rent-details'>";
                                echo "<span class='user-info'>User Name: ".$record['cusname']."</span>";
                                echo "<span class='user-info'>Phnoe number: ".$record['phonenumber']."</span>";
                                echo "<span class='user-info'>Address: ".$record['address']."</span>";
                                echo "<span class='user-info'>Return Date: ".$record['returndate']."</span>";
                                echo "<span class='user-info'>End Date: ".$record['enddate']."</span>";
                                echo "<span class='user-info'>Total late fees: ".$record['totallatefees']."</span>";
                                echo "<span class='user-info'>Equipment Condition: ".$record['equcondition']."</span>";
                                echo "<span class='user-info'>Total Quantity: ".$record['totalquantity']."</span>";
                                echo "<span class='user-info'>Damage Description: ".$record['damage']."</span>";
                                echo "<span class='user-info'>Pickup type: ".$record['pickuptype']."</span>";
                                echo "<span class='user-info'>other pickup location: ".$record['otherpickup']."</span>";
                                echo "<span class='user-info'>Rent ID: ".$record['rentID']."</span>";
                            
                                                      
                                echo "<a href='#' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                                echo "<a href='edituser.php?customerID=".$id."' class='button edit'>Edit</a>";
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