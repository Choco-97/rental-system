<?php 
    include("dbconnect.php");  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $type = trim($_POST['feedback-type']);
    $comments = trim($_POST['comments']);

    // Form validation
    if (empty($name)) {
        echo "You must enter a name.";
    } else if (empty($email)) {
        echo "You must enter an email.";
    } else if (empty($type)) {
        echo "You must select the feedback-type.";
    } else if (empty($comments)) {
        echo "You must enter a message.";
    } else {
        // Insert into contact without checking for duplicate names
        $sql = "INSERT INTO feed (name, email, type, feed) VALUES ('$name', '$email', '$type', '$comments')";
        if (mysqli_query($connection, $sql)) {
            echo "<script>
                    alert('Thank you for your Feedback!');
                    window.location.href='feed.php';
                  </script>";
        } else {
            echo "Insertion error.<br>";
        }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>

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
  	.feedback-form-section {
    background-color: lightgoldenrodyellow;
    padding: 40px;
    border-radius: 20px;
    max-width: 600px;
    margin: 20px auto;
    color: #333;
}

.feedback-form h2 {
    text-align: center;
    color: #4d4d4d;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: darkgoldenrod;
}

.form-group textarea {
    resize: none;
}

.submit-btn {
    padding: 10px 20px;
    background-color: #fff;
    color: #4d4d4d;
    border: 2px solid #4d9f49;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s, color 0.3s;
    display: block;
    margin: 0 auto;
}

.submit-btn:hover {
    background-color: #4d9f49;
    color: white;
}
  </style>
</head>
<body>
 <?php include ("navbar.php") ?>
<!--Customers Testimonial-->
<h1 class="safe-header">Customers Testimonial</h1>
<div class="safe-container">
<div class="safe-test">
<div class="safe-text">
<div class="safe-descp">
<span>Exceptional service!</span>
<i class="fa-solid fa-quote-left"></i>
<p>
            "Sparkle made our event planning so much easier. The furniture was high-quality, and their team was incredibly responsive. We couldn’t have asked for a smoother rental experience!  – Emily R., Wedding Planner
</p>
</div>
 
        <div class="safe-descp active-descp">
<span>Sparkle exceeded our expectations!</span>
<i class="fa-solid fa-quote-left"></i>
<p>
            "The selection of equipment was fantastic, and everything arrived on time and in perfect condition. They truly helped make our corporate event a success." – James M., Event Organizer     
</p>
</div>
 
        <div class="safe-descp">
<span>Reliable and professional!</span>
<i class="fa-solid fa-quote-left"></i>
<p>
            "We’ve used Sparkle for multiple events, and they never disappoint. From their seamless booking process to the quality of their rentals, Sparkle is our go-to for event equipment." – Sophia L., Event Coordinator    
</p>
</div>
 
        <div class="safe-descp">
<span>Amazing experience from start to finish! </span>
<i class="fa-solid fa-quote-left"></i>
<p>
            "The team at Sparkle was incredibly helpful in recommending the right equipment for our event. Everything was delivered perfectly, and the setup looked stunning!" – David S., Corporate Event Planner     
</p>
</div>
 
        <div class="safe-descp">
<span>Truly impressive service! </span>
<i class="fa-solid fa-quote-left"></i>
<p>
            "Sparkle made the entire rental process stress-free. The equipment was pristine, and their attention to detail ensured our event looked fantastic. We’ll definitely be using them again!" – Olivia K., Event Designer"    
</p>
</div>
</div>
<div class="safe-icon">
<img src="../images/trade.png" class="pin" onclick="showReview()">
<img src="../images/trade.png" class="pin active-icon" onclick="showReview()">          
<img src="../images/trade.png" class="pin" onclick="showReview()">
<img src="../images/trade.png" class="pin" onclick="showReview()">
<img src="../images/trade.png" class="pin" onclick="showReview()">
</div>
</div>
</div>


<!--feedback form-->
<section class="feedback-form-section">
    <h2>We Value Your Feedback!</h2>
    <form class="feedback-form" action="feed.php" method="post">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" style="background: darkgoldenrod;" required>
        </div>
        
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="feedback-type">Feedback Type:</label>
            <select id="feedback-type" name="feedback-type" required>
                <option value="">Select an option</option>
                <option value="compliment">Compliment</option>
                <option value="suggestion">Suggestion</option>
                <option value="issue">Issue</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comments">Your Feedback:</label>
            <textarea id="comments" name="comments" rows="4" required></textarea>
        </div>

        <button type="submit" class="submit-btn">Submit Feedback</button>
    </form>
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
  let safeDescps = document.getElementsByClassName("safe-descp")
  let safeIcons = document.getElementsByClassName("pin")
 
  function showReview()
  {
    for(safeIcon of safeIcons)
    {
      safeIcon.classList.remove("active-icon");
    }
    for(safeDescp of safeDescps)
    {
      safeDescp.classList.remove("active-descp");
    }
    let i = Array.from(safeIcons).indexOf(event.target);
    safeIcons[i].classList.add("active-icon");
    safeDescps[i].classList.add("active-descp");
  }
</script>
</body>
</html>