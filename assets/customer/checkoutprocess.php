<?php  
session_start();
include('dbconnect.php');
include('AutoID_Functions.php');
include('cart_function.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Validate Start Date
    $start_date = $_POST['startdate'];
    if (empty($start_date)) {
        $errors['startdate'] = "Start date is required.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $start_date)) {
        $errors['startdate'] = "Invalid start date format. Use YYYY-MM-DD.";
    } else {
        $start_date_parts = explode("-", $start_date);
        if (!checkdate($start_date_parts[1], $start_date_parts[2], $start_date_parts[0])) {
            $errors['startdate'] = "Invalid start date.";
        }
    }

    // Validate End Date
    $end_date = $_POST['enddate'];
    if (empty($end_date)) {
        $errors['enddate'] = "End date is required.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $end_date)) {
        $errors['enddate'] = "Invalid end date format. Use YYYY-MM-DD.";
    } else {
        $end_date_parts = explode("-", $end_date);
        if (!checkdate($end_date_parts[1], $end_date_parts[2], $end_date_parts[0])) {
            $errors['enddate'] = "Invalid end date.";
        }
    }

    // Optionally, check if end date is after start date
    if (!empty($start_date) && !empty($end_date)) {
        if (strtotime($end_date) < strtotime($start_date)) {
            $errors['date_range'] = "End date must be after the start date.";
        }
    }
}
if(isset($_POST['btncheck'])) 
{
	$txtrentID=$_POST['txtrentID'];
	$CustomerID=$_SESSION['customerID'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$rdoPaymentType=$_POST['rdopayment'];
	$rdoDeliveryType=$_POST['rdodelivery'];
	

	if($rdoDeliveryType == "Same") 
	{
		$CustomerName=$_SESSION['cusuame'];
		$CustomerPhone=$_SESSION['cusphoneno'];
		$CustomerAddress=$_SESSION['cusaddress'];
	}
	else
	{
		$CustomerName=$_POST['txtcusname'];
		$CustomerPhone=$_POST['txtcusphone'];
		$CustomerAddress=$_POST['txtotheraddress'];
	}


	if($rdoPaymentType == "CARD") 
	{
		$txtCardNo=$_POST['txtcardno'];
		$txtholdername=$_POST['txtholdername'];
		$expdate=$_POST['expdate'];
	}
	else
	{
		$txtCardNo="N/A";
	}

	$dailyRent=$_POST['dailyRent'];
	$duration=$_POST['duration'];
	$totalRent=$_POST['totalRent'];
	$txtTotalAmount=$_POST['txtTotalAmount'];
	$txtTotalQuantity=$_POST['txtTotalQuantity'];
	$txtVAT=$_POST['txtVAT'];
	$txtGrandTotal=$_POST['txtGrandTotal'];
	$rentstatus="Pending";

	$Insert1="INSERT INTO `rents`
			  (`rentID`, `customerID`,`startdate`, `enddate`,`duration`,`totalrentamount`,`totalquantity`, `totalvat`, `grandtotal`,`transporttype`, `paymenttype`, `customername`, `phone`, `address`,  `cardno`,  `holdername`, `expdate`, `rentstatus`) 
			  VALUES 
			  ('$txtrentID','$CustomerID','$startdate','$enddate','$duration','$dailyRent','$txtTotalQuantity','$txtVAT','$txtGrandTotal','$rdoDeliveryType','$rdoPaymentType','$CustomerName','$CustomerPhone','$CustomerAddress','$txtCardNo','$txtholdername','$expdate','$rentstatus')
			  ";
	$result=mysqli_query($connection,$Insert1);

	$size=count($_SESSION['cart_function']);

	for ($i=0; $i<$size; $i++)
	{ 
		$equipmentID=$_SESSION['cart_function'][$i]['equipmentID'];
		$Price=$_SESSION['cart_function'][$i]['price'];
		$rentquantity=$_SESSION['cart_function'][$i]['rentquantity'];

		$Insert2="INSERT INTO `rentdetails`
				  (`rentID`, `equipmentID`, `price`, `quantity`) 
				  VALUES
				  ('$txtrentID','$equipmentID','$Price','$rentquantity')
				  ";
		$result=mysqli_query($connection,$Insert2);
	}

	if($result) //true
	{
		unset($_SESSION['cart_function']);
		echo "<script>window.alert('Thank you for choosing Dora! The details will be connected through the email and phone.')</script>";
		echo "<script>window.location='furniture.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Checkout " . mysql_error($connection) .  "</p>";
	}
}


?>