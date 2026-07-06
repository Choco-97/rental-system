<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>
	<?php 
	
		include("dbconnect.php");
 		
		
		$pname = $_FILES['profile']['name'];
		$ptname = $_FILES['profile']['tmp_name'];

		$path = "../images/profile/".$pname;

		copy($ptname, $path);
		
		$name= trim($_POST['name']);
		$uname= trim($_POST['username']);
		$email= trim($_POST['email']);
		$address= trim($_POST['address']);
		$phonenumber= trim($_POST['phonenumber']);
		$pw= trim($_POST['password']);
		$cpw= trim($_POST['confirm_password']);
		if (empty($uname)) 
		{
			echo "You must enter your username.";
		}
		else if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $uname)) 
		{
            echo "Username must be 4-20 characters long and can only contain letters, numbers, and underscores.";
        } 
		else if (empty($name)) 
		{
			echo "You must enter your name.";
		}
		else if (empty($email)) 
		{
			echo "You must enter your email";
		}
		else if (empty($address)) 
		{
			echo "You must enter your address";
		}
		else if (empty($phonenumber)) 
		{
			echo "You must enter your phonenumber";
		}
		else if (empty($pw)) 
		{
			echo "You must enter password.";
		}
		else if (empty($cpw)) 
		{
			echo "You must enter password again.";
		}
		else if ($pw !== $cpw) 
		{
            echo "<script>window.alert('Password do not match!');</script>";
        } 
        else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[^\da-zA-Z]).{8,16}$/', $pw)) 
        {
            echo "<script>window.alert('Password must contain at least 1 lowercase letter, 1 uppercase letter, 1 number, 1 special character, and be 8 to 16 characters long');</script>";
            exit;
        }   
		else
		   {
				if ($pw == $cpw) 
					{
						$hash_pw = password_hash($pw, PASSWORD_DEFAULT);

						$hash_pw = mysqli_real_escape_string($connection,$hash_pw);

						$sql_select = "select * from staff where username='$uname'";

						$result = mysqli_query($connection,$sql_select);

						$rnum_ows = mysqli_num_rows($result);

						if ($rnum_ows==0) 
						{
							
						  $sql ="Insert into staff(name,username,email,address,phonenumber,profile,password) 
						  values('$name','$uname','$email','$address','$phonenumber','$path','$hash_pw')";
						  if (mysqli_query($connection,$sql)) 
						  {
						  	echo "<script>
						        		alert('One User record is registered!');
						        		window.location.href='index.php';
						 		</script>";
						  }
						  else echo "Insertion error.<br>";
					    }
					    else
					    {
							echo "<script>
						        	alert('Username is existed! Try again to enter new username!');
						        	window.location.href='home.php';
						 		</script>";
					    }
					    
				    }
			    echo "<script>
						    alert('Password not matched! Please type your password again!');
					</script>";
	    }
	 ?>

	 
</body>
</html>