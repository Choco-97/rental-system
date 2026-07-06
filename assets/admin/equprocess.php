<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Equipment</title>
</head>
<body>
	<?php 
	
		include("dbconnect.php");		
		   
        $pic_name = $_FILES['file1']['name'];
        $pic_tname = $_FILES['file1']['tmp_name'];
 
        $path = "../images/equipment/".$pic_name;
 
        copy($pic_tname, $path);
 
 
        $pic1_name = $_FILES['file2']['name'];
        $pic1_tname = $_FILES['file2']['tmp_name'];
 
        $path1 = "../images/equipment/".$pic1_name;
        copy($pic1_tname, $path1);

        $pic2_name = $_FILES['file3']['name'];
        $pic2_tname = $_FILES['file3']['tmp_name'];
 
        $path2 = "../images/equipment/".$pic2_name;
 
        copy($pic2_tname, $path2);

		$equname= mysqli_real_escape_string($connection,trim($_POST['equname']));
		$color= mysqli_real_escape_string($connection,trim($_POST['equcolor']));
		$brand= mysqli_real_escape_string($connection,trim($_POST['equbrand']));
		$price= mysqli_real_escape_string($connection,trim($_POST['equprice']));
		$quantity= mysqli_real_escape_string($connection,trim($_POST['eququantity']));
		$vat= mysqli_real_escape_string($connection,trim($_POST['equvat']));
		$descrp= mysqli_real_escape_string($connection,trim($_POST['equdescrp']));
		$rentprice= 130;
		$catID= mysqli_real_escape_string($connection,trim($_POST['catID']));
		/*if (empty($$equname)) 
		{
			echo "You must enter equipment name.";
		} 
		else*/ if (empty($color)) 
		{
			echo "You must enter color.";
		}
		else if (empty($brand)) 
		{
			echo "You must enter brand.";
		}
		else if (empty($price)) 
		{
			echo "You must enter price.";
		}
		else if (empty($quantity)) 
		{
			echo "You must enter quantity.";
		}
		else if (empty($vat)) 
		{
			echo "You must enter VAT.";
		}
		else if (empty($descrp)) 
		{
			echo "You must enter description.";
		}  
		else
		   {
				

				$sql_select = "select * from equipment where equipmentname='$equname'";

				$result = mysqli_query($connection,$sql_select);

				$rnum_ows = mysqli_num_rows($result);

				if ($rnum_ows==0) 
				{
					
				  $sql ="Insert into equipment(equipmentname,color,brand,price,quantity,VAT,image1,image2,image3,description,rentprice,categoryID) 
				  values('$equname','$color','$brand','$price','$quantity','$vat','$path','$path1','$path2','$descrp','$rentprice','$catID')";
				  if (mysqli_query($connection,$sql)) 
				  {
				  	echo "<script>
				        		alert('One Equipment record is submitted!');
				        		window.location.href='equipment.php';
				 		</script>";
				  }
				  else echo "Insertion error.<br>";
			    }
			    else
			    {
					echo "<script>
				        	alert('Equipment is existed! Try again to enter new one!');
				        	window.location.href='equipment.php';
				 		</script>";
			    }
	        }



	 ?>

	 
</body>
</html>