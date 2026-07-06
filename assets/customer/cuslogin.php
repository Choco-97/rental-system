<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);  // Clear the error after displaying
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Login</title>
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
<form action="cusloginprocess.php" method="post" enctype="multipart/form-data" class="cus-login-form">
	<fieldset class="cus-fieldset">
	    <legend class="cus-reg-header">Login Here!</legend>
        <div class="cus-reg-row">

            <div class="cus-reg-data">
                <input type="text" name="cusemail" placeholder="Enter Your Email!" required>
            </div>
            
            <div class="cus-reg-data">
                <input type="password"  name="password" placeholder="Enter Your Password!" required>
            </div>
        </div>
                    
            <button name="cuslogin" class="btn-cus"   type="submit">Login</button>
            <div class="cus-acc-link">
               Already have a account? <a href="cusreg.php">Register Here</a>
            </div>
    </fieldset>                 
</form>
</body>
</html>