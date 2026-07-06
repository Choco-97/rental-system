<?php  
function AddProduct($ProductID,$PurchasePrice,$PurchaseQuantity)
{
	include('connect.php');

	$query="SELECT * FROM equipment WHERE equipmentID='$equID' ";
	$ret=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ret);
	$arr=mysqli_fetch_array($ret);

	if($count < 1) 
	{
		echo "<p>Product not found.</p>";
		exit();
	}

	if($RentQuantity < 1) 
	{
		echo "<script>window.alert('Please check product purchase Quantity!')</script>";
	}

	if(isset($_SESSION['rent_function']))
	{
		$Index=IndexOf($equID);

		if($Index == -1) // Condition 2
		{
			$size=count($_SESSION['rent_function']);

			$_SESSION['rent_function'][$size]['equipmentID']=$equID;
			$_SESSION['rent_function'][$size]['PurchasePrice']=$PurchasePrice;
			$_SESSION['rent_function'][$size]['PurchaseQuantity']=$PurchaseQuantity;

			$_SESSION['rent_function'][$size]['ProductName']=$arr['ProductName'];
			$_SESSION['rent_function'][$size]['ProductImage1']=$arr['ProductImage1'];
		}
		else
		{
			$_SESSION['rent_function'][$Index]['PurchaseQuantity']+=$PurchaseQuantity;
		}
	}
	else
	{
		$_SESSION['rent_function']=array(); //Create Session Array 

		$_SESSION['rent_function'][0]['equipmentID']=$equID;
		$_SESSION['rent_function'][0]['price']=$price;
		$_SESSION['rent_function'][0]['rentquantity']=$rentquantity;

		$_SESSION['rent_function'][0]['equipmentname']=$arr['equipmentame'];
		$_SESSION['rent_function'][0]['image']=$arr['image'];
	}

	echo "<script>window.location='Purchase.php'</script>";
}

function RemoveProduct($ProductID)
{
	$Index=IndexOf($ProductID);

	unset($_SESSION['Purchase_Function'][$Index]);
	$_SESSION['Purchase_Function']=array_values($_SESSION['Purchase_Function']);

	echo "<script>window.location='Purchase.php'</script>";
}

function ClearAll()
{
	unset($_SESSION['Purchase_Function']);
	echo "<script>window.location='Purchase.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	if(!isset($_SESSION['Purchase_Function'])) 
	{
		$TotalAmount=0;
	}
	else
	{
		$size=count($_SESSION['Purchase_Function']);

		for ($i=0; $i < $size; $i++) 
		{ 
			$PurchasePrice=$_SESSION['Purchase_Function'][$i]['PurchasePrice'];
			$PurchaseQuantity=$_SESSION['Purchase_Function'][$i]['PurchaseQuantity'];

			$TotalAmount+=($PurchasePrice * $PurchaseQuantity);
		}
		return $TotalAmount;
	}
}

function CalculateQuantity()
{
	$TotalQuantity=0;

	if(!isset($_SESSION['Purchase_Function'])) 
	{
		$TotalQuantity=0;
	}
	else
	{
		$size=count($_SESSION['Purchase_Function']);

		for ($i=0; $i < $size; $i++) 
		{ 
			$PurchaseQuantity=$_SESSION['Purchase_Function'][$i]['PurchaseQuantity'];

			$TotalQuantity+=$PurchaseQuantity;
		}
		return $TotalQuantity;
	}
}

function IndexOf($ProductID)
{
	if(!isset($_SESSION['Purchase_Function'])) 
	{
		return -1;
	}

	$size=count($_SESSION['Purchase_Function']);

	if($size < 1) 
	{
		return -1;
	}
	else
	{
		for ($i=0; $i < $size; $i++) 
		{ 
			if($ProductID == $_SESSION['Purchase_Function'][$i]['ProductID'])
			{
				return $i;
			}
		}
		return -1;
	}
}
?>