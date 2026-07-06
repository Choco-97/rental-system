<?php  
session_start();
include('dbconnect.php'); 
include('AutoID_Functions.php'); 
include('cart_function.php');

// Check if a rent ID is provided to fetch the corresponding rent details
if (isset($_GET['rentID'])) {
    $rentID = $_GET['rentID'];
    // Fetch rent details from the database
    $rentQuery = "SELECT * FROM rents WHERE rentID = '$rentID'";
    $rentResult = mysqli_query($connection, $rentQuery);
    $rentDetails = mysqli_fetch_assoc($rentResult);

    // Fetch corresponding rent details from the rentdetails table
    $detailsQuery = "SELECT * FROM rentdetails WHERE rentID = '$rentID'";
    $detailsResult = mysqli_query($connection, $detailsQuery);
    $rentItems = [];
    while ($row = mysqli_fetch_assoc($detailsResult)) {
        $rentItems[] = $row;
    }
} 
else 
{
    header("Location: rent_history.php");
    exit();
}

if (isset($_POST['btnReturn'])) 
{
    $updateQuery = "UPDATE rents SET rentstatus = 'Returned' WHERE rentID = '$rentID'";
    mysqli_query($connection, $updateQuery);
    // You can also process additional logic here, e.g., updating inventory
    // Redirect or show success message
    echo "<script>alert('Return processed successfully.'); window.location='rent_history.php';</script>";
}

function getEquipmentName($equipmentID)
{
    global $connection; // Use the global database connection variable
    // Query to get the equipment name based on equipmentID
    $query = "SELECT equipmentname FROM equipment WHERE equipmentID = '$equipmentID'";
    $result = mysqli_query($connection, $query);
    // Fetch and return the equipment name
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['equipmentname'];
    } else {
        return 'Unknown Equipment'; // Return a default value if not found
    }
}

// Fetch total quantity and grand total from the rents table
$totalQuantity = $rentDetails['totalquantity']; // Assuming totalquantity is in the rents table
$grandTotal = $rentDetails['grandtotal']; // Assuming grandtotal is in the rents table

// Initialize late fees
$oneDayLateFee = 100; // Define the late fee for one day
$totalLateFees = 0; // Initialize total late fees to zero

// Calculate late fees if return date is provided
if (isset($_POST['returndate'])) {
    $endDate = new DateTime($rentDetails['enddate']);
    $returnDate = new DateTime($_POST['returndate']);
    
    // Calculate the difference in days
    $dateDiff = $returnDate->diff($endDate)->days;

    // Check if the return is late
    if ($dateDiff > 0) {
        // Calculate total late fees
        $totalLateFees = min($dateDiff, 2) * $oneDayLateFee; // Cap at 2 days of late fees
    }
}

$pickupFee = 100;

if(isset($_POST['btnReturn'])) 
{
    
    $txtreturnID = $_POST['txtreturnID'];
    $rentID = $_POST['rentID'];
    $CustomerID = $_SESSION['customerID'];
    $returndate = $_POST['returndate'];
    $enddate = $_POST['enddate'];
    $latefees = $_POST['totalLateFees'];
    $equcondition = $_POST['equipmentCondition'];
    $rdoreturntype = $_POST['rdoreturn'];
    


    // Equipment Condition
    if($equcondition == "damaged") 
    {
        $damagecondition = $_POST['damageCondition']; 
    } 

    if($equcondition == "good" || $equconditione == "missing") 
    {
        $damagecondition = "N/A"; 
    }

    // Pickup Location
    if($rdoreturntype == "Cus") 
    {
    $CustomerName = $_SESSION['cusuname'];
    $CustomerAddress = $_SESSION['cusaddress'];
    $CustomerPhone = $_SESSION['cusphoneno'];
    $otherlocation = "N/A"; 
    }
    elseif($rdoreturntype == "Com") 
    {
    $otherlocation = $_POST['txtcomlocation'];
    $CustomerName = $_SESSION['cusuname'];
    $CustomerAddress = "N/A";
    $CustomerPhone = $_SESSION['cusphoneno'];
    }


    $txtTotalQuantity = $_POST['totalQuantity'];
    $txtGrandTotal = $_POST['grandTotal'];
    $returnstatus = "Pending";

    // Insert into rents table
    $Insert1 = "INSERT INTO `returns`
              (`returnID`, `customerID`,`returndate`, `cusname`,`address`,`phonenumber`,`totallatefees`, `equcondition`, `damage`,`pickuptype`, `otherpickup`, `enddate`, `totalquantity`, `grandtotal`,  `rentID`,  `status`) 
              VALUES 
              ('$txtreturnID','$CustomerID','$returndate','$CustomerName','$CustomerAddress','$CustomerPhone','$latefees','$equcondition','$damagecondition','$rdoreturntype','$otherlocation ','$enddate','$txtTotalQuantity','$txtGrandTotal','$rentID','$returnstatus')
              ";

    // Check if rent insertion was successful
    $result1 = mysqli_query($connection, $Insert1);
    if(!$result1) {
         echo "<pre>";
        print_r($_SESSION['cart_function']);
        echo "</pre>";
    }

if (!empty($_POST['returnQuantity'])) {
    if (empty($txtreturnID)) {
        echo "<p>Return ID is not set.</p>";
        exit(); // Stop further execution
    }

    $stmt = $connection->prepare("INSERT INTO `returndetails` (`equipmentID`, `returnID`, `returnquantity`) VALUES (?, ?, ?)");
    
    foreach ($_POST['returnQuantity'] as $equipmentID => $returnquantity) {
        if ($returnquantity > 0) {
            // Debugging output
            echo "Inserting: Equipment ID: $equipmentID, Return ID: $txtreturnID, Return Quantity: $returnquantity<br>";
            
            $stmt->bind_param("isi", $equipmentID, $txtreturnID, $returnquantity);
            if (!$stmt->execute()) {
                echo "<p>Error inserting into returndetails table: " . $stmt->error . "</p>";
                exit();
            }
        }
    }
    $stmt->close(); // Close the statement after use
} else {
    echo "<p>No return quantities found.</p>";
}

    // If everything is successful
    if($result1 && $result2)
    {
        unset($_SESSION['cart_function']);  // Clear the cart
        echo "<script>window.alert('The return form is successful submitted. Details will be sent via email and phone.')</script>";
        echo "<script>window.location='rent_history.php'</script>";  // Redirect to another page
    }
    else
    {
        echo "<p>Something went wrong during the return process.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Return Equipment</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link href="style.css" rel="stylesheet" />
<style>
    /* Inline CSS for styling the form */
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .return-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 1200px;
        margin: auto;
    }

    .form-title {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .equipment-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        table-layout: fixed; /* Ensure even column width distribution */
    }

    .equipment-table th, .equipment-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        word-wrap: break-word; /* Allow text to wrap within cells */
    }

    .equipment-table th {
        background-color: #f2f2f2;
        color: #333;
    }

    /* Adjust column width for a better fit */
    .equipment-table th:nth-child(1),
    .equipment-table td:nth-child(1) {
        width: 15%; /* Equipment ID */
    }

    .equipment-table th:nth-child(2),
    .equipment-table td:nth-child(2) {
        width: 40%; /* Name */
    }

    .equipment-table th:nth-child(3),
    .equipment-table td:nth-child(3) {
        width: 20%; /* Price */
    }

    .equipment-table th:nth-child(4),
    .equipment-table td:nth-child(4) {
        width: 15%; /* Quantity */
    }
    td[data-label="Quantity"] input[type="number"] {
  width: 80px;          /* Adjust the width as needed */
  padding: 5px;         /* Add some padding for better spacing */
  border-radius: 5px;   /* Rounded corners */
  border: 1px solid #ccc; /* Light border */
  background-color: #f9f9f9; /* Background color */
  text-align: center;   /* Center the number inside the box */
  font-size: 14px;      /* Adjust the font size */
  color: #333;          /* Text color */
}

td[data-label="Quantity"] input[type="number"]:read-only {
  background-color: #e9ecef; /* Different background for read-only state */
  cursor: not-allowed;       /* Show a "not-allowed" cursor for read-only */
}
    .return-button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .return-button:hover {
        background-color: #218838;
    }
    @media (max-width: 600px) {
    .equipment-table {
        display: block;
        overflow-x: auto; /* Allow horizontal scroll for wider tables */
    }

    /* Hide table headers on small screens */
    .equipment-table thead {
        display: none;
    }

    /* Each row becomes a block for mobile */
    .equipment-table tr {
        display: block;
        margin-bottom: 15px;
        border-bottom: 2px solid #ddd;
    }

    /* Flexbox for better layout and wrapping */
    .equipment-table td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border: none;
        background-color: #f9f9f9;
    }

    /* Add labels to each cell in the row */
    .equipment-table td:before {
        content: attr(data-label);
        font-weight: bold;
        color: #555;
        padding-right: 10px;
        flex-basis: 40%; /* Makes sure labels have space */
        text-align: left;
    }

    /* Remove padding and adjust layout for smaller screens */
    .equipment-table td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        background-color: white;
        border: none;
    }

    /* Change button size for better touch interaction */
    .return-button {
        width: 100%;
        padding: 15px;
    }
}
.form-container {
    display: flex;
    justify-content: space-between; /* Aligns items horizontally */
    margin-bottom: 20px; /* Spacing below the form container */
}

.form-column {
    flex: 1; /* Makes each column take equal space */
    margin-right: 20px; /* Adds space between the columns */
}

.form-column:last-child {
    margin-right: 0; /* Removes margin for the last column */
}
.form-input 
{
    background-color:palegoldenrod;
}

/* Media query for small screens */
@media (max-width: 768px) {
    .form-container {
        flex-direction: column; /* Stacks columns vertically on small screens */
    }
    .form-column {
        margin-right: 0; /* Removes right margin on small screens */
        margin-bottom: 20px; /* Adds space below each column */
    }
}
</style>

<script type="text/javascript">
function calculateLateFees() {
    const endDateInput = document.getElementById('endDate');
    const returnDateInput = document.getElementById('returnDate');
    const oneDayLateFee = parseFloat(document.getElementById('oneDayLateFee').value);
    const totalLateFeesInput = document.getElementById('totalLateFees');

    const endDate = new Date(endDateInput.value);
    const returnDate = new Date(returnDateInput.value);

    // Calculate the difference in days
    const dateDiff = (returnDate - endDate) / (1000 * 60 * 60 * 24);

    let totalLateFees = 0;

    // Check if the return is late
    if (dateDiff > 0) {
        totalLateFees = dateDiff * oneDayLateFee; // Calculate total late fees without capping
    }

    // Update the total late fees input
    totalLateFeesInput.value = totalLateFees.toFixed(2);
}

// Add event listener for return date change
document.getElementById('returnDate').addEventListener('change', calculateLateFees);

        function OtherLocation()
        {
            document.getElementById('cusaddress').style.display='none';
            document.getElementById('otheraddress').style.display='block';
        }
        function CustomerAddress()
        {
            document.getElementById('cusaddress').style.display='block';
            document.getElementById('otheraddress').style.display='none';
        }

</script>
</head>
<body>
<div class="return-container">

<form id="returnForm" action="return.php?rentID=<?php echo $rentID; ?>" method="post" class="return-form">
    <h2 class="form-title">Return Equipment</h2>

    <div class="form-container">
        <!-- Return Info Section -->
        <div class="form-column">
            <h3>Return Information:</h3>
            <div class="form-group">
                <label for="customerName" class="form-label">Customer Name:</label>
                <input type="text" id="customerName" name="customerName" value="<?php echo $rentDetails['customername']; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="returnID" class="form-label">Return ID:</label>
                <input type="text" id="returnID" name="txtreturnID" value="<?php echo 
                    AutoID('returns','returnID','RETURN-',5) ?>"class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="returnDate" class="form-label">Return Date:</label>
                <input type="date" id="returnDate" name="returndate" class="form-input" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" />
            </div>
            <div class="form-group">
                <label for="oneDayLateFee" class="form-label">One Day Late Fee:</label>
                <input type="text" id="oneDayLateFee" name="oneDayLateFee" value="<?php echo $oneDayLateFee; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="totalLateFees" class="form-label">Total Late Fees:</label>
                <input type="text" id="totalLateFees" name="totalLateFees" value="<?php echo $totalLateFees; ?>" class="form-input" readonly />
            </div>

            <div class="form-group">
                <label for="equipmentCondition" class="form-label">Equipment Condition:</label>
                <select id="equipmentCondition" name="equipmentCondition" class="form-input" onchange="toggleDamageInput(); showMissingPartsNotification();" required>
                    <option value="">Select Equipment Condition.</option>
                    <option value="good">Good</option>
                    <option value="damaged">Damaged</option>
                    <option value="missing">Missing Parts</option>
                </select>
            </div>
            <div class="form-group" id="damageConditionDiv" style="display: none;">
                <label for="damageCondition" class="form-label">How bad is the damage?</label>
                <input type="text" id="damageCondition" name="damageCondition" class="form-input" placeholder="Describe the damage condition"/>
            </div>
            <div class="form-group" id="missingPartsNotification" style="display: none;">
                <p style="color: red;">Please note: Upon the rental equipment's pickup, the amount for the lost equipment must be paid.</p>
            </div>

            <label for="returnplace" class="form-label">Pickup Location:</label>
            <div class="form-group" id="returnplace">
                <input type="radio" id="cusAddress" name="rdoreturn" value="Cus" checked onclick="CustomerAddress()" />
                <label for="cusAddress">Same Address</label>

                <input type="radio" id="comAddress" name="rdoreturn" value="Com" onclick="OtherLocation()" required />
                <label for="otherAddress">Other Location</label>
            </div>

            <div id="cusaddress" class="address-input">
                <textarea name="txtcusaddress" class="textarea"><?php echo $_SESSION['cusaddress']; ?></textarea> 
            </div>

            <div id="otheraddress" class="address-input" style="display: none;">
                <label for="otherlocation">Other Location:</label>
                <input type="text" id="otherlocation" name="txtcomlocation" placeholder="Enter the other pickup location.">
            </div>
        </div>

        <!-- Rent Info Section -->
        <div class="form-column">
            <h3>Rent Information:</h3>
            <div class="form-group">
                <label for="rentID" class="form-label">Rent ID:</label>
                <input type="text" id="rentID" name="rentID" value="<?php echo $rentDetails['rentID']; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="startDate" class="form-label">Start Date:</label>
                <input type="date" id="startDate" name="startdate" value="<?php echo $rentDetails['startdate']; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="endDate" class="form-label">End Date:</label>
                <input type="date" id="endDate" name="enddate" value="<?php echo $rentDetails['enddate']; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="totalQuantity" class="form-label">Total Quantity:</label>
                <input type="text" id="totalQuantity" name="totalQuantity" value="<?php echo $totalQuantity; ?>" class="form-input" readonly />
            </div>
            <div class="form-group">
                <label for="grandTotal" class="form-label">Grand Total:</label>
                <input type="text" id="grandTotal" name="grandTotal" value="<?php echo $grandTotal; ?>" class="form-input" readonly />
            </div>
        </div>
    </div>

    <div>
        <p style="color: red;">"Late fees or additional charges will need to be paid when the transport staff arrives to pick up the equipment if it is returned past the agreed-upon time."</p>
    </div>

    <h3>Rented Equipment Details:</h3>
   <table class="equipment-table">
        <thead>
            <tr>
                <th>Equipment ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentItems as $item): ?>
            <tr>
                <td data-label="Equipment ID"><?php echo $item['equipmentID']; ?></td>
                <td data-label="Name"><?php echo getEquipmentName($item['equipmentID']); ?></td>
                <td data-label="Price"><?php echo $item['price']; ?> USD</td>
                <td data-label="Quantity"><input type="number" name="returnQuantity[<?php echo $item['equipmentID']; ?>]" 
                       value="<?php echo $item['quantity']; ?>" readonly></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" id="returnBtn" name="btnReturn" class="return-button" onclick="showHelp()">Submit Return</button>
</form>
</div>

<script>
function showHelp() {
    alert("By submitting this form, you are acknowledging the condition of the returned equipment. If it is marked as 'Damaged' or 'Missing Parts', additional charges may apply.");
}
</script>

<script type="text/javascript">
window.onload = function() {
    calculateLateFees();
}

document.getElementById('returnDate').addEventListener('change', calculateLateFees);

function calculateLateFees() {
    const endDateInput = document.getElementById('endDate').value;
    const returnDateInput = document.getElementById('returnDate').value;
    const oneDayLateFee = parseFloat(document.getElementById('oneDayLateFee').value) || 0; // Ensure it's a number
    
    const endDate = new Date(endDateInput);
    const returnDate = new Date(returnDateInput);

    if (returnDate > endDate) {
        const diffTime = Math.abs(returnDate - endDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
        const totalLateFees = diffDays * oneDayLateFee;

        document.getElementById('totalLateFees').value = totalLateFees.toFixed(2);
        updateGrandTotal(totalLateFees);
    } else {
        document.getElementById('totalLateFees').value = "0";
        updateGrandTotal(0);
    }
}


</script>


<script>
    function toggleDamageInput() 
    {
        var condition = document.getElementById("equipmentCondition").value;
        var damageDiv = document.getElementById("damageConditionDiv");

        if (condition === "damaged") {
            damageDiv.style.display = "block"; // Show the damage input
        } else {
            damageDiv.style.display = "none"; // Hide the damage input
        }
    }
function showMissingPartsNotification() {
    var condition = document.getElementById("equipmentCondition").value;
    var notification = document.getElementById("missingPartsNotification");
    if (condition === "missing") {
        notification.style.display = "block";
    } else {
        notification.style.display = "none";
    }
}
</script>


</body>
</html>

