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

  <title>DORA</title>

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
.featured-brands-slider {
    text-align: center;
    background-color: #fff;
    padding: 50px 0;
}

.featured-brands-slider h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #333;
}

.slider-container-brand{
    width: 80%;
    margin: 0 auto;
    overflow: hidden; /* Hides the overflowing content */
    position: relative;
}

.slider-brand {
    display: flex;
    width: calc(200px * 6); /* Number of brands * width */
    animation: slide 20s linear infinite; /* 20s for slow sliding */
}

.slide-brand {
    width: 200px; /* Each slide is 200px wide */
    padding: 20px;
}

.slide-brand img {
    max-width: 100%;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
}

.slide-brand img:hover {
    transform: scale(1.1);
}

@keyframes slide-brand {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}
.feedback-section {
    background-color: palegoldenrod;
    padding: 40px;
    border-radius: 20px;
    max-width: 1200px;
    margin: 20px auto;
}

.feedback-content {
    display: flex;
    align-items: center;
}

.feedback-image {
    flex: 1;
    text-align: center;
}

.feedback-image img {
    max-width: 80%;
    border-radius: 10px;
}

.feedback-text {
    flex: 2;
    color: darkgoldenrod;
    padding-left: 20px;
}

.feedback-text h2 {
    font-size: 1.8em;
    color: #4d4d4d;
    margin-bottom: 10px;
}

.feedback-text p {
    font-size: 1.2em;
    line-height: 1.6;
    margin-bottom: 20px;
}

.see-more-btn {
    padding: 10px 20px;
    background-color: #fff;
    color: #4d4d4d;
    border: 2px solid #4d9f49;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s, color 0.3s;
}

.see-more-btn:hover {
    background-color: #4d9f49;
    color: white;
}
.info-equ
{
  margin: 60px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  border: 1px solid darkgreen;
  border-radius: 20px;
  background-color:palegoldenrod;
}
.utube,#equip-intro
{
  width: 500px;
}
.utube object
{
  width: 400px;
  height: 50vh;
  margin-top: 20px;
  border-radius: 15px;
}
#equip-intro
{
  margin: 50px;
  width: 50%;
  border: 2px solid black; 
  background: radial-gradient(circle, rgba(209,204,131,1) 37%, rgba(178,109,90,1) 60%, rgba(170,144,76,1) 68%);
  padding: 10px;
  box-shadow: 43px 46px 40px -11px rgba(189,77,21,1);
  border-radius: 20px;
  font-family: monospace;
  color:#6b4410;
  font-size: 20px;
}
@media screen and (max-width: 700px)
{
  #equip-intro
  {
    margin: 0;
    margin-top: 30px;
    text-align: center;
    width: 450px;
  }
  .utube iframe
  {
    margin-left: 45px;
  }
  .info-equ
  {
    width: 100%;
    margin: 0;
  }
}
.cursor
{
  position: fixed;
  z-index: 999;
  background: darkgreen;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  pointer-events: none;
  box-shadow: 0 0 20px darkgreen;
  animation: colors 5s infinite;
  transform: translate(-50%, -50%);
  display: none;
}
@keyframes colors{
  0%{
    filter: hue-rotate(0deg);
  }
  100%{
    filter: hue-rotate(360deg);
  }
}
.cursor:before{
  content: '';
  position: absolute;
  background: red;
  width: 50px;
  height: 50px;
  opacity: 0.2;
  transform: translate(-30%,-30%);
  border-radius: 50%;
}
 #timer {
            font-size: 24px;
            margin-top: 50px;
            color: #333;
        }

        #timer h2 {
            font-size: 28px;
            color: #ff0000;
            margin-bottom: 10px;
        }
  </style>

</head>
<body>
 
 <?php include ("navbar.php") ?>



    <!--brands app
 
  <div class="live-wrap">
<div class="live-card">
<img src="images/youtube.jpg">
<div class="live-info">
<h1>Youtube Live</h1>
<p>Visit YouTube to witness our live online advertising event. Participate, earn rewards, and find out about special deals!</p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
 
    <div class="live-card">
<img src="images/twitch.png">
<div class="live-info">
<h1>Twitch Live</h1>
<p>Take part in our live participatory social media campaign on Twitch. Get involved in the discussion to win fantastic rewards!</p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
 
    <div class="live-card">
<img src="images/zoom.png">
<div class="live-info">
<h1>Zoom Live</h1>
<p>Join our ongoing push for social media safety. Get advice, exchange stories, and work to encourage internet safety collectively. </p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
</div>
 
  <div class="live-wrap">
<div class="live-card">
<img src="images/fblogo.avif">
<div class="live-info">
<h1>Facebook</h1>
<p>Join us for our Facebook-only, live internet safety campaign! Learn important advice, share personal stories, and promote internet safety together.</p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
 
    <div class="live-card">
<img src="images/xsplit.png">
<div class="live-info">
<h1>XSplit Live</h1>
<p>Watch our XSplit-powered live online social media safety campaign! Learn important lessons, share personal tales, and unite to promote internet safety.</p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
 
    <div class="live-card">
<img src="images/wire.png">
<div class="live-info">
<h1>Wirecast</h1>
<p>Participate in our live campaign for social media safety, powered by Wirecast! Take advantage of priceless advice, exchange personal tales, and work together to promote a safer online environment.  </p>
<a href="userpopularapp.php" class="read-btn">Read More</a>
</div>
</div>
</div>-->


  

  

  <!-- discount section -->

  <section class="discount_section  layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              The Latest Collection
            </h2>

            <div class="">
              <a href="shop.php">
                Rent Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="../images/discount-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end discount section -->

  <!-- favourite section -->

  <section class="brand_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          Favourite Furniture
        </h2>
      </div>
      <div class="brand_container layout_padding2">
        <div class="box">
          <a href="">
            <div class="new">
              <h5>
                New
              </h5>
            </div>
            <div class="img-box">
              <img src="../images/dining.png" alt="">
            </div>
            <div class="detail-box">
              <h6 class="price">
                $120
              </h6>
              <h6>
                Dining
              </h6>
            </div>
          </a>
        </div>
        <div class="box">
          <a href="">
            <div class="img-box">
              <img src="../images/f1.png" alt="">
            </div>
            <div class="detail-box">
              <h6 class="price">
                $140
              </h6>
              <h6>
                Chair
              </h6>
            </div>
          </a>
        </div>
        <div class="box">
          <a href="">
            <div class="img-box">
              <img src="../images/love.png" alt="">
            </div>
            <div class="detail-box">
              <h6 class="price">
                $100
              </h6>
              <h6>
                Chair
              </h6>
            </div>
          </a>
        </div>
        <div class="box">
          <a href="">
            <div class="img-box">
              <img src="../images/lovepik.png" alt="">
            </div>
            <div class="detail-box">
              <h6 class="price">
                $150
              </h6>
              <h6>
                Sofa
              </h6>
            </div>
          </a>
        </div>
      </div>
      <a href="shop.php" class="brand-btn">
        See More
      </a>
    </div>
  </section>

  <!-- end favourite section -->

<!-- trending section -->
  <section class="trending_section layout_padding">
    <div id="accordion">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Trending Categories
                </h2>
              </div>
              <div class="tab_container">
                <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  <div class="number">
                    <h5>
                      01
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      Chairs
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo">
                  <div class="number">
                    <h5>
                      02
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      Tables
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree">
                  <div class="number">
                    <h5>
                      03
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      Bads
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour"
                  aria-expanded="false" aria-controls="collapseFour">
                  <div class="number">
                    <h5>
                      04
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      Furnitures
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-3.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-4.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-3.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-4.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">

                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-4.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-3.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseFour" aria-labelledby="headingfour" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>

                  <div class="img-box">
                    <img src="images/t-4.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-3.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- end trending section -->

  <!-- client section 
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Customers Testimonial
        </h2>
      </div>
    </div>

    <div class="container">
      <div class="client_container layout_padding2">
        <div class="client_box b-1">
          <div class="client-id">
            <div class="img-box">
              <img src="../images/client-1.png" alt="" />
            </div>
            <div class="name">
              <h5>
                Emily R., 
              </h5>
              <p>
                Wedding Planner
              </p>
            </div>
          </div>
          <div class="detail">
            <p>
              "Exceptional service! Sparkle made our event planning so much easier. The furniture was high-quality, and their team was incredibly responsive. We couldn’t have asked for a smoother rental experience!"
            </p>
            <div>
              <div class="arrow_img">
              </div>
            </div>
          </div>
        </div>

        <div class="client_box b-2">
          <div class="client-id">
            <div class="img-box" style="width: 100px">
              <img src="../images/client-2.png" alt=""  />
            </div>
            <div class="name">
              <h5>
                Nina 
              </h5>
              <p>
                Event Coordinator
              </p>

            </div>
          </div>
          <div class="detail">
            <p>
             "Reliable and professional! We’ve used Sparkle for multiple events, and they never disappoint. From their seamless booking process to the quality of their rentals, Sparkle is our go-to for event equipment."
            </p>
            <div>
              <div class="arrow_img">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

      </div>
    </div>
  </section>-->

  <!-- youtube section -->
<div class="info-equ">
     <div id="equip-intro">
        <p><b>For weddings, you can find inspiration through creative décor concepts, DIY tutorials, and unique themes. Corporate events are also well-represented, with planning tips for conferences and team-building activities that ensure professionalism and engagement. If you're looking to host a party, there are countless videos showcasing innovative themes, decorations, and entertainment options for birthdays and celebrations.</b></p>
     </div> 
      <div class="utube">
         <object data="https://www.youtube.com/embed/eMD9907f-N4"></object>
     </div>
</div>

<!--feedback home page-->
<section class="feedback-section">
    <div class="feedback-content">
        <div class="feedback-image">
            <img src="../images/feed.png" alt="Feedback Illustration">
        </div>
        <div class="feedback-text">
            <h2>What our customers say about us</h2>
            <p>
                "The service was fantastic! Everything went smoothly, and the team was incredibly professional. Highly recommended!"
                <br> Give us the suggestions!
            </p>
             <a href="feed.php" class="brand-btn">
        See More
      </a>
        </div>
    </div>
</section>

<!--brand section-->
   <section class="featured-brands-slider">
        <h2>Featured Brands</h2>
        <div class="slider-container-brand">
            <div class="slider-brand">
                <div class="slide-brand">
                    <img src="../images/brand1-logo.png" alt="Brand 1">
                </div>
                <div class="slide-brand">
                    <img src="../images/brand2-logo.png" alt="Brand 2">
                </div>
                <div class="slide-brand">
                    <img src="../images/brand3-logo.png" alt="Brand 3">
                </div>
                <div class="slide-brand">
                    <img src="../images/brand4-logo.png" alt="Brand 4">
                </div>
                <div class="slide-brand">
                    <img src="../images/brand5-logo.png" alt="Brand 5">
                </div>
                <div class="slide-brand">
                    <img src="../images/brand6-logo.png" alt="Brand 6">
                </div>
                <!-- Repeat slides as needed -->
            </div>
        </div>
    </section>



  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          DORA
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
                <img src="../images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                dora@gmail.com
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
              At Sparkle Event Equipment Rental, we specialize in providing top-quality equipment to elevate any event.
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
                    <img src="../images/i-1.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="../images/i-2.jpg" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../images/i-3.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../images/i-4.jpg" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../images/i-5.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../images/i-6.jpg" alt="">
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
                <img src="../images/fb.png" alt="">
              </a>
              <a href="">
                <img src="../images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="../images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="../images/youtube.png" alt="">
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

    document.querySelector('.slider-brand').addEventListener('mouseover', function() {
    this.style.animationPlayState = 'paused';
});

document.querySelector('.slider-brand').addEventListener('mouseout', function() {
    this.style.animationPlayState = 'running';
});
  </script>

</body>

</html>