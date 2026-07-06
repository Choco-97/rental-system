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
  <link rel="stylesheet" type="text/css" href="../admin/admin.css?<?php echo time();?>">

  <style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    line-height: 1.6;
}

.our-process {
    padding: 50px;
    text-align: center;
    background-color: #fff;
}

.process-header h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 10px;
}

.process-header p {
    font-size: 18px;
    color: #555;
    margin-bottom: 40px;
}

.process-steps h2 {
    font-size: 28px;
    margin-bottom: 30px;
}

.steps-grid {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.step {
    flex: 1;
    max-width: 250px;
    background-color: #f7f5e6; /* Pale gold background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s;
    display: flex;            /* Ensure flexbox is used */
    flex-direction: column;   /* Stack items vertically */
    align-items: center;      /* Center align the items */
}

.step:hover {
    transform: translateY(-5px);
}

.icon img {
    width: 50px;
    margin-bottom: 20px;
}

.step h3 {
    font-size: 22px;
    color: #5f259f; /* Purple color */
    margin-bottom: 10px;
}

.step p {
    font-size: 16px;
    color: #666;
    margin-top: 10px;
    text-align: center;
}
.step:hover {
    background-color: #fff0cc; /* Slightly brighter pale gold on hover */
    cursor: pointer;
}
@media (max-width: 768px) {
    .steps-grid {
        flex-direction: column;
        align-items: center;
    }

    .step {
        margin-bottom: 20px;
        max-width: 300px;
    }
}
.our-history {
    padding: 50px;
    background-color: #fff5e6; /* Light pale gold background */
    text-align: center;
}

.history-header h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 10px;
}

.history-header p {
    font-size: 18px;
    color: #555;
    margin-bottom: 40px;
}

.history-timeline {
    display: flex;
    flex-direction: column;
    gap: 20px;
    max-width: 800px;
    margin: 0 auto;
}

.history-event {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: left;
    transition: transform 0.3s;
}

.history-event:hover {
    transform: translateY(-5px);
}

.year {
    font-size: 24px;
    font-weight: bold;
    color: #5f259f; /* Purple color for years */
    min-width: 100px;
}

.event-details h3 {
    font-size: 22px;
    color: #333;
    margin-bottom: 10px;
}

.event-details p {
    font-size: 16px;
    color: #666;
}

@media (max-width: 768px) {
    .history-timeline {
        flex-direction: column;
    }

    .history-event {
        flex-direction: column;
        align-items: flex-start;
    }

    .year {
        font-size: 20px;
    }

    .event-details h3 {
        font-size: 20px;
    }
}
  </style>
</head>

<body class="sub_page">
 <?php include ("navbar.php") ?>


<!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>

            </div>
            <p>
              At Sparkle Event Equipment Rental, we specialize in providing top-quality equipment to elevate any event. From stylish furniture to essential event tools, we offer a wide selection tailored to meet your unique needs. Our seamless rental process ensures convenience, flexibility, and reliability, making event planning easier and more efficient. Whether it's a corporate gathering, wedding, or private party, Sparkle is dedicated to helping you create memorable experiences with the right equipment at the right time.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="../images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

<!--about us-->
<section class="our-process">
    <div class="process-header">
        <h2>Our Mission</h2>
        <p>Provide Premium Rental Products for Any Event with World-Class Service</p>
    </div>
    
    <div class="process-steps">
        <h2>Our Proven Process</h2>
        <div class="steps-grid">
            <div class="step">
                <div class="icon">
                    <img src="../images/discover.png" alt="Discover Icon">
                </div>
                <h3>DISCOVER</h3>
                <p>Our team will take the time to understand your vision and deliver what you want.</p>
            </div>
            
            <div class="step">
                <div class="icon">
                    <img src="../images/icon1.png" alt="Design Icon">
                </div>
                <h3>DESIGN</h3>
                <p>We design layouts and mood boards that maximize the flow of each space.</p>
            </div>

            <div class="step">
                <div class="icon">
                    <img src="../images/icon2.png" alt="Deliver Icon">
                </div>
                <h3>DELIVER</h3>
                <p>Our friendly team ensures accuracy and avoids delays, providing you peace of mind.</p>
            </div>

            <div class="step">
                <div class="icon">
                    <img src="../images/icon3.png" alt="Delight Icon">
                </div>
                <h3>DELIGHT</h3>
                <p>We guarantee satisfaction and ensure your event is a delightful experience.</p>
            </div>
        </div>
    </div>
</section>

<!--history-->
<section class="our-history">
    <div class="history-header">
        <h2>Our History</h2>
        <p>Discover our journey from the beginning to becoming a leader in event rentals and services.</p>
    </div>
    
    <div class="history-timeline">
        <div class="history-event">
            <div class="year">2010</div>
            <div class="event-details">
                <h3>Foundation</h3>
                <p>Our company was founded in 2010 with a vision to provide premium event rental services, starting with a small but dedicated team of professionals.</p>
            </div>
        </div>
        
        <div class="history-event">
            <div class="year">2015</div>
            <div class="event-details">
                <h3>Expansion</h3>
                <p>By 2015, we had expanded to offer a wider range of products and services, catering to both small gatherings and large corporate events.</p>
            </div>
        </div>

        <div class="history-event">
            <div class="year">2020</div>
            <div class="event-details">
                <h3>Innovation & Growth</h3>
                <p>We embraced new technologies and introduced custom design and layout services, elevating the customer experience with personalized event solutions.</p>
            </div>
        </div>

        <div class="history-event">
            <div class="year">Present</div>
            <div class="event-details">
                <h3>Today</h3>
                <p>Now a leading name in the industry, we continue to deliver exceptional service and high-quality products for every occasion, large or small.</p>
            </div>
        </div>
    </div>
</section>

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          Digitf
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
         &copy; 2024 This Website was developed by ACMA Not Commercial Website only Educational Purpose.
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
</body>

</html>