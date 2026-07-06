<?php  
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Profile</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.container {
			background-color: palegoldenrod;
			border-radius: 12px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
			width: 1200px; /* Increased width */
			padding: 30px;
			display: flex;
			flex-direction: column;
		}
		h1 {
			text-align: center;
			color: darkgoldenrod;
			margin-bottom: 20px;
		}
		.profile-info {
			border-bottom: 2px solid #007bff;
			padding-bottom: 15px;
			margin-bottom: 20px;
		}
		.profile-info strong {
			color: palegoldenrod;
		}
		.info-container {
			display: flex;
			justify-content: space-between; /* Creates a two-column effect */
		}
		.info-container div {
			width: 48%; /* Ensures columns have space between them */
		}
		ul {
			list-style-type: none;
			padding: 0;
		}
		ul li {
			margin-bottom: 10px;
			padding: 10px;
			background-color: darkgoldenrod;
			border-radius: 8px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);

		}
		a {
			color: #007bff;
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
		.nav-links {
			text-align: center;
			margin-top: 20px;
		}
		.nav-links a {
			display: inline-block;
			margin: 5px 10px;
			padding: 10px 15px;
			background-color: darkgoldenrod;
			color: white;
			border-radius: 5px;
			text-align: center;
		}
		.nav-links a:hover {
			background-color: #0056b3;
		}
	</style>
</head>
<body>
<div class="container">
	<h1>Welcome, <?php echo $_SESSION['cusuname']; ?></h1>

	<div class="profile-info">
		<div class="info-container">
			<div>
				<ul>
					<li><strong>First Name:</strong> <?php echo $_SESSION['cusfname']; ?></li>
					<li><strong>Last Name:</strong> <?php echo $_SESSION['cuslname']; ?></li>
				</ul>
			</div>
			<div>
				<ul>
					<li><strong>Address:</strong> <?php echo $_SESSION['cusaddress']; ?></li>
					<li><strong>Phone No:</strong> <?php echo $_SESSION['cusphoneno']; ?></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="nav-links">
		<a href="furniture.php">Explore Equipment</a>
		<a href="cart.php">Your Cart</a>
		<a href="rent_history.php">Rent History</a>
		<a href="home.php">Home Page</a>
		<a href="useredit.php">Edit Profile</a>
	</div>
	
	<p style="text-align: center;"><a href="logut.php">Logout</a></p>
</div>
</body>
</html>