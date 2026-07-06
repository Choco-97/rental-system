
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Digitf</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="bootstrap.css?<?php echo time();?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />
</head>

<body>
   <?php include ("navbar.php") ?>

<!--customer dashboard-->
<?php
        
        include("dbconnect.php");
// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: cuslogin.php');
    exit();
}
?>


    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" id="myDataLink"><i class="fas fa-user"></i> My Data</a></li>
                <li><a href="#" id="rentHistoryLink"><i class="fas fa-history"></i> Rent History</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div id="myData" class="content-section">
                <h3>My Data</h3>
                <p>Name: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                <!-- Add more user-specific data here -->
            </div>

            <div id="rentHistory" class="content-section" style="display:none;">
                <h3>Rent History</h3>
                <!-- PHP to fetch and display rent history -->
                <?php
                // Connect to database and fetch rent history based on user ID
                include 'db_connection.php';
                $userid = $_SESSION['userid']; // Assuming you store user ID in session
                $query = "SELECT * FROM rent WHERE userid = $userid";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<ul>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>Rent ID: " . $row['rent_id'] . " | Date: " . $row['rent_date'] . " | Total: $" . $row['total_amount'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No rent history available.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle section switching -->
    <script>
        document.getElementById("myDataLink").addEventListener("click", function() {
            document.getElementById("myData").style.display = "block";
            document.getElementById("rentHistory").style.display = "none";
        });

        document.getElementById("rentHistoryLink").addEventListener("click", function() {
            document.getElementById("myData").style.display = "none";
            document.getElementById("rentHistory").style.display = "block";
        });
    </script>




 <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          DORA
        </h2>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="../images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                dora@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              At Sparkle Event Equipment Rental, we specialize in providing top-quality equipment to elevate any event.
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="../images/i-1.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="../images/i-2.jpg" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../images/i-3.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../images/i-4.jpg" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../images/i-5.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../images/i-6.jpg" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="../images/fb.png" alt="">
              </a>
              <a href="">
                <img src="../images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="../images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="../images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; 2024 This Website was developed by ACMA Not Commercial Website only Educational Purpose.
      </p>
    </div>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        420: {
          items: 2
        },
        1000: {
          items: 5
        }
      }

    });
  </script>
  <script>
    var nav = $("#navbarSupportedContent");
    var btn = $(".custom_menu-btn");
    btn.click
    btn.click(function (e) {

      e.preventDefault();
      nav.toggleClass("lg_nav-toggle");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    });
  </script>
  <script>
    $('.carousel').on('slid.bs.carousel', function () {
      $(".indicator-2 li").removeClass("active");
      indicators = $(".carousel-indicators li.active").data("slide-to");
      a = $(".indicator-2").find("[data-slide-to='" + indicators + "']").addClass("active");
      console.log(indicators);

    })
  </script>

</body>

</html>




<?php  
session_start();
include('dbconnect.php');
include('cart_function.php');

if(isset($_GET['action'])) 
{
    if($_GET['action'] == 'remove') 
    {
        $equID = $_GET['equipmentID'];
        RemoveProduct($equID);
    } 
    else if($_GET['action'] == 'clearall') 
    {
        ClearAll();
    } 
    /* Uncomment this section if you want to handle quantity updates in the future
    else if ($_GET['action'] == 'update_quantity') 
    {
        if (isset($_POST['equipmentID']) && isset($_POST['rentquantity'])) 
        {
            $equID = $_POST['equipmentID'];
            $newQuantity = $_POST['rentquantity'];

            // Update the quantity for the specific item
            UpdateQuantity($equID, $newQuantity);
        }
    }
    */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
     <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css?<?php echo time();?>" />

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet" />

    <!-- Responsive style -->
    <link href="responsive.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../admin/admin.css?<?php echo time();?>">
</head>
<body>

<form action="cart.php" method="post" class="cart-equ">
    <fieldset class="cart-fieldset">
        <?php if (!isset($_SESSION['cart_function']) || count($_SESSION['cart_function']) == 0): ?>
            <!-- Empty cart section -->
            <div class='cart-empty-wrapper'>
                <img src='../images/cart.webp' class='cart-empty-image' alt="Empty Cart Image" />
                <h1 class='cart-empty-title'>Your cart is empty.</h1>
                <p class='cart-empty-text'>It appears that there is nothing in your cart. Explore the best equipment now.</p>
                <a href='furniture.php' class='cart-continue'>Continue Shopping</a>
            </div>
        <?php else: ?>
            <!-- Non-empty cart section -->
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
                            <th>Action</th>
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
                                <td><?php echo $_SESSION['cart_function'][$i]['rentquantity']; ?></td>
                                <td><?php echo $_SESSION['cart_function'][$i]['price'] * $_SESSION['cart_function'][$i]['rentquantity']; ?> USD</td>
                                <td>
                                    <!-- Remove link -->
                                    <a href='cart.php?action=remove&equipmentID=<?php echo $equID; ?>' class='cart-remove-link'>Remove</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart summary section -->
            <div class="cart-footer">
                <div class="cart-summary-wrapper">
                    <div class="cart-summary-item">
                        <span class="cart-summary-label">Total Quantity:</span>
                        <span class="cart-summary-value">
                            <input type="text" size="5" name="txtTotalQuantity" class="cart-input" value="<?php echo CalculateQuantity(); ?>" readonly /> pcs
                        </span>
                    </div>
                    <div class="cart-summary-item">
                        <span class="cart-summary-label">Total Amount:</span>
                        <span class="cart-summary-value">
                            <input type="text" size="5" name="txtTotalAmount" class="cart-input" value="<?php echo CalculateTotalAmount(); ?>" readonly /> USD 
                        </span>
                    </div>
                    <div class="cart-summary-item">
                        <span class="cart-summary-label">VAT (5%):</span>
                        <span class="cart-summary-value">
                            <input type="text" size="5" name="txtVAT" class="cart-input" value="<?php echo (CalculateTotalAmount() * 0.05); ?>" readonly /> USD
                        </span>
                    </div>
                    <div class="cart-summary-item">
                        <span class="cart-summary-label">Grand Total:</span>
                        <span class="cart-summary-value">
                            <input type="text" size="5" name="txtGrandTotal" class="cart-input" value="<?php echo CalculateTotalAmount() + (CalculateTotalAmount() * 0.05); ?>" readonly /> USD
                        </span>
                    </div>
                </div>
            </div>

            <!-- Cart action buttons -->
            <div class="cart-divider"></div>
            <div class="cart-buttons-container">
                <a href="furniture.php" class="cart-button">Continue Shopping</a>
                <a href="checkout.php" class="cart-button">Make Checkout</a>
            </div>

        <?php endif; ?>
    </fieldset>
</form>

</body>
</html>


<tbody>
                        <?php
                        $size = count($_SESSION['cart_function']);
                        for ($i = 0; $i < $size; $i++)
                        {
                            $equID = $_SESSION['cart_function'][$i]['equipmentID'];
                            $image1 = $_SESSION['cart_function'][$i]['image1'];
                        
                           echo "<tr>"; 
                            echo "<td><img src=' $image1' class='cart-image' /></td>";    
                             echo "<td><?php echo $equID; ?></td>";   
                              echo "<td>" . $_SESSION['cart_function'][$i]['equipmentname']. "</td>";  
                              echo "<td>" . $_SESSION['cart_function'][$i]['price']  . "</td>";  
                              echo "<td>" . $_SESSION['cart_function'][$i]['rentquantity'] . "</td>";  
                             echo "<td>" .  $_SESSION['cart_function'][$i]['price'] * $_SESSION['cart_function'][$i]['rentquantity'] . "</td>
                                ";   
                                   
                                 

                                 echo '<td> 
        <input type="submit" class="cart-button cart-update-button" value="Update" /> 
        <a href="cart.php?action=remove&equipmentID=' . $equID . '" class="cart-remove-link">Remove</a>
      </td>';

                          echo "</tr>";  
                      }
                      ?>
                    </tbody>



<?php 
include('dbconnect.php');
include('AutoID_Functions.php');
include('cart_function.php');





/*$rentID = $_POST['rentID'];
$endDate = $_POST['endDate'];
$equipmentName = $_POST['equipmentName'];
$quantity = $_POST['quantity'];
$grandTotal = $_POST['grandTotal'];
$returnDate = $_POST['returnDate']; */


if (isset($_GET['rentID']) && isset($_GET['endDate']) && isset($_GET['equipmentName']) && isset($_GET['quantity']) && isset($_GET['grandTotal'])) {
    $rentID = $_GET['rentID'];
    $endDate = $_GET['endDate'];
    $equipmentName = $_GET['equipmentName'];
    $quantity = $_GET['quantity'];
    $totalQuantity = $_GET['totalQuantity'];
    $grandTotal = $_GET['grandTotal'];
} else {
    echo "Missing rental information.";
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Return Form</title>
</head>
<body>
  <form action="return.php" method="post">

  <label for="returnid">Return ID:</label>
  <input type="text" id="returnid" name="rentID" value="Return:000000"><br>


    <label for="rentid">Rent ID:</label>
    <input type="text" id="rentid" name="rentID" value="<?php echo $rentID; ?>" readonly><br>

    <label for="end">End Date:</label>
    <input type="date" id="end" name="endDate" value="<?php echo $endDate; ?>" readonly><br>

    <label for="equName">Equipment Name:</label>
    <input type="text" id="equName" name="equipmentName" value="<?php echo $equipmentName; ?>" readonly><br>

    <label for="quant">Quantity:</label>
    <input type="text" id="quant" name="quantity" value="<?php echo $quantity; ?>" readonly><br>

    <label for="totalquant">Total Quantity:</label>
    <input type="text" id="totalquant" name="totalquantity" value="<?php echo $totalQuantity; ?>" readonly><br>

    <label for="grand">Grand Total:</label>
    <input type="text" id="grand" name="grandTotal" value="<?php echo $grandTotal; ?>" readonly><br>

    <label for="late">Late Fees:</label>
    <input type="text" id="late" name="grandTotal" value="100" readonly><br>

    <input type="submit" value="Submit Return">
</form>



</body>
</html>
<script>
document.getElementById("returnForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const endDate = new Date(document.getElementById("endDate").value);
    const returnDate = new Date(document.getElementById("returnDate").value);
    
    const gracePeriod = 2; // 2 days grace period
    const maxReturnDate = new Date(endDate);
    maxReturnDate.setDate(endDate.getDate() + gracePeriod);

    if (returnDate > maxReturnDate) {
        const daysLate = Math.ceil((returnDate - maxReturnDate) / (1000 * 60 * 60 * 24)); // Calculate late days
        const lateFee = daysLate * 10; // Example late fee calculation: $10 per day
        
        document.getElementById("lateFee").value = "$" + lateFee;
        document.getElementById("lateFeeSection").style.display = "block";
        
        alert("You are " + daysLate + " day(s) late. The late fee is $" + lateFee);
    } else {
        alert("No late fee, thank you!");
        document.getElementById("lateFeeSection").style.display = "none";
    }
});
</script>



<?php  
session_start();
include('dbconnect.php'); // Database connection
include('AutoID_Functions.php'); // Auto ID functions

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
} else {
    // Redirect if rentID is not provided
    header("Location: rent_history.php");
    exit();
}

if (isset($_POST['btnReturn'])) {
    // Process return submission
    // Update the rent status to 'Returned' (or any status you prefer)
    $updateQuery = "UPDATE rents SET rentstatus = 'Returned' WHERE rentID = '$rentID'";
    mysqli_query($connection, $updateQuery);
    // You can also process additional logic here, e.g., updating inventory
    // Redirect or show success message
    echo "<script>alert('Return processed successfully.'); window.location='rent_history.php';</script>";
}

function getEquipmentName($equipmentID) {
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
</style>

</head>
<body>
<div class="return-container">

   <form id="returnForm" action="return.php?rentID=<?php echo $rentID; ?>" method="post" class="return-form">
<h2 class="form-title">Return Equipment</h2>

    <div class="form-group">
        <label for="returnID" class="form-label">ReturnID:</label>
        <input type="text" id="returnID" name="txtrentID" value="22222222" class="form-input" readonly />
    </div>

    <?php
    $endDate = $rentDetails['enddate']; 
    $minReturnDate = date('Y-m-d', strtotime($endDate . ' +2 days'));
    ?>
    <div class="form-group">
        <label for="returnDate" class="form-label">Return Date:</label>
       <input type="date" id="returnDate" name="returndate" class="form-input" min="<?php echo $minReturnDate; ?>" value="<?php echo $minReturnDate; ?>" />
    </div>





    <div class="form-group">
        <label for="rentID" class="form-label">Rent ID:</label>
        <input type="text" id="rentID" name="rentID" value="<?php echo $rentDetails['rentID']; ?>" class="form-input" readonly />
    </div>
    <div class="form-group">
        <label for="customerName" class="form-label">Customer Name:</label>
        <input type="text" id="customerName" name="customerName" value="<?php echo $rentDetails['customername']; ?>" class="form-input" readonly />
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
            <td data-label="Quantity"><?php echo $item['quantity']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <button type="submit" id="returnBtn" name="btnReturn" class="return-button">Submit Return</button>
</form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch the end date from the server-side (PHP)
        const endDateString = "<?php echo $endDate; ?>";
        console.log("End Date from PHP: ", endDateString);

        const endDate = new Date(endDateString);
        console.log("Parsed End Date: ", endDate);

        // Ensure the end date is valid before proceeding
        if (!isNaN(endDate.getTime())) {  // Check if it's a valid date
            // Calculate the max return date by adding 2 days to the end date
            const maxReturnDate = new Date(endDate);
            maxReturnDate.setDate(endDate.getDate() + 2);
            console.log("Max Return Date: ", maxReturnDate);

            // Format both the minimum and maximum return dates as 'YYYY-MM-DD'
            const minReturnDate = endDate.toISOString().split('T')[0];   // End date as min value
            const maxReturnDateStr = maxReturnDate.toISOString().split('T')[0];  // End date + 2 as max value
            console.log("Min Return Date: ", minReturnDate);
            console.log("Max Return Date: ", maxReturnDateStr);

            // Get the return date input field
            const returnDateInput = document.getElementById('returnDate');
            if (returnDateInput) {
                // Set the min and max attributes for the return date input
                returnDateInput.min = minReturnDate;
                returnDateInput.max = maxReturnDateStr;

                // Optionally, pre-fill the return date with the min value (or leave it blank)
                returnDateInput.value = minReturnDate;
                console.log("Return Date input min and max set successfully");
            } else {
                console.log("Return Date input not found");
            }
        } else {
            console.log("Invalid end date");
        }
    });
</script>


</body>
</html>

<?php  
session_start();
include('dbconnect.php'); // Database connection
include('AutoID_Functions.php'); // Auto ID functions

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
} else {
    // Redirect if rentID is not provided
    header("Location: rent_history.php");
    exit();
}

if (isset($_POST['btnReturn'])) {
    // Process return submission
    // Update the rent status to 'Returned' (or any status you prefer)
    $updateQuery = "UPDATE rents SET rentstatus = 'Returned' WHERE rentID = '$rentID'";
    mysqli_query($connection, $updateQuery);
    // You can also process additional logic here, e.g., updating inventory
    // Redirect or show success message
    echo "<script>alert('Return processed successfully.'); window.location='rent_history.php';</script>";
}

function getEquipmentName($equipmentID) {
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
                <input type="text" id="returnID" name="txtrentID" value="22222222" class="form-input" readonly />
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
                <select id="equipmentCondition" name="equipmentCondition" class="form-input" onchange="toggleDamageInput()">
                    <option value="good">Good</option>
                    <option value="damaged">Damaged</option>
                    <option value="missing">Missing Parts</option>
                </select>
            </div>
            <div class="form-group" id="damageConditionDiv" style="display: none;">
                <label for="damageCondition" class="form-label">How bad is the damage?</label>
                <input type="text" id="damageCondition" name="damageCondition" class="form-input" placeholder="Describe the damage condition" />
            </div>
            <div class="form-group">
                <label for="returnMethod" class="form-label">Return Method:</label>
                <select id="returnMethod" name="returnMethod" class="form-input" onchange="toggleReturnMethod()">
                    <option value="customer">Customer Transport</option>
                    <option value="pickup">Pickup (Additional Fees Apply)</option>
                </select>
            </div>
            <div class="form-group" id="pickupFeeNotification" style="display: none;">
                <p style="color: red;">Please note: Choosing Pickup will incur additional fees of <strong><?php echo $pickupFee; ?> USD</strong>.</p>
            </div>
            <div class="form-group" id="pickupDetailsDiv" style="display: none;">
                <label for="pickupAddress" class="form-label">Pickup Address:</label>
                <input type="text" id="pickupAddress" name="pickupAddress" class="form-input" placeholder="Enter pickup address" />
            </div>
            <div class="form-group" id="customerTransportDiv" style="display: none;">
                <label for="returnLocation" class="form-label">Return Location:</label>
                <input type="text" id="returnLocation" name="returnLocation" class="form-input" placeholder="Enter return location" />
                <div>
                    <input type="checkbox" id="useCompanyLocation" onclick="fillCompanyLocation()" />
                    <label for="useCompanyLocation">Use Company's Return Location</label>
                </div>
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
                <td data-label="Quantity"><?php echo $item['quantity']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" id="returnBtn" name="btnReturn" class="return-button">Submit Return</button>
</form>
</div>



<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    function calculateLateFees() {
        const endDateInput = document.getElementById('endDate');
        const returnDateInput = document.getElementById('returnDate');
        const oneDayLateFee = parseFloat(document.getElementById('oneDayLateFee').value);
        const totalLateFeesInput = document.getElementById('totalLateFees');

        const endDate = new Date(endDateInput.value);
        const returnDate = new Date(returnDateInput.value);

        // Calculate the difference in days
        const dateDiff = (returnDate - endDate) / (1000 * 60 * 60 * 24);
        console.log('End Date:', endDate);
        console.log('Return Date:', returnDate);
        console.log('Date Difference (days):', dateDiff);

        let totalLateFees = 0;

        // Check if the return is late
        if (dateDiff > 0) {
            totalLateFees = dateDiff * oneDayLateFee; // Calculate total late fees for all days
        }

        console.log('Total Late Fees:', totalLateFees);
        totalLateFeesInput.value = totalLateFees.toFixed(2);
    }

    document.getElementById('returnDate').addEventListener('change', calculateLateFees);
});

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

    function toggleReturnMethod() {
    const returnMethod = document.getElementById('returnMethod').value;
    const pickupFeeNotification = document.getElementById('pickupFeeNotification');
    const pickupDetailsDiv = document.getElementById('pickupDetailsDiv');
    const customerTransportDiv = document.getElementById('customerTransportDiv');

    if (returnMethod === 'pickup') {
        pickupFeeNotification.style.display = 'block';
        pickupDetailsDiv.style.display = 'block';
        customerTransportDiv.style.display = 'none'; // Hide customer transport input
    } else {
        pickupFeeNotification.style.display = 'none';
        pickupDetailsDiv.style.display = 'none'; // Hide pickup address input
        customerTransportDiv.style.display = 'block'; // Show customer transport input
        document.getElementById('returnLocation').value = "Company Return Location"; // Set default company return location
    }
}

function fillCompanyLocation() {
    const returnLocationInput = document.getElementById('returnLocation');
    const useCompanyLocationCheckbox = document.getElementById('useCompanyLocation');

    if (useCompanyLocationCheckbox.checked) {
        // Set the return location to the company's address
        returnLocationInput.value = "No.97, Blossom  Street, Hlaing, Yangon, Myanmar."; // Replace with actual company address
    } else {
        // Clear the input field if the checkbox is unchecked
        returnLocationInput.value = "";
    }
}
</script>
</body>
</html>

/*-----------------------------------return -------------------------*/
<?php  
session_start();
include('dbconnect.php'); 
include('AutoID_Functions.php'); 
include('cart_function.php');


if (isset($_SESSION['cart_function'])) {
    echo "<pre>";
    print_r($_SESSION['cart_function']);
    echo "</pre>";
} else {
    echo "<p>No cart items found.</p>";
}

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

    $size = count($_SESSION['cart_function']);
    for ($i = 0; $i < $size; $i++)
    { 
        $equipmentID = $_SESSION['cart_function'][$i]['equipmentID'];
        $rentquantity = $_SESSION['cart_function'][$i]['rentquantity'];

        $Insert2 = "INSERT INTO `returndetails`
                  (`equipmentID`,`returnID`, `returnquantity`) 
                  VALUES
                  ('$equipmentID','$txtreturnID','$rentquantity')
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
                <select id="equipmentCondition" name="equipmentCondition" class="form-input" onchange="toggleDamageInput(); showMissingPartsNotification();">
                    <option value="good">Good</option>
                    <option value="damaged">Damaged</option>
                    <option value="missing">Missing Parts</option>
                </select>
            </div>
            <div class="form-group" id="damageConditionDiv" style="display: none;">
                <label for="damageCondition" class="form-label">How bad is the damage?</label>
                <input type="text" id="damageCondition" name="damageCondition" class="form-input" placeholder="Describe the damage condition" />
            </div>
            <div class="form-group" id="missingPartsNotification" style="display: none;">
                <p style="color: red;">Please note: Upon the rental equipment's pickup, the amount for the lost equipment must be paid.</p>
            </div>

            <label for="returnplace" class="form-label">Pickup Location:</label>
            <div class="form-group" id="returnplace">
                <input type="radio" id="cusAddress" name="rdoreturn" value="Cus" checked onclick="CustomerAddress()" />
                <label for="cusAddress">Same Address</label>

                <input type="radio" id="comAddress" name="rdoreturn" value="Com" onclick="OtherLocation()" />
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
                <td data-label="Quantity"><?php echo $item['quantity']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" id="returnBtn" name="btnReturn" class="return-button">Submit Return</button>
</form>
</div>



<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    function calculateLateFees() {
        const endDateInput = document.getElementById('endDate');
        const returnDateInput = document.getElementById('returnDate');
        const oneDayLateFee = parseFloat(document.getElementById('oneDayLateFee').value);
        const totalLateFeesInput = document.getElementById('totalLateFees');

        const endDate = new Date(endDateInput.value);
        const returnDate = new Date(returnDateInput.value);

        // Calculate the difference in days
        const dateDiff = (returnDate - endDate) / (1000 * 60 * 60 * 24);
        console.log('End Date:', endDate);
        console.log('Return Date:', returnDate);
        console.log('Date Difference (days):', dateDiff);

        let totalLateFees = 0;

        // Check if the return is more than two days late
        if (dateDiff > 2) {
            totalLateFees = (dateDiff - 2) * oneDayLateFee; // Calculate total late fees for days beyond the first two
        }

        console.log('Total Late Fees:', totalLateFees);
        totalLateFeesInput.value = totalLateFees.toFixed(2);
    }

    document.getElementById('returnDate').addEventListener('change', calculateLateFees);
});


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

