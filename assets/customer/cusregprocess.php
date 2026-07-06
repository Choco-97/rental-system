	<?php 
	
		include("dbconnect.php");
 		
		
		$pname = $_FILES['profile']['name'];
		$ptname = $_FILES['profile']['tmp_name'];

		$path = "../images/cus_profile/".$pname;

		copy($ptname, $path);
		
		$fname= trim($_POST['fname']);
		$lname= trim($_POST['lname']);
		$cusuname= trim($_POST['cusuname']);
		$cusemail= trim($_POST['cusemail']);
		$cusaddress= trim($_POST['cusaddress']);
		$cusphono= trim($_POST['cusphono']);
		$cusgen= trim($_POST['gender']);
		$pw= trim($_POST['password']);
		$cpw= trim($_POST['confirm_password']);
		if (empty($cusuname)) 
		{
			echo "You must enter your username.";
		}
		else if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $cusuname)) 
		{
			echo "<script>window.alert('Username must be 4-20 characters long and can only contain letters, numbers, and underscores.')</script>";
            exit;
        } 
		else if (!filter_var($cusemail, FILTER_VALIDATE_EMAIL)) {
		echo "<script>window.alert('Invalid email format. Please enter a valid email.')</script>";
		exit;
		}

		// Phone number validation (example: must be 10 digits and only numbers)
		else if (!preg_match('/^[0-9]{11}$/', $cusphono)) {
			echo "<script>window.alert('Phone number must be 11 digits long and contain only numbers.')</script>";
			exit;
		}
		else if ($pw !== $cpw) 
		{
            echo "<script>window.alert('Passwords do not match. Please type again.')</script>";
            exit;
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


						$sql_select = "SELECT * FROM customer WHERE cusuname='$cusuname' OR cusemail='$cusemail' OR cusphoneno='$cusphono'";

						$result = mysqli_query($connection, $sql_select);
						
						$rnum_ows = mysqli_num_rows($result);

						if ($rnum_ows==0) 
						{
							
						  $sql ="Insert into customer(cusfname,cuslname,cusuname,cusemail,cusaddress,cusphoneno,gender,image,passwords) 
						  values('$fname','$lname','$cusuname','$cusemail','$cusaddress','$cusphono','$cusgen','$path','$hash_pw')";
						  if (mysqli_query($connection,$sql)) 
						  {
						  	echo "<script>
						        		alert('Account Registration is scusseful!');
						        		window.location.href='cuslogin.php';
						 		</script>";
						  }
						  else echo "Insertion error.<br>";
					    }
					    else
					    {
							// Check for which field caused the duplication
						$duplicateCheck = mysqli_fetch_assoc($result);

						if ($duplicateCheck['cusuname'] == $cusuname) {
							echo "<script>window.alert('Username is already taken! Please choose another username.')</script>";
						} else if ($duplicateCheck['cusemail'] == $cusemail) {
							echo "<script>window.alert('Email is already registered! Please use a different email.')</script>";
						} else if ($duplicateCheck['cusphoneno'] == $cusphono) {
							echo "<script>window.alert('Phone number is already registered! Please use a different phone number.')</script>";
						}
						echo "<script>window.location.href='home.php';</script>";
					    }
					    
				    }
			    echo "<script>
						    alert('Password not matched! Please type your password again!');
					</script>";
	    }
	 ?>