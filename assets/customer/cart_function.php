<?php  
function AddEquipment($equipmentID, $rentquantity)
{
    include('dbconnect.php');
    session_start(); // Make sure the session is started

    // Fetch equipment details
    $query = "SELECT * FROM equipment WHERE equipmentID='$equipmentID'";
    $ret = mysqli_query($connection, $query);
    $arr = mysqli_fetch_array($ret);

    if (!$arr) {
        echo "<p>Product not found.</p>";
        exit();
    }

    if ($rentquantity < 1) {
        echo "<script>window.alert('Please check product rent Quantity!')</script>";
        return;
    }

    // Debugging: Check what you fetched from the database
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    // Check if cart session exists
    if (isset($_SESSION['cart_function'])) {
        $Index = IndexOf($equipmentID);

        if ($Index == -1) {
            $size = count($_SESSION['cart_function']);
            $_SESSION['cart_function'][$size] = [
                'equipmentID' => $equipmentID,
                'rentquantity' => $rentquantity,
                'equipmentname' => $arr['equipmentname'],
                'price' => $arr['price'],
                'dailyRent' => $arr['rentprice'],
                'image1' => $arr['image1']
            ];
        } else {
            $_SESSION['cart_function'][$Index]['rentquantity'] += $rentquantity;
        }
    } else {
        // Create new cart session
        $_SESSION['cart_function'] = [];
        $_SESSION['cart_function'][0] = [
            'equipmentID' => $equipmentID,
            'rentquantity' => $rentquantity,
            'equipmentname' => $arr['equipmentname'],
            'price' => $arr['price'],
            'dailyRent' => $arr['rentprice'],
            'image1' => $arr['image1']
        ];
    }

    // Debugging: Check session after adding item
    echo "<pre>";
    print_r($_SESSION['cart_function']);
    echo "</pre>";

    // Redirect or notify user
    echo "<script>window.location='cart.php'</script>";

    $_SESSION['cart_message'] = "Equipment with ID $equipmentID has been added to your cart.";
}

function RemoveProduct($equipmentID)
{
	$Index=IndexOf($equipmentID);

	unset($_SESSION['cart_function'][$Index]);
	$_SESSION['cart_function']=array_values($_SESSION['cart_function']);

	echo "<script>window.location='cart.php'</script>";
}

function ClearAll()
{
	unset($_SESSION['cart_function']);
	echo "<script>window.location='cart.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	if(!isset($_SESSION['cart_function'])) 
	{
		$TotalAmount=0;
	}
	else
	{
		$size=count($_SESSION['cart_function']);

		for ($i=0; $i < $size; $i++) 
		{ 
			$RentPrice=$_SESSION['cart_function'][$i]['price'];
			$RentQuantity=$_SESSION['cart_function'][$i]['rentquantity'];

			$TotalAmount+=($RentPrice * $RentQuantity);
		}
		return $TotalAmount;
	}
}



function CalculateQuantity()
{
	$TotalQuantity=0;

	if(!isset($_SESSION['cart_function'])) 
	{
		$TotalQuantity=0;
	}
	else
	{
		$size=count($_SESSION['cart_function']);

		for ($i=0; $i < $size; $i++) 
		{ 
			$RentQuantity=$_SESSION['cart_function'][$i]['rentquantity'];

			$TotalQuantity+=$RentQuantity;
		}
		return $TotalQuantity;
	}
}

function IndexOf($equipmentID)
{
	if(!isset($_SESSION['cart_function'])) 
	{
		return -1;
	}

	$size=count($_SESSION['cart_function']);

	if($size < 1) 
	{
		return -1;
	}
	else
	{
		for ($i=0; $i < $size; $i++) 
		{ 
			if($equipmentID == $_SESSION['cart_function'][$i]['equipmentID'])
			{
				return $i;
			}
		}
		return -1;
	}
}

function UpdateQuantity($equID, $newQuantity) 
{
    for($i = 0; $i < count($_SESSION['cart_function']); $i++) {
        if($_SESSION['cart_function'][$i]['equipmentID'] == $equID) {
            $_SESSION['cart_function'][$i]['rentquantity'] = $newQuantity;
            break;
        }
    }
}

function getEquipmentRentPrice($equipmentID) 
{
    include('dbconnect.php');

    $query = "SELECT rentprice FROM equipment WHERE equipmentID = '$equipmentID'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($connection);
        return null;
    }

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['rentprice'];
    } else {
        // No matching equipment found
        return null;
    }
}

?>

