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
    else if ($_GET['action'] == 'update_quantity') 
    {
    // Check if equipmentID and rentquantity are set
    if (isset($_POST['equipmentID']) && isset($_POST['rentquantity'])) 
    {
        $equID = $_POST['equipmentID'];
        $newQuantity = $_POST['rentquantity'];

        // Update the quantity for the specific item
        UpdateQuantity($equID, $newQuantity);
    }
    }
}


if (isset($_POST['update_cart'])) {
    $equipmentIDs = $_POST['equipmentID'];
    $rentQuantities = $_POST['rentquantity'];

    // Loop through the submitted quantities and update the session cart
    for ($i = 0; $i < count($equipmentIDs); $i++) {
        $equID = $equipmentIDs[$i];
        $newQuantity = $rentQuantities[$i];

        // Update the quantity in the session
        foreach ($_SESSION['cart_function'] as &$cartItem) {
            if ($cartItem['equipmentID'] == $equID) {
                $cartItem['rentquantity'] = $newQuantity;
                break;
            }
        }
    }

    // Redirect to avoid resubmission issues
    header("Location: cart.php");
    exit();
}

if (isset($_SESSION['cart_message'])) {
    echo "<div class='cart-notification'>" . $_SESSION['cart_message'] . "</div>";
    // Clear the message after displaying it
    unset($_SESSION['cart_message']);
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
    <script type="text/javascript">
        
    </script>

    <style type="text/css">
        .cart-notification {
    background-color: #d4edda; /* Light green background */
    color: #155724; /* Dark green text */
    padding: 10px;
    margin: 15px 0;
    border: 1px solid #c3e6cb; /* Light green border */
    border-radius: 5px;
    text-align: center;
}
    </style>
</head>
<body>

<form action="cart.php" method="post" class="cart-equ">
    <fieldset class="cart-fieldset">
       <input type="hidden" name="equipmentID" value="<?php echo $equipmentID; ?>">
        <?php 
        if (!isset($_SESSION['cart_function']) || count($_SESSION['cart_function']) == 0)
        {
            echo "<div class='cart-empty-wrapper'>";
            echo "<img src='../images/cart.webp' class='cart-empty-image' />";
              echo "<h1 class='cart-empty-title'>Your cart is empty.</h1>";   
                echo "<p class='cart-empty-text'>It appears that there is nothing in your cart. Explore the best equipment now.</p>";
               echo "<a href='furniture.php' class='cart-continue'>Continue Shopping</a>"; 
               echo "</div>";
            }
        
           
         else
            {
            ?>
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
            for ($i = 0; $i < $size; $i++) {
                $equID = $_SESSION['cart_function'][$i]['equipmentID'];
                $image1 = $_SESSION['cart_function'][$i]['image1'];
                $equipmentName = $_SESSION['cart_function'][$i]['equipmentname'];
                $price = $_SESSION['cart_function'][$i]['price'];
                $rentQuantity = $_SESSION['cart_function'][$i]['rentquantity'];
                $totalPrice = $price * $rentQuantity;

                echo "<tr>"; 
                // Display the image
                echo "<td><img src='$image1' class='cart-image' /></td>";
                
                // Display the equipment ID
                echo "<td>$equID</td>";
                
                // Display the equipment name
                echo "<td>$equipmentName</td>";
                
                // Display the price
                echo "<td>$price</td>";
                
                // Editable quantity input with the Update button beside it
                echo "<td>
                    <input type='hidden' name='equipmentID[]' value='$equID'>
                    <input type='number' class='cart-quantity-input' name='rentquantity[]' value='$rentQuantity' min='1'>
                    <input type='submit' class='cart-button cart-update-button' name='update_cart' value='Update'>
                </td>";

                // Display total price (price * quantity)
                echo "<td>" . $totalPrice . "</td>";
                
                // Remove button
                echo "<td style='display: flex; align-items: center;'>";
                echo "<a href='cart.php?action=remove&equipmentID=$equID' 
                        class='cart-remove-link' 
                        onclick=\"return confirm('Are you sure you would like to remove this equipment from the cart?');\">
                        Remove
                      </a>";
                echo "<img src='../images/delete.png' class='cart-delete' style='margin-left: 5px; width: 25px;' />";
                echo "</td>";



                echo "</tr>";
            }
            ?>
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
                <!-- Continue Shopping button -->
                <a href="furniture.php" class="cart-button">Continue Shopping</a>

                <!-- Conditional Make Checkout button -->
                <?php
                // Check if the customer is logged in
                if (isset($_SESSION['customerID'])) {
                    // If logged in, show the 'Make Checkout' button
                    echo "<a href='checkout.php' class='cart-button'>Make Checkout</a>";
                } else {
                    // If not logged in, show a 'Make Checkout' button that triggers a JavaScript alert
                    echo "<a href='cuslogin.php' class='cart-button' onclick='alertLogin()'>Make Checkout</a>";
                }
                ?>
            </div>
            <?php
}
?>
    </fieldset>
</form>
<script type="text/javascript">
    function alertLogin() {
        // Show a window alert prompting the user to log in
        alert("You need to log in to proceed with checkout.");
        // Optionally, redirect the user to the login page after the alert
        window.location.href = 'login.php';
    }
</script>
</body>
</html>
