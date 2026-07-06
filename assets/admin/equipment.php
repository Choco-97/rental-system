
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Equipment Form</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="admin.css?<?php echo time();?>">
</head>
<body>

     <?php  
    include ("admin_pannel.php");;
    include("dbconnect.php");
    ?>
<div class="container mt-5"> 
<section id="cat-content">
        <div class="cat-container">
            <div class="cat-text">
                Equipment Form
            </div>
            <form action="equprocess.php" method="post" enctype="multipart/form-data">
            
            <div class="custom-select-wrapper">   
            <select class="equ-data" name="catID">
            <option>Choose Category</option>
               <?php  
				    $query = "SELECT * FROM category";  
				    $ret = mysqli_query($connection, $query);

				    if ($ret) 
				    {  // Check if query executed successfully
				        $count = mysqli_num_rows($ret);

				        for ($i = 0; $i < $count; $i++) 
				        { 
				            $arr = mysqli_fetch_array($ret);
				            $catID = $arr['categoryID'];

				            echo "<option value='$catID'>" . $arr['categoryID'] . ' - ' . $arr['categoryname']. "</option>"; 
				        }
				    } 
				    else 
				    {
				        echo "<option>Error loading categories</option>";  // Fallback in case of query error
				    }
                ?>
            </select>
            </div>

               <div class="cat-data">
                  <input type="text" name="equname" placeholder="Enter Equipment Name." required />
               </div>
              <div class="cat-data">
                  <input type="text" name="equcolor" placeholder="Enter Equipment's Color." required />
               </div>
               <div class="cat-data">
                  <input type="text" name="equbrand" placeholder="Enter Equipment Brand." required />
               </div>
               <div class="cat-data">
                  <input type="number" name="equprice" placeholder="Enter Equipment Price." required />
               </div>
               <div class="cat-data">
                  <input type="number" name="eququantity" placeholder="Enter Equipment Quantity." required />
               </div>
               <div class="cat-data">
                  <input type="number" name="equvat" placeholder="Enter Equipment VAT." required />
               </div>
               <div class="form-container">
				    <div class="image-section">
				        <div class="image">
				            <label class="pp">Image</label>
				            <input type="file" name="file1">
				        </div> 
				        <div class="image">
				            <label class="pp">Image</label>
				            <input type="file" name="file2">
				        </div> 
				        <div class="image">
				            <label class="pp">Image</label>
				            <input type="file" name="file3">
				        </div> 
				    </div>

				    <div class="cat-data">
				        <textarea name="equdescrp" placeholder="Enter Equipment Description." rows="5" cols="40" required></textarea>
				    </div>

				    <div class="cat-data buttons">
				        <input type="submit" name="equsave" value="Save" />
				        <input type="reset" name="equcancel" value="Cancel" />
				        <input type="reset" name="equview" value="See all list" onclick="window.location.href='equlist.php'; return false;" />

				    </div>
				</div>
                  
         </form>
      </div>
   </section>
 </div>

 <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var equprice = document.querySelector('input[name="equprice"]').value;
        var eququantity = document.querySelector('input[name="eququantity"]').value;
        var equvat = document.querySelector('input[name="equvat"]').value;

        // Validate that the inputs are positive numbers
        if (equprice <= 0 || eququantity <= 0 || equvat < 0) {
            event.preventDefault();  // Prevent form submission
            alert('Please enter valid positive numbers for Price, Quantity, and VAT.');
        }
    });
</script>

</body>
</html>