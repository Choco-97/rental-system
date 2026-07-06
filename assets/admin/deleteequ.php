<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete</title>
</head>
<body>
	<?php

			include("dbconnect.php");

			$id=$_GET['id']; //a href

			$sql = "delete from equipment where equipmentID=$id";

			//are you sure?

			if(mysqli_query($connection,$sql))
			{
				
				echo "<script>
				        alert('One record is successfully deleted!');
				        window.location.href='equlist.php';
				      </script>";
			}
			else 
			{
				echo "<script>
				        alert('Error in removing the equlist.');
				      </script>";
			}

	?>

</body>
</html>
