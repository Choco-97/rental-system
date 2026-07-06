<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
</head>
<body>
	<?php
		include("dbconnect.php");

		/////////// login failure counter ///////////
		/*
		if(isset($_SESSION['counter']))
		{
			$counter = $_SESSION['counter'];
			if($counter == 3)
			{
				echo "<script>window.location.href='login_timer.php';</script>";
				setcookie('login_fail','fail',time() + 600); // 60*10 = 10 minutes
			}
		}
		else
		{
			$counter = 1; //first time
		}
		*/
		///////////////////////////////////////////

		$uname = trim($_POST['username']);
		$email = trim($_POST['email']);
		$pw = trim($_POST['password']);

		if (empty($uname)) 
		{
			echo "<script>
				alert('You must enter your username.');
			</script>";			
		}
		else if (empty($email)) 
		{
			echo "<script>
				alert('You must enter your email.');
			</script>";
		}
		else if (empty($pw)) 
		{
			echo "<script>
				alert('You must enter a password.');
			</script>";
		}
		else 
		{
			$sql = "SELECT * FROM staff WHERE username='$uname'";
			$result = mysqli_query($connection, $sql);
			$num_rows = mysqli_num_rows($result);

			if ($num_rows == 0)
			{
				echo "<script>
					alert('Please register and try again!');
					window.location.href='register.php';
				</script>";
			}
			else 
			{
				$record = mysqli_fetch_assoc($result);
				$hash_pw = $record['password']; // fetch the hashed password

				if (password_verify($pw, $hash_pw))
				{
					echo "<script>alert('Welcome $uname'); window.location.href='admin_pannel.php';</script>";
					exit();
				}
				else
				{
					echo "<script> 
						alert('Incorrect password!'); 
						window.location.href='login.php';
					</script>";

					//$counter++; // Increment the counter for failed login attempts
					//$_SESSION['counter'] = $counter;
				}
			}
		}
	?>

	
</body>
</html>
