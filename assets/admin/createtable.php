<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rentaldb";

	$connection = mysqli_connect($host,$username,$password,$dbname);

	if($connection) echo "Connected!!!<br>";
	else echo "Connection Error!<br>";

	$sql="create table if not exists equipment(equipmentID integer auto_increment primary key,							                                 equipmentname varchar(30),
                                         color varchar(30),
                                         brand varchar(30),
                                         price varchar(30),
                                         quantity int,
                                         VAT varchar(255),
                                         image1 varchar(255),
                                         image2 varchar(255),
                                         image3 varchar(255),
                                         description text,
                                         categoryID INT ,
    									 FOREIGN KEY (categoryID) REFERENCES category (categoryID)
										)";

	if(mysqli_query($connection,$sql))	
		echo "Equipment Table created!<br>";
	else echo "Table creation error<br>";
?>



