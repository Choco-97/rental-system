<?php  
session_start();
include('dbconnect.php');
include('AutoID_Functions.php');
include('cart_function.php');


if(isset($_POST['btncheck'])) 
{

    $txtrentID = $_POST['txtrentID'];
    $CustomerID = $_SESSION['customerID'];

    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $rdoPaymentType = $_POST['rdopayment'];
    $rdoDeliveryType = $_POST['rdodelivery'];
    
    // Delivery Details
    if($rdoDeliveryType == "Same") 
    {
        $CustomerName = $_SESSION['cusuname'];
        $CustomerPhone = $_SESSION['cusphoneno'];
        $CustomerAddress = $_SESSION['cusaddress'];
    }
    else
    {
        $CustomerName = $_POST['txtcusname'];
        $CustomerPhone = $_POST['txtcusphone'];
        $CustomerAddress = $_POST['txtotheraddress'];
    }

    // Payment Details
    if($rdoPaymentType == "CARD") 
    {
        $txtCardNo = $_POST['txtcardno'];
        $txtholdername = $_POST['txtcardholder'];
        $expdate = $_POST['expdate'];
    }
    else
    {
        $txtCardNo = "N/A";
        $txtholdername = "N/A";
        $expdate = "N/A";
    }

    // Additional form data
    $dailyRent = $_POST['dailyrent'];
    $duration = $_POST['duration'];
    $totalRent = $_POST['totalRent'];
    $txtTotalAmount = $_POST['txtTotalAmount'];
    $txtTotalQuantity = $_POST['txtTotalQuantity'];
    $txtVAT = $_POST['txtVAT'];
    $txtGrandTotal = $_POST['txtGrandTotal'];
    $rentstatus = "Pending";

    // Insert into rents table
    $Insert1 = "INSERT INTO `rents`
              (`rentID`, `customerID`,`startdate`, `enddate`,`duration`,`totalrentamount`,`totalquantity`, `totalvat`, `grandtotal`,`transporttype`, `paymenttype`, `customername`, `phone`, `address`,  `cardno`,  `holdername`, `expdate`, `rentstatus`) 
              VALUES 
              ('$txtrentID','$CustomerID','$startdate','$enddate','$duration','$dailyRent','$txtTotalQuantity','$txtVAT','$txtGrandTotal','$rdoDeliveryType','$rdoPaymentType','$CustomerName','$CustomerPhone','$CustomerAddress','$txtCardNo','$txtholdername','$expdate','$rentstatus')
              ";

    // Check if rent insertion was successful
    $result1 = mysqli_query($connection, $Insert1);
    if(!$result1) {
        echo "<p>Error inserting into rents table: " . mysqli_error($connection) . "</p>";
        exit();  // Exit to prevent further execution
    }

    $size = count($_SESSION['cart_function']);
    for ($i = 0; $i < $size; $i++)
    { 
        $equipmentID = $_SESSION['cart_function'][$i]['equipmentID'];
        $Price = $_SESSION['cart_function'][$i]['price'];
        $rentquantity = $_SESSION['cart_function'][$i]['rentquantity'];

        // Insert into rentdetails table
        $Insert2 = "INSERT INTO `rentdetails`
                  (`rentID`, `equipmentID`, `price`, `quantity`) 
                  VALUES
                  ('$txtrentID','$equipmentID','$Price','$rentquantity')
                  ";

        $result2 = mysqli_query($connection, $Insert2);
        if(!$result2) {
            echo "<p>Error inserting into rentdetails table: " . mysqli_error($connection) . "</p>";
            exit();  // Exit to prevent further execution
        }
    }

    // If everything is successful
    if($result1 && $result2)
    {
        unset($_SESSION['cart_function']);  // Clear the cart
        echo "<script>window.alert('The renting process is successful. Details will be sent via email and phone.')</script>";
        echo "<script>window.location='furniture.php'</script>";  // Redirect to another page
    }
    else
    {
        echo "<p>Something went wrong during the checkout process.</p>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check Out</title>
	 <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="bootstrap.css?<?php echo time();?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />
	<script type="text/javascript">
		function ShowOtherAddress()
		{
			document.getElementById('sameaddress').style.display='none';
			document.getElementById('otheraddress').style.display='block';
		}
		function ShowSameAddress()
		{
			document.getElementById('sameaddress').style.display='block';
			document.getElementById('otheraddress').style.display='none';
		}
		function COD() 
		{
        document.getElementById('cardDetails').style.display = 'none';
        document.getElementById('KPay').style.display = 'none';
        }
	    function CARD() 
	    {
	        document.getElementById('cardDetails').style.display = 'block';
	        document.getElementById('KPay').style.display = 'none';
	    }
		function calculateDurationAndRent() 
		{
	        calculateDuration();
	        calculateTotalRent();
        }
    	function calculateDuration() 
    	{
	        const startDateInput = document.getElementById('startDate');
	        const endDateInput = document.getElementById('endDate');
	        const durationInput = document.getElementById('durationrent');

	        const startDate = new Date(startDateInput.value);
	        const endDate = new Date(endDateInput.value);

	        const durationInMilliseconds = endDate - startDate;
	        const durationInDays = Math.ceil(durationInMilliseconds / (1000 * 60 * 60 * 24));

	        durationInput.value = durationInDays > 0 ? durationInDays : 0;
   		 }
		 function calculateTotalRent() 
		 {
		    const dailyRent = parseFloat(document.getElementById('dailyRent').value);
		    const duration = parseInt(document.getElementById('durationrent').value) || 0; // Default to 0 if empty
		    const vatRate = 0.05; // 5% VAT

		    let totalRent = 0;
		    let grandTotal = 0;

		    if (!isNaN(dailyRent) && duration > 0) {
		        totalRent = dailyRent * duration;
		        document.getElementById('totalrent').value = totalRent.toFixed(2);

		        const totalAmountFromPHP = <?php echo CalculateTotalAmount(); ?>; // Get the total amount from PHP
		        const vat = totalAmountFromPHP * vatRate; // Calculate VAT on the total amount
		        grandTotal = totalRent + totalAmountFromPHP + vat; // Calculate grand total

		        document.getElementById('grandTotal').value = grandTotal.toFixed(2);
		    } else {
		        document.getElementById('totalrent').value = '0.00';
		        document.getElementById('grandTotal').value = '0.00';
		    }
		}
	   	function nextStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(step => {
        step.style.display = 'none';
    });

    // Show the next step
    const targetStep = document.getElementById(`step${stepNumber}`);
    if (targetStep) {
        targetStep.style.display = 'block'; // Ensure it's visible
    }

    // Update the stepper progress
    updateStepIndicator(stepNumber);
}
		function previousStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(step => {
        step.style.display = 'none';
    });

    // Show the previous step
    const targetStep = document.getElementById(`step${stepNumber}`);
    if (targetStep) {
        targetStep.style.display = 'block';
    }

    // Update the stepper progress
    updateStepIndicator(stepNumber);
}

		function updateStepIndicator(stepNumber) {
    // Reset all steps to default state
    document.querySelectorAll('.step').forEach((step, index) => {
        step.classList.remove('active', 'completed');

        // Mark the completed steps
        if (index < stepNumber - 1) {
            step.classList.add('completed');
        }
    });

    // Mark the current step as active
    const activeStep = document.getElementById(`stepIndicator${stepNumber}`);
    if (activeStep) {
        activeStep.classList.add('active');
    }
}
	</script>

    <style type="text/css">
        body{
            background-color: palegoldenrod;
        }
        
    </style>

</head>
<body>
<div class="checkout-container">
	 <!-- Step Bar -->
    <div class="stepper">
        <div class="step active" id="stepIndicator1">
            <div class="circle">1</div>
            <div class="label">Billing Address</div>
            <div class="line active"></div>
        </div>
        <div class="step" id="stepIndicator2">
            <div class="circle">2</div>
            <div class="label">Rent Info</div>
            <div class="line"></div>
        </div>
        <div class="step" id="stepIndicator3">
            <div class="circle">3</div>
            <div class="label">Transportation</div>
        </div>
    </div>
   <form id="checkoutForm" action="checkout.php" method="post" class="checkout-form">
    <h2 class="form-title">Please complete these steps to finalize the rental procedure.</h2>

    <!-- Step 1: Customer Info and Billing address Section -->
    <div class="form-step active" id="step1">
        <h3 class="section-title">Billing Address Information:</h3>

        <!-- Customer info -->
        <div class="form-group">
            <label for="customerInfo" class="form-label">Customer Info:</label>
            <input type="text" id="customerInfo" name="txtcusinfo" value="<?php echo $_SESSION['cusuname'] ?>" class="form-input" readonly />
        </div>

        

			<!-- Payment info -->
			<div class="form-group payment-options">
			    <input type="radio" id="cod" name="rdopayment" value="COD" checked onclick="COD()" />
			    <label for="cod">Cash on Delivery</label>

			    <input type="radio" id="cardRadio" name="rdopayment" value="CARD" onclick="CARD()" />
			    <label for="cardRadio">Credit Card</label>
			</div>

			<div id="cardDetails" class="address-input" style="display: none;">
			    <label for="cardNumber">Card Number</label>
			    <input type="text" id="cardNumber" name="txtcardno" placeholder="123456789" required />

			    <label for="cardholder">Cardholder Name</label>
			    <input type="text" id="cardholder" name="txtcardholder" placeholder="xxxxxxxxxxx" required />

			    <label for="expDate">Expiration Date</label>
			    <input type="date" id="expDate" name="expdate" class="form-input" value="<?php echo date('Y-m-d'); ?>" required/>
			</div>
        

        <button type="button" class="buttoncheck" onclick="nextStep(2)">Continue </button>
    </div>

<!-- Step 2: Equipment Info Section -->
    
<div class="form-step" id="step2" style="display: none;">
    <h3 class="section-title">Equipment Information:</h3>

    <div class="form-container">
        <!-- Rent Information and Calculation -->
        <div class="rent-container">
            <div class="rent-info">
                <div class="form-group">
                    <label for="rentID" class="form-label">RentID:</label>
                    <input type="text" id="rentID" name="txtrentID" value="<?php echo 
					AutoID('rents','rentID','RENT-',5) ?>" class="form-input" readonly />
                </div>
                <div class="form-group">
                    <label for="startDate" class="form-label">Start Date:</label>
                    <input type="date" id="startDate" name="startdate" class="form-input" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" onchange="calculateDurationAndRent()" />
                </div>
                <div class="form-group">
                    <label for="endDate" class="form-label">End Date:</label>
                    <input type="date" id="endDate" name="enddate" class="form-input" value="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" min="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" onchange="calculateDurationAndRent()" />
                </div>
                <?php 
		        $equipmentID = $_SESSION['cart_function'][0]['equipmentID'];
		        $dailyRentPrice = getEquipmentRentPrice($equipmentID);
		        ?>
		        <div class="form-group">
		            <label for="dailyRent" class="form-label">Daily Rent Price (USD):</label>
		            <input type="number" id="dailyRent" name="dailyrent" class="form-input" value="<?php echo getEquipmentRentPrice($equipmentID); ?>" readonly />
		        </div>

                <div class="form-group">
                    <label for="durationrent" class="form-label">Duration (days):</label>
                    <input type="text" id="durationrent" name="duration" class="form-input" readonly />
                </div>
                <div class="form-group">
                    <label for="totalQuantity" class="form-label">Total Quantity:</label>
                    <input type="text" id="totalQuantity" name="txtTotalQuantity" class="form-input" value="<?php echo CalculateQuantity(); ?>" readonly /> pcs
                </div>
            </div>

            <div class="calculate rent">
                <div class="form-group">
                    <label for="totalrent" class="form-label">Total Rent Price (USD):</label>
                     <input type="text" id="totalrent" name="totalRent" class="form-input" readonly />
                </div>
                <div class="form-group">
                    <label for="totalamount" class="form-label">Total Amount of rented Equipment:</label>
                    <input type="text" id="totalamount" name="txtTotalAmount" class="form-input" value="<?php echo CalculateTotalAmount(); ?>" readonly /> USD
                </div>
                <div class="form-group">
                    <label for="vat" class="form-label">Total VAT (5%):</label>
                    <input type="text" id="vat" name="txtVAT" class="form-input" value="<?php echo (CalculateTotalAmount() * 0.05); ?>" readonly /> USD
                </div>
                <div class="form-group">
                    <label for="grandTotal" class="form-label">Grand Total:</label>
                    <input type="text" id="grandTotal" name="txtGrandTotal" class="form-input"  readonly /> USD
                </div>
            </div>
        </div>

        <!-- Equipment Information -->
        <div class="cart-table-wrapper">
           
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Equipment Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $size = count($_SESSION['cart_function']);
                        for ($i = 0; $i < $size; $i++):
                            $equID = $_SESSION['cart_function'][$i]['equipmentID'];
                            $image1 = $_SESSION['cart_function'][$i]['image1'];
                        ?>
                            <tr>
                                <td><img src='<?php echo $image1; ?>' class='cart-image' alt="Equipment Image"/></td>
                                <td><?php echo $equID; ?></td>
                                <td><?php echo $_SESSION['cart_function'][$i]['equipmentname']; ?></td>
                                <td><?php echo $_SESSION['cart_function'][$i]['price']; ?> USD</td>
                                <td>
                                    <input type="hidden" name="equipmentID[]" value="<?php echo $equID; ?>">
                                    <input type="number" class="cart-quantity-input" name="rentquantity[]" value="<?php echo $_SESSION['cart_function'][$i]['rentquantity']; ?>" min="1">
                                </td>
                                <td><?php echo $_SESSION['cart_function'][$i]['price'] * $_SESSION['cart_function'][$i]['rentquantity']; ?> USD</td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
           
        </div>
    </div>
    
    <button type="button" class="buttoncheck" onclick="nextStep(3)">Continue</button>
</div>


    <!-- Step 3: Transportation Info and Payment Info Section -->
    <div class="form-step" id="step3" style="display:none;">
        <h3 class="section-title">Transportation and Payment:</h3>

        <!-- Delivery info -->
			<div class="form-group delivery-options">
			    <input type="radio" id="sameAddress" name="rdodelivery" value="Same" checked onclick="ShowSameAddress()" />
			    <label for="sameAddress">Same Address</label>

			    <input type="radio" id="otherAddress" name="rdodelivery" value="Other" onclick="ShowOtherAddress()" />
			    <label for="otherAddress">Other Address</label>
			</div>

			<div id="sameaddress" class="address-input">
			    <textarea name="txtsameaddress" class="textarea"><?php echo $_SESSION['cusaddress']; ?></textarea>
			</div>

			<div id="otheraddress" class="address-input" style="display: none;">
			    <label for="cusname">Name</label>
			    <input type="text" id="cusname" name="txtcusname" placeholder="Enter Your Name.">

			    <label for="cusphone">Phone number</label>
			    <input type="text" id="cusphone" name="txtcusphone" placeholder="Enter Your Phone number.">

			    <label for="cusaddress">Address</label>
			    <textarea id="cusaddress" name="txtotheraddress" class="textarea"></textarea>
			</div>
		    
        <!-- Checkout button -->
       <button type="submit" id="checkoutBtn" name="btncheck" style="display: block;">Checkout</button>
    </div>

</form>
</div>


</body>
</html>




