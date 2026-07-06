<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>	
	<link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">
<style>
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

  h2 {
    text-align: center;
    color: #333;
  }

  .user-item {
    display: flex;
    align-items: center;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .user-profile-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 20px;
    object-fit: cover;
  }

  .user-details {
    flex: 1;
  }

  .user-info {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #555;
  }

  .button {
    display: inline-block;
    padding: 8px 12px;
    margin-right: 10px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    font-size: 14px;
  }

  .button.edit {
    background-color: #007bff;
  }

  .button.edit:hover {
    background-color: #0056b3;
  }

  .button.delete {
    background-color: #dc3545;
  }

  .button.delete:hover {
    background-color: #c82333;
  }

  .usercontainer {
    margin-top: 20px;
  }

  @media only screen and (max-width: 768px) {
    .main-content {
      width: 95%;
      padding: 15px;
    }

    .user-item {
      flex-direction: column;
      align-items: flex-start;
    }

    .user-profile-img {
      width: 60px;
      height: 60px;
      margin-bottom: 15px;
    }

    .user-info {
      font-size: 12px;
    }

    .button {
      padding: 6px 10px;
      font-size: 12px;
    }
  }

</style>
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

			$sql = $sql = "select * from customer where 
											 (cusfname LIKE '%$keyword%' OR 
											 cuslname LIKE '%$keyword%' OR 
											 cusuname LIKE '%$keyword%' OR 
											 cusemail LIKE '%$keyword%')";
		
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
				echo "<h2>Searched Customer Lists </h2>";
				for ($i=0; $i <$num_rows ; $i++) 
				{ 
					$record = mysqli_fetch_assoc($result);

					$id=$record['customerID'];

					echo "<div class='user-item'>";
                            
                            echo "<img src='".$record['image']."' class='user-profile-img'><br>";
                            echo "<div class='user-details'>";
	                            echo "<span class='user-info'>First Name: ".$record['cusfname']."</span>";
	                            echo "<span class='user-info'>Last Name: ".$record['cuslname']."</span>";
	                            echo "<span class='user-info'>Username: ".$record['cusuname']."</span>";
	                            echo "<span class='user-info'>Email: ".$record['cusemail']."</span>";
	                            echo "<span class='user-info'>Phoneno: ".$record['cusphoneno']."</span>";
	                            echo "<span class='user-info'>Address: ".$record['cusaddress']."</span>";
                            
                           
	                            echo "<a href='deleteuser.php' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
	                            echo "<a href='edituser.php?customerID=".$id."' class='button edit'>Edit</a>";
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

		$sql = "select * from customer"; //all users only

		$result = mysqli_query($connection,$sql);

		$num_rows = mysqli_num_rows($result);

		if($num_rows == 0)
		{	
			echo "<script>
					alert('There is no registered username!');
				 </script>";
		}
		else{
				//num_rows not equal to 0 // user existed

				for($i=0;$i<$num_rows;$i++)
				{

					$record = mysqli_fetch_assoc($result); 

					$id=$record['customerID'];

				    echo "<div class='user-item'>";
                            
                            echo "<img src='".$record['image']."' class='user-profile-img'><br>";
                            echo "<div class='user-details'>";
	                            echo "<span class='user-info'>First Name: ".$record['cusfname']."</span>";
	                            echo "<span class='user-info'>Last Name: ".$record['cuslname']."</span>";
	                            echo "<span class='user-info'>Username: ".$record['cusuname']."</span>";
	                            echo "<span class='user-info'>Email: ".$record['cusemail']."</span>";
	                            echo "<span class='user-info'>Phoneno: ".$record['cusphoneno']."</span>";
	                            echo "<span class='user-info'>Address: ".$record['cusaddress']."</span>";
                            
                           
	                            echo "<a href='deleteuser.php' class='button delete' onclick='showConfirm(".$id.")'>Delete</a>";
	                            echo "<a href='edituser.php?customerID=".$id."' class='button edit'>Edit</a>";
                           echo "</div>"; // Close user-details
                   echo "</div>"; // Close user-item		

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