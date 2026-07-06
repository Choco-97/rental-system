<?php 
// Check if the user is logged in
if (isset($_SESSION['cusuname'])) {
    $username = $_SESSION['cusuname'];
} else {
    $username = null; // User is not logged in
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Dora Event Equipment Rental System</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="bootstrap.css?<?php echo time();?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />

  <style type="text/css">
    .cart-count {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 14px;
    position: absolute;
    top: -10px;
    right: -10px;
}
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="../images/Logo.png" alt="" />
            <span class="cart-count">
        </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="furniture.php"> Furniture </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="feed.php"> Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact us</a>
              </li>
            </ul>
            <div class="user_option">
    <?php if ($username): ?>
        <a href="userprofile.php">
            <img src="../images/user.png" alt="">
            <span>
                <?php echo htmlspecialchars($username); // Display the username safely ?>
            </span>
        </a>
    <?php else: ?>
        <a href="cuslogin.php">
            <img src="../images/user.png" alt="">
            <span>
                Login
            </span>
        </a>
    <?php endif; ?>
    <div class="user_option">                
        <a href="cart.php"><img src="../images/cart.png" alt=""></a>
    </div>
    <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
        <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"></button>
    </form>
</div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
        <section class="slider_section ">
      <div class="play_btn">
        <a href="">
          <img src="../images/play.png" alt="">
        </a>
      </div>
      <div class="number_box">
        <div>
          <ol class="carousel-indicators indicator-2">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3">04</li>
          </ol>
        </div>
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                        Furniture
                      </span>
                    </h1>
                    <p>
                      Our Event Equipment Furniture Rental System offers an easy way to browse and manage premium furniture rentals for any event, ensuring a seamless and efficient experience from start to finish.
                    </p>
                    <div class="btn-box">
                      <a href="furniture.php" class="btn-1">
                        Read More
                      </a>
                      <a href="contact.php" class="btn-2">
                        Contact us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="../images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                        Furniture
                      </span>
                    </h1>
                    <p>
                     Our Event Equipment Furniture Rental System offers an easy way to browse and manage premium furniture rentals for any event, ensuring a seamless and efficient experience from start to finish.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                      <a href="" class="btn-2">
                        Contact us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="../images/table.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                       Furniture
                      </span>
                    </h1>
                    <p>
                      Our Event Equipment Furniture Rental System offers an easy way to browse and manage premium furniture rentals for any event, ensuring a seamless and efficient experience from start to finish.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                      <a href="" class="btn-2">
                        Contact us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="../images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                        Furniture
                      </span>
                    </h1>
                    <p>
                      Our Event Equipment Furniture Rental System offers an easy way to browse and manage premium furniture rentals for any event, ensuring a seamless and efficient experience from start to finish.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                      <a href="" class="btn-2">
                        Contact us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="../images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  </div>
</body>
</html>
