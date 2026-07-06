<?php
    include("dbconnect.php");

    // Ensure the 'id' parameter exists before trying to use it
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete the record from the 'contact' table
        $sql = "DELETE FROM feed WHERE feedid=$id";

        if (mysqli_query($connection, $sql)) {
            echo "<script>
                    alert('One record is successfully deleted!');
                    window.location.href='contactlist.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error in removing the list.');
                  </script>";
        }
    } 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>	
	<link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">
</head>
<body>
	<?php  
    include ("admin_pannel.php");
    ?>
     <div class="main-content">
	<div class="search-results">
    <div class="search-container">
	<form action="cuslist.php" method="post">
			<input class="usearch" type="text" name="keyword" placeholder="Enter any keyword">

			<input class="usubmit" type="submit" name="search" value="Search">
		</form>
	
		
		</div>
		<?php 
		include ("dbconnect.php");
			if (isset($_POST['search'])) 
		{
			$keyword = $_POST['keyword'];

			$sql = $sql = "select * from feed where 
											 (name LIKE '%$keyword%' OR 
											 email LIKE '%$keyword%' OR 
											 type LIKE '%$keyword%')";
		
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
				echo "<h2>Searched App Lists </h2>";
				for ($i=0; $i <$num_rows ; $i++) 
				{ 
					$record = mysqli_fetch_assoc($result);

					$id=$record['feedid'];

					echo "<div class='user-item'>";

                            echo "<div class='user-details'>";
	                            echo "<span class='user-info'>Name: ".$record['name']."</span>";
	                            echo "<span class='user-info'>Email: ".$record['email']."</span>";
	                            echo "<span class='user-info'>Type: ".$record['type']."</span>";
	                            echo "<span class='user-info'>Message: ".$record['feed']."</span>";
                            
                           
	                            echo "<a href='#' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                           echo "</div>"; // Close user-details
                    echo "</div>"; // Close user-item				
				}	
			}	
		}
	
?>
</div>

	
	<div class="usercontainer">
	<?php
	 

		include("dbconnect.php");

		$sql = "select * from feed"; //all users only

		$result = mysqli_query($connection,$sql);

		$num_rows = mysqli_num_rows($result);

		if($num_rows == 0)
		{	
			echo "<script>
					alert('There is no registered feedback!');
				 </script>";
		}
		else{
				//num_rows not equal to 0 // user existed

				for($i=0;$i<$num_rows;$i++)
				{

					$record = mysqli_fetch_assoc($result); 

					$id=$record['feedid'];

				    echo "<div class='user-item'>";

                            echo "<div class='user-details'>";
	                             echo "<span class='user-info'>Name: ".$record['name']."</span>";
	                            echo "<span class='user-info'>Email: ".$record['email']."</span>";
	                            echo "<span class='user-info'>Type: ".$record['type']."</span>";
	                            echo "<span class='user-info'>Message: ".$record['feed']."</span>";
                           
	                            echo "<a href='#' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
                           echo "</div>"; // Close user-details
                   echo "</div>"; // Close user-item		

				}
				
		}
	?>
 </div>
</div>
<script type="text/javascript">

function showConfirm(id) {
    if(confirm("Are you sure you want to delete?")) {
        window.location.href="feedlist.php?id="+id;  // Ensure 'id' matches the PHP script
    }
}
	

</script>

</body>
</html>