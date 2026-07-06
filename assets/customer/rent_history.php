<?php  
session_start();
include('dbconnect.php');
include('cart_function.php');

if(!isset($_SESSION['customerID'])) 
{
    echo "<script>window.alert('Please login to view your order history.')</script>";
    echo "<script>window.location='Cuslogin.php'</script>";
}
else
{
    $CustomerID = $_SESSION['customerID'];
}

$today = date('Y-m-d');
$startDate = '';
$endDate = '';
$returnStatus = '';

if(isset($_POST['search'])) {
    // Get search input from the form
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $returnStatus = $_POST['returnStatus'];

    // Create base query
    $query = "SELECT r.*, cus.customerID, cus.cusuname, rd.equipmentID, eq.equipmentname, 
              rd.quantity as equipment_quantity, eq.price as equipment_price, rt.returnID 
              FROM rents r
              JOIN customer cus ON r.customerID = cus.customerID
              JOIN rentdetails rd ON r.rentID = rd.rentID
              JOIN equipment eq ON rd.equipmentID = eq.equipmentID
              LEFT JOIN returns rt ON r.rentID = rt.rentID
              WHERE r.customerID = '$CustomerID'";

    // Add filters based on user input
    if (!empty($startDate) && !empty($endDate)) {
        $query .= " AND r.startdate BETWEEN '$startDate' AND '$endDate'";
    }

    if ($returnStatus === 'Returned') {
        $query .= " AND rt.returnID IS NOT NULL";
    } elseif ($returnStatus === 'Not Returned') {
        $query .= " AND rt.returnID IS NULL";
    }

    $result = mysqli_query($connection, $query);
} else {
    // Default query if no search is performed
    $query = "SELECT r.*, cus.customerID, cus.cusuname, rd.equipmentID, eq.equipmentname, 
              rd.quantity as equipment_quantity, eq.price as equipment_price, rt.returnID 
              FROM rents r
              JOIN customer cus ON r.customerID = cus.customerID
              JOIN rentdetails rd ON r.rentID = rd.rentID
              JOIN equipment eq ON rd.equipmentID = eq.equipmentID
              LEFT JOIN returns rt ON r.rentID = rt.rentID
              WHERE r.customerID = '$CustomerID'";

    $result = mysqli_query($connection, $query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rent History</title>
     <style>
/* General body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Style the fieldset and legend */
fieldset {
    border: 2px solid darkgoldenrod;
    padding: 15px;
    background-color: palegoldenrod;
}

legend {
    font-weight: bold;
    color: darkgoldenrod;
    padding: 0 10px;
    font-size: 18px;
}

/* Table container to add horizontal scrolling on smaller screens */
.responsive-table-container {
    overflow-x: auto;
    margin-top: 10px;
}

/* Styling for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    background-color: palegoldenrod;
    border: 1px solid #ddd;
}

table th, table td {
    padding: 12px;
    border: 1px solid darkgoldenrod;
}

th {
    background-color: darkgoldenrod;
    color: palegoldenrod;
    text-transform: uppercase;
    font-size: 14px;
}

tr:nth-child(even) {
    background-color: palegoldenrod;
}

/* Links styling for action column */
a {
    text-decoration: none;
    color: darkgoldenrod;
    font-weight: bold;
}

/* Responsive styling for mobile screens */
@media (max-width: 700px) {
    thead {
        display: none;
    }
    tbody, tr {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        border-bottom: 2px solid darkgoldenrod !important;
        background-color: darkgoldenrod !important;
    }
    td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        white-space: normal;
        background-color: #f9f9f9 !important;
        border: none;
        border-bottom: 1px solid #ddd !important;
        overflow: hidden;
    }
    td::before {
        content: attr(data-label);
        font-weight: bold;
        text-align: left;
        padding-right: 10px;
        color: darkgoldenrod !important;
        flex-basis: 40%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    tbody tr:last-of-type {
        border-bottom: 2px solid #ddd !important;
    }
    tr {
        overflow: hidden;
        max-width: 100%;
    }
}

    </style>
</head>
<body>
<!-- Search Form -->
<form method="post">
    <fieldset>
        <legend>Filter Rent History:</legend>

        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate" value="<?php echo $startDate; ?>">

        <label for="endDate">End Date:</label>
        <input type="date" name="endDate" value="<?php echo $endDate; ?>">

        <label for="returnStatus">Return Status:</label>
        <select name="returnStatus">
            <option value="">-- Select Status --</option>
            <option value="Returned" <?php if ($returnStatus == 'Returned') echo 'selected'; ?>>Returned</option>
            <option value="Not Returned" <?php if ($returnStatus == 'Not Returned') echo 'selected'; ?>>Not Returned</option>
        </select>

        <button type="submit" name="search">Search</button>
    </fieldset>
</form>

<form method="post">
    <fieldset>
        <legend>Rent History :</legend>
        <?php
        $previousRentID = '';  // Variable to track the last displayed RentID
        $rowspanTracker = [];  // To track how many rows each RentID should span

        // Step 1: Calculate the number of equipment entries per RentID
        while ($arr = mysqli_fetch_array($result)) {
            $RentID = $arr['rentID'];

            if (!isset($rowspanTracker[$RentID])) {
                $rowspanTracker[$RentID] = 0;
            }
            $rowspanTracker[$RentID]++;
        }

        // Reset the result pointer to fetch data again from the start
        mysqli_data_seek($result, 0);

        // Step 2: Generate the table with rowspan applied correctly
        $count = mysqli_num_rows($result);

        if ($count < 1) {
            echo "<p>No Record Found.</p>";
        } else {
        ?>
            <div class="responsive-table-container">
                <table width="100%" border="1" cellspacing="3px">
                    <thead>
                        <tr>
                            <th>RentID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Total Quantity</th>
                            <th>Grand Total</th>
                            <th>Equipment Name</th>
                            <th>Equipment Quantity</th>
                            <th>Equipment Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $previousRentID = '';  // Reset previous RentID for display
                    while ($arr = mysqli_fetch_array($result)) { 
                        $RentID = $arr['rentID'];
                        echo "<tr>";

                        // Check if it's the first time displaying this RentID
                        if ($RentID != $previousRentID) {
                            // Apply the correct rowspan based on the number of equipment entries for this RentID
                            $rowspan = $rowspanTracker[$RentID];
                            echo "<td rowspan='$rowspan'>$RentID</td>"; // Merge RentID cells
                            echo "<td rowspan='$rowspan'>" . $arr['startdate'] . "</td>";
                            echo "<td rowspan='$rowspan'>" . $arr['enddate'] . "</td>";
                            echo "<td rowspan='$rowspan'>" . $arr['duration'] . "</td>";
                            echo "<td rowspan='$rowspan'>" . $arr['totalquantity'] . "</td>";
                            echo "<td rowspan='$rowspan'>" . $arr['grandtotal'] . "</td>";
                        }

                        // Show equipment details for every row
                        echo "<td>" . $arr['equipmentname'] . "</td>";
                        echo "<td>" . $arr['equipment_quantity'] . "</td>";
                        echo "<td>" . $arr['equipment_price'] . "</td>";

                        // Add action link only for the first row of this RentID
                        if ($RentID != $previousRentID) {
                            if (is_null($arr['returnID'])) {
                                // If no return has been made, show the return link
                                echo "<td rowspan='$rowspan'>
                                    <a href='return.php?rentID=" . $arr['rentID'] . 
                                    "&endDate=" . $arr['enddate'] . 
                                    "&equipmentName=" . urlencode($arr['equipmentname']) . 
                                    "&quantity=" . $arr['equipment_quantity'] . 
                                    "&grandTotal=" . $arr['grandtotal'] . 
                                    "&txtequipmentID=" . $arr['equipmentID'] . 
                                    "&totalQuantity=" . $arr['totalquantity'] . 
                                    "'>Return</a></td>";
                            } else {
                                // If a return has been made, disable the link or show a "Returned" message
                                echo "<td rowspan='$rowspan'>Returned</td>";
                            }
                            $previousRentID = $RentID; 
                        }

                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php    
        }
        ?>
    </fieldset>
</form>

</body>
</html>
