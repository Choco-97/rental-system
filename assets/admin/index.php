<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">
</head>
<body>
    
	 <section id="content">
        <div class="log-container">
            <div class="log-text">
                Login Form
            </div>
            <form action="loginprocess.php" method="post" enctype="multipart/form-data">
               
               <div class="log-data">
                  <input type="text" name="username" placeholder="Enter Your User Name!" required>
               </div>
               <div class="log-data">
                  <input type="email"  name="email" placeholder="Enter Your Email!" required>
               </div>

               <div class="log-data">
                     <input type="password"  name="password" placeholder="Enter Your Password!" required>
               </div>
                  
                     <button name="submitlogin" class="btn"   type="submit">Login</button>
            <div class="reg-link">
               Do not have any account? <a href="adminregister.php">Register Here</a>
            </div>
         </form>
      </div>
   </section>
</body>
</html>