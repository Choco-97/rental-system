<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">
</head>
<body>

			<form action="regprocess.php" method="post" enctype="multipart/form-data" class="registration-form">
			        <div class="reg-row">
			            <div class="reg-data">
			                <input type="text"  name="name" placeholder="Enter Your Name!" required>
			            </div>                 
			            <div class="reg-data">
			                <input type="text" name="username" placeholder="Enter Your User Name!" required>
			            </div>
			            <div class="reg-data">
			                <input type="text"  name="email" placeholder="Enter Your Email!" required>
			            </div>
			            <div class="reg-data">
			                <input type="text"  name="address" placeholder="Enter Your Address!" required>
			            </div>              
			            <div class="reg-data">
			                <input type="text"  name="phonenumber" placeholder="Enter Your Phonenumber!" required>
			            </div>
			            <div class="profile">
			                <label class="pp">Profile Picture</label>
			                <input type="file" name="profile">
			            </div>                 
			            <div class="reg-data">
			                <input type="password"  name="password" placeholder="Enter Your Password!" required>
			            </div>
			            <div class="reg-data">
			                <input type="password" name="confirm_password" placeholder="Please reenter your password!" required>
			            </div>
			        </div>
			                    
		            <button name="submit" class="btn"   type="submit">Register</button>
		            <div class="login-link">
		               Already have a account? <a href="index.php">Login Here</a>
		            </div>                     
			</form>
</body>
</html>