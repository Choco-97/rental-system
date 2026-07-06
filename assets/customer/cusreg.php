<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Register Form</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

<form action="cusregprocess.php" method="post" enctype="multipart/form-data" class="cus-reg-form">
	<fieldset class="cus-fieldset">
	    <legend class="cus-reg-header">Register Here!</legend>
        <div class="cus-reg-row">
            <div class="cus-reg-data">
                <input type="text"  name="fname" placeholder="Enter Your First Name!" required>
            </div>
            <div class="cus-reg-data">
                <input type="text"  name="lname" placeholder="Enter Your Last Name!" required>
            </div>                  
            <div class="cus-reg-data">
                <input type="text" name="cusuname" placeholder="Enter Your User Name!" required>
            </div>
            <div class="cus-reg-data">
                <input type="text"  name="cusemail" placeholder="Enter Your Email!" required>
            </div>
            <div class="cus-reg-data">
                <input type="text"  name="cusaddress" placeholder="Enter Your Address!" required>
            </div>  
            <div class="cus-reg-data">
                <input type="text"  name="cusphono" placeholder="Enter Your Phone number!" required>
            </div>             
            <div class="radio">
	            <label class="gen">Gender</label>
	            <input type="radio" name="gender" value="Male">Male
	            <input type="radio" name="gender" value="Female">Female
	            <input type="radio" name="gender" value="Prefer not to">Others                                
            </div>
            <div class="cus-profile">
                <label class="pp">Profile Picture</label>
                <input type="file" name="profile">
            </div>                 
            <div class="cus-reg-data">
        		<input type="password" id="password" name="password" placeholder="Enter Your Password!" required>
      		</div>

		    <!-- Password Tips -->
		    <div id="password-tips" class="password-tips">
		        Password must include:
		        <ul>
		            <li id="lowercase">At least one lowercase letter</li>
		            <li id="uppercase">At least one uppercase letter</li>
		            <li id="number">At least one number</li>
		            <li id="special">At least one special character (!@#$%^&* etc.)</li>
		            <li id="length">Between 8 and 16 characters</li>
		        </ul>
		    </div>            
		    <div class="cus-reg-data">
                <input type="password" name="confirm_password" placeholder="Please reenter your password!" required>
            </div>
        </div>
                    
            <button name="cusreg" class="btn-cus"   type="submit">Register</button>
            <div class="cus-acc-link">
               Already have a account? <a href="cuslogin.php">Login Here</a>
            </div>
    </fieldset>                 
</form>
</body>
</html>

<script>
    // Select password input and tips
    const passwordInput = document.getElementById('password');
    const passwordTips = document.getElementById('password-tips');
    const lowercaseTip = document.getElementById('lowercase');
    const uppercaseTip = document.getElementById('uppercase');
    const numberTip = document.getElementById('number');
    const specialTip = document.getElementById('special');
    const lengthTip = document.getElementById('length');

    // Show tips when the user focuses on the password field
    passwordInput.addEventListener('focus', () => {
        passwordTips.classList.add('active');
    });

    // Hide tips when the user moves away from the password field
    passwordInput.addEventListener('blur', () => {
        passwordTips.classList.remove('active');
    });

    // Listen for input in the password field and check validation
    passwordInput.addEventListener('input', function () {
        const password = passwordInput.value;

        // Check for lowercase letter
        if (/[a-z]/.test(password)) {
            lowercaseTip.classList.add('valid');
        } else {
            lowercaseTip.classList.remove('valid');
        }

        // Check for uppercase letter
        if (/[A-Z]/.test(password)) {
            uppercaseTip.classList.add('valid');
        } else {
            uppercaseTip.classList.remove('valid');
        }

        // Check for number
        if (/\d/.test(password)) {
            numberTip.classList.add('valid');
        } else {
            numberTip.classList.remove('valid');
        }

        // Check for special character
        if (/[!@#$%^&*()\-_=+{};:,<.>]/.test(password)) {
            specialTip.classList.add('valid');
        } else {
            specialTip.classList.remove('valid');
        }

        // Check for length between 8 and 16 characters
        if (password.length >= 8 && password.length <= 16) {
            lengthTip.classList.add('valid');
        } else {
            lengthTip.classList.remove('valid');
        }
    });
</script>