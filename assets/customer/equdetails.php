<?php  
include('dbconnect.php');
include('cart_function.php');

if (isset($_POST['btnAddtoCart'])) 
{
	$txtequipmentID=$_POST['txtequipmentID'];
	$txtRentQuantity=$_POST['txtRentQuantity'];

	AddEquipment($txtequipmentID,$txtRentQuantity);
}

$equipmentID=$_GET['equipmentID'];

$query="SELECT e.*,c.categoryID,c.categoryname
		FROM equipment e, category c 
		WHERE e.equipmentID='$equipmentID'
		AND e.categoryID=c.categoryID
		";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_array($result);

$image1=$row['image1'];
list($width,$height)=getimagesize($image1);
$w=$width/1.5;
$h=$height/1.5;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
	 <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../admin/admin.css?<?php echo time();?>">
</head>
<body class="sub_page">
<?php include ("navbar.php") ?>

<form action="equdetails.php" method="post">
<fieldset class="product-details">
    <table class="product-table" >
        <tr>
            <td align="center" class="product-image">
                <img id="ImageGallery" src="<?php echo $ProductImage1 ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" />
                <hr>
                <img src="<?php echo $row['image1'] ?>" width="100px" height="120px" 
                    onmouseover="document.getElementById('ImageGallery').src='<?php echo $row['image1'] ?>'"/>
                <img src="<?php echo $row['image2'] ?>" width="100px" height="120px" 
                    onmouseover="document.getElementById('ImageGallery').src='<?php echo $row['image2'] ?>'"/>
                <img src="<?php echo $row['image3'] ?>" width="100px" height="120px" 
                    onmouseover="document.getElementById('ImageGallery').src='<?php echo $row['image3'] ?>'"/>
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="5px" class="details-table">
                    <tr>
                        <td>Equipment ID:</td>
                        <td><b><?php echo $row['equipmentID'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Equipment Name:</td>
                        <td><b><?php echo $row['equipmentname'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td><b><?php echo $row['color'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Brand:</td>
                        <td><b><?php echo $row['brand'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Category Name:</td>
                        <td><b><?php echo $row['categoryname'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><b><?php echo $row['price'] ?> USD</b></td>
                    </tr>
                    <tr>
                        <td>VAT:</td>
                        <td><b><?php echo $row['VAT'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Rent Quantity:</td>
                        <td>
                        	<input type="hidden" name="txtequipmentID" value="<?php echo $row['equipmentID'] ?>" />
                            <input type="text" name="txtRentQuantity" value="1" size="5" /> <br> <br>
                            <input type="submit" class="btnadd" name="btnAddtoCart" value="Add to Cart" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="product-description">
            <td colspan="2">
                <b><i>Description</i></b>
                <hr>
                <p ><?php echo $row['description'] ?></p>
            </td>
        </tr>
    </table>
</fieldset>
</form>



<!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          Dora
        </h2>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="images/i-1.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="images/i-2.jpg" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/i-3.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/i-4.jpg" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/i-5.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/i-6.jpg" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; 2019 All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        420: {
          items: 2
        },
        1000: {
          items: 5
        }
      }

    });
  </script>
  <script>
    var nav = $("#navbarSupportedContent");
    var btn = $(".custom_menu-btn");
    btn.click
    btn.click(function (e) {

      e.preventDefault();
      nav.toggleClass("lg_nav-toggle");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    });
  </script>
  <script>
    $('.carousel').on('slid.bs.carousel', function () {
      $(".indicator-2 li").removeClass("active");
      indicators = $(".carousel-indicators li.active").data("slide-to");
      a = $(".indicator-2").find("[data-slide-to='" + indicators + "']").addClass("active");
      console.log(indicators);

    })
  </script>
</body>
</html>