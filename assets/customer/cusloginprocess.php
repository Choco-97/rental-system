<?php
session_start();
require 'dbconnect.php';  // Include your database configuration file

if (isset($_POST['cuslogin'])) {
    $email = trim($_POST['cusemail']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        // Redirect back if username or password is empty
        $_SESSION['error'] = "Please fill in all fields!";
        header("Location: cuslogin.php");
        exit();
    }

    // Prepare SQL query to select customer from database
    $query = "SELECT * FROM customer WHERE cusemail = ? LIMIT 1";
    if ($stmt = $connection->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();

        if ($customer) {
            // Verify password
            if (password_verify($password, $customer['passwords'])) 
            {
                // Store more customer details in session
                $_SESSION['customerID'] = $customer['customerID'];       
                $_SESSION['cusuname'] = $customer['cusuname'];      
                $_SESSION['cusfname'] = $customer['cusfname'];    
                $_SESSION['cuslname'] = $customer['cuslname'];     
                $_SESSION['cusaddress'] = $customer['cusaddress'];   
                $_SESSION['cusphoneno'] = $customer['cusphoneno']; 

                // Redirect to customer dashboard
                header("Location: userprofile.php");
                exit();
            } else 
            {
                $_SESSION['error'] = "Invalid password!";
                header("Location: cuslogin.php");
                exit();
            }
        } 
        else 
        {
            $_SESSION['error'] = "Username does not exist!";
            header("Location: cuslogin.php");
            exit();
        }

        $stmt->close();
    } 
    else 
    {
        $_SESSION['error'] = "Database query failed!";
        header("Location: cuslogin.php");
        exit();
    }
} 
else 
{
    header("Location: cuslogin.php");
    exit();
}
