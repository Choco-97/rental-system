<?php  
session_start();
include('dbconnect.php');

$catname = "";
$rdostatus = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input values
    $catname = trim($_POST['catname']);
    $rdostatus = isset($_POST['rdostatus']) ? trim($_POST['rdostatus']) : '';
		
		if (empty($catname)) 
		{
			echo "You must enter category name.";
		}
		else if (empty($rdostatus))
		{
            echo "Please selsect the active status.";
        }  
		else
		   {
   	           $sql_select = "select * from category where categoryname='$catname'";

				$result = mysqli_query($connection,$sql_select);

				$rnum_ows = mysqli_num_rows($result);

				if ($rnum_ows==0) 
					{
							
						$sql ="Insert into category(categoryname,status) 
						values('$catname','$rdostatus')";
						if (mysqli_query($connection,$sql)) 
						  {
						  	echo "<script>
						        		alert('One Category record is saved!');
						        		window.location.href='category.php';
						 		</script>";
						  }
						  else echo "Insertion error.<br>";
					    }
					    else
					    {
							echo "<script>
						        	alert('Category Name is existed! Try again to enter new category!');
						        	window.location.href='category.php';
						 		</script>";
				    }
	       }
}
?>
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
	 <?php 
      include ("admin_pannel.php");
    ?>
<div class="container mt-5"> 
<section id="cat-content">
        <div class="cat-container">
            <div class="cat-text">
                Category Form
            </div>
            <form action="category.php" method="post" enctype="multipart/form-data">
               
               <div class="cat-data">
                  <input type="text" name="catname" placeholder="Enter Category Name." required />
               </div>
               <div class="cat-data">
                 <input type="radio" name="rdostatus" value="Active" checked />Active
	             <input type="radio" name="rdostatus" value="InActive" />InActive
               </div>

               <div class="cat-data">
                   <input type="submit" name="btnSave" value="Save" />
		           <input type="reset" name="btnCancel" value="Cancel" />
               </div>
                  
         </form>
      </div>
   </section>

   <?php  
$RoleQuery="SELECT * FROM category";
$ret=mysqli_query($connection,$RoleQuery);
$size=mysqli_num_rows($ret);

if($size < 1) 
{
	echo "<p>No Record Found.</p>";
}
else
{
?>
<div class="category-container">
        <table border="1">
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php  
            for($i=0;$i<$size;$i++) 
            { 
                $arr=mysqli_fetch_array($ret);
                //print_r($arr);
                
                $catID=$arr['categoryID'];

                echo "<tr>";
                    echo "<td>$catID</td>";
                    echo "<td>" . htmlspecialchars($arr['categoryname']) . "</td>";
                    echo "<td>" . htmlspecialchars($arr['status']) . "</td>";
                    echo "<td> 
                            <a href='catEdit.php?categoryID=$catID'>Edit</a> |
                            <a href='catDelete.php?categoryID=$catID'>Delete</a>
                          </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
<?php
}
?>
 </div>
</body>
</html>