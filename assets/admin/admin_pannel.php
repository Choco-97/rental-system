<?php
// Include your existing database connection file
include('dbconnect.php');


/*
$customers_query = "SELECT COUNT(*) as total_customers FROM customer";
$customers_result = $connection->query($customers_query);
$total_customers = $customers_result->fetch_assoc()['total_customers'];

// Fetch total equipment
$equipment_query = "SELECT COUNT(*) as total_equipment FROM equipment";
$equipment_result = $connection->query($equipment_query);
$total_equipment = $equipment_result->fetch_assoc()['total_equipment'];

// Fetch total rents
$rents_query = "SELECT COUNT(*) as total_rents FROM rents";
$rents_result = $connection->query($rents_query);
$total_rents = $rents_result->fetch_assoc()['total_rents'];

// Fetch total returns
$returns_query = "SELECT COUNT(*) as total_returns FROM returns";
$returns_result = $connection->query($returns_query);
$total_returns = $returns_result->fetch_assoc()['total_returns'];*/
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Menu</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="smc_style.css?<?php echo time();?>">
</head>
<style type="text/css">
    .admin-sidebar 
{
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    background-color: skyblue;
    color: darkblue;
    width: 250px;
    padding-top: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}
.admin-sidebar ul 
{
    list-style: none;
    padding: 0;
    margin: 0;
}
.admin-sidebar ul li 
{
    margin-bottom: 10px;
}
.admin-sidebar ul li a 
{
    display: block;
    color: darkslateblue;
    text-decoration: none;
    padding: 10px;
}
.admin-sidebar ul li a:hover
{
    background-color: steelblue;
    color: lightblue;
}
.admin-logo h1 
{
    margin: 0;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}
.dropdown-menu 
{
    display: none;
    background-color: darkgreen;
    padding-left: 20px;
}
.dropdown-menu li a 
{
    color: lightyellow;
    text-decoration: none;
    display: block;
    padding: 10px;
}
 @media screen and (max-width: 768px) 
 {
    .admin-sidebar 
    {
        width: 100%;
        height: auto;
        position: relative;
        padding-top: 0;
    }
    .admin-content 
    {
        margin-left: 0;
    }

    .dropdown-menu 
    {
        display: block;
    }

    .admin-sidebar ul 
    {
        display: none;
    }

    .admin-sidebar.open .dropdown-menu 
    {
        display: block;
    }
    .dropdown-menu 
    {
        width: 100%;
    }
 }
 .cat-menu {
    display: none;
}
.admin-content {
    margin-left: 260px; /* Adjust this based on the width of your sidebar */
    padding: 20px;
    background-color: #f4f4f4;
    min-height: 100vh; /* Make sure it covers the full height */
}

.admin-header {
    font-size: 24px;
    font-weight: bold;
    padding: 20px;
    background-color: #333;
    color: white;
    border-radius: 8px;
    text-align: center;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.admin-stats {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Space between each stat card */
    flex-wrap: wrap;
}

.admin-stat-card {
    background-color: white;
    padding: 20px;
    flex: 1; /* This makes all cards of equal width */
    min-width: 200px; /* Minimum width to prevent shrinking too much */
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.admin-stat-card h3 {
    font-size: 36px;
    color: #333;
    margin: 0 0 10px;
}

.admin-stat-card p {
    font-size: 18px;
    color: #777;
    margin: 0;
}

.admin-stat-card:hover {
    transform: translateY(-5px); /* Lifts the card on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Adds shadow effect on hover */
}
</style>
<body>

    <div class="admin-sidebar" id="adminSidebar">
    <div class="admin-logo">
        <h1>Admin Panel</h1>
    </div>
    <ul>
        <li><a href="../customer/home.php" class="btn"><i class="fa-solid fa-globe"></i> See Website</a></li>
        <li><a href="cuslist.php"><i class="fa-regular fa-user"></i> Customer list</a></li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle"><i class="fa fa-edit"></i> Add Equipment <i class="fa fa-chevron-down"></i></a>
    <ul class="cat-menu">
        <li><a href="category.php">Equipment Category</a></li>
        <li><a href="equipment.php">Equipment</a></li>
    </ul>
</li>

        <li><a href="rentlist.php"><i class="fa-solid fa-list"></i> Manage Rent</a></li>
        <li><a href="returnlist.php"><i class="fa-solid fa-list"></i> Manage Return</a></li>
        <li><a href="contactlist.php"><i class="fa-solid fa-list"></i> Contact list</a></li>
        <li><a href="feedlist.php"><i class="fa-solid fa-list"></i> Feedback</a></li>
        <li><a href="adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
    </ul>

        <ul  class="dropdown-menu">
        <li><a href="../customer/home.php" class="btn"><i class="fa-solid fa-globe"></i> See Website</a></li>
        <li><a href="cuslist.php"><i class="fa-regular fa-user"></i> Customer list</a></li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle"><i class="fa fa-edit"></i> Add Equipment <i class="fa fa-chevron-down"></i></a>
    <ul class="cat-menu">
        <li><a href="category.php">Equipment Category</a></li>
        <li><a href="equipment.php">Equipment</a></li>
    </ul>
</li>

        <li><a href="rentlist.php"><i class="fa-solid fa-list"></i> Manage Rent</a></li>
        <li><a href="returnlist.php"><i class="fa-solid fa-list"></i> Manage Return</a></li>
        <li><a href="contactlist.php"><i class="fa-solid fa-list"></i> Contact list</a></li>
        <li><a href="feedlist.php"><i class="fa-solid fa-list"></i> Feedback</a></li>
        <li><a href="adminlogout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
    </ul>
</div>
<!--
<div class="admin-content">
    <div class="admin-header">
        Welcome to the Admin Dashboard
    </div>

    <div class="admin-stats">
        <div class="admin-stat-card">
            <h3><?php echo $total_customers; ?></h3>
            <p>Total Customers</p>
        </div>
        <div class="admin-stat-card">
            <h3><?php echo $total_equipment; ?></h3>
            <p>Total Equipment</p>
        </div>
        <div class="admin-stat-card">
            <h3><?php echo $total_rents; ?></h3>
            <p>Total Rents</p>
        </div>
        <div class="admin-stat-card">
            <h3><?php echo $total_returns; ?></h3>
            <p>Total Returns</p>
        </div>
    </div>
</div>-->

<!-- JavaScript to toggle menu on small screens -->
<script>
    document.getElementById('adminSidebar').addEventListener('click', function() {
        this.classList.toggle('open');
    });

document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
    toggle.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var menu = this.nextElementSibling; // Get the next sibling (the dropdown menu)
        
        // Toggle the display of the dropdown menu
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    });
});

</script>
</body>
</html>