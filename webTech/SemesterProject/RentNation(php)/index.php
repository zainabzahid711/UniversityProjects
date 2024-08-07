<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "golfcards";
$port = "3307";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font family  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Nunito:wght@200;300;400;500;600;700;800;900;1000&display=swap"
    rel="stylesheet">
  <title>RentNation</title>
  <link rel="shortcut icon" href="./assets/homepage/svgs/logo.svg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="homeContainer">
  <!-- header navbar  -->
  <!-- <div> -->
  <div class="navMain">
    <div class="container">
      <nav class="navx">
        <div class=""><img class="logo head-logo" src="./assets/homepage/svgs/logo.svg" alt="" /></div>
        <div class="navItemMain navItemSubMain">
          <div class="navItem">
            <a aria-current="page" href="#">
              HOME
            </a>
          </div>
          <div class="navItem dropdown">
            <a class="head-link" href="#">Order</a>
            <div class="dropdown-content">
              <a href="orderGolfCar.php">Golf Car</a>
              <a href="beachSupplies.php">Beache Supplies</a>
              <a href="kayaks.php">Kayaks</a>
            </div>
          </div>
          <div class="navItem">
            <a href="./aboutus.php">
              ABOUT
            </a>
          </div>
          <div class="navItem">
            <a href="./contactus.php">
              CONTACT
            </a>
          </div>
          <div class="navBtnMain">
            <a href="./login.php" class="home-contact">
              <button class="navbutton">Log out</button>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>


  <!-- Hero Section  -->
  <div>
    <div class="item heroSliderMain">
      <div class="heroSliderImgMain">
        <div class="heroContentMain">
          <div class="heroConContent">
            <div class="heroSubMainHeading">
              Welcome to RentNation
            </div>
            <div class="heroMainHeading">
              Where your island adventure begins!
              <span class="heroMark">
                <img src="./assets/homepage/heroMark.png" alt="" />
              </span>
            </div>
            <div class="heroContent">
              Welcome to RentNation, where your next beach adventure
              begins! Whether you're craving a relaxing day by the
              shore or an exciting water exploration, we've got you
              covered. With our convenient rental services, you can
              choose between multiple fantastic options
            </div>
            <div class="HeroInputCon">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- orderProducts cards  -->
  <div class="order-card-Container">
    <div class="listContent">
      <h1 class="listHeading">Book Our Finest Products</h1>
      <div>Our high-quality and well-maintained inventory ensures that you'll have everything
        you need
        to make the most of your time. From beach supplies to top-of-the-line golf equipment and reliable kayaks, we
        offer a range of options to suit your preferences. </div>
    </div>
    <div class="cardorder mb-5">
      <div>
        <img class="image" src="./assets/homepage/golfCar-img2.png" />
      </div>
      <div class="cardContentO">
        <div class="headingContainer">
          <div class="headingorder">Golf Cart</div>
          <img class="favourties" src="./assets/homepage/svgs/fav-heart.svg" />
        </div>
        <div class="subHeadingContainer">
          <div class="subHeading">Experience the ultimate convenience and comfort on the golf course with our premium
            golf car rentals. </div>
          <div class="price">
            28$ per hr
          </div>
        </div>
        <div class="locationPriceOrder">
          <div class="locationDivOrder">
            <img src="./assets/homepage/svgs/location-color.svg" />
            <div class="locationPlaceOrder">Washington </div>
            <div class="locationDetailsOrder">Chambers Bay Golf Course</div>
          </div>
        </div>
        <div class="d-flex">
          <a href="./orderGolfCar.php" class="home-contact">
            <button class="button"> Book Now</button></a>
          <div class="eyeDiv">
            <img src="./assets/homepage/svgs/share.svg" />
            <img class="eyeIcon" src="./assets/homepage/svgs/eye.svg" />
            <span>321</span>
          </div>
        </div>
      </div>
    </div>
    <div class="cardorder mb-5">
      <div>
        <img class="image" src="./assets/homepage/beach-img3.png" />
      </div>
      <div class="cardContentO">
        <div class="headingContainer">
          <div class="headingorder">Beach Suppiles</div>
          <img class="favourties" src="./assets/homepage/svgs/fav-heart.svg" />
        </div>
        <div class="subHeadingContainer">
          <div class="subHeading"> Start your beach getaway with us and make the most of your time at the beach! </div>
          <div class="price">
            12$ per hr
          </div>
        </div>
        <div class="locationPriceOrder">
          <div class="locationDivOrder">
            <img src="./assets/homepage/svgs/location-color.svg" />
            <div class="locationPlaceOrder">Florida </div>
            <div class="locationDetailsOrder">Miami Beach</div>
          </div>
        </div>
        <div class="d-flex">
          <a href="./beachSupplies.php" class="home-contact">
            <button class="button"> Book Now</button></a>
          <div class="eyeDiv">
            <img src="./assets/homepage/svgs/share.svg" />
            <img class="eyeIcon" src="./assets/homepage/svgs/eye.svg" />
            <span>128</span>
          </div>
        </div>
      </div>
    </div>
    <div class="cardorder">
      <div>
        <img class="image" src="./assets/homepage/kayaks-img4.png" />
      </div>
      <div class="cardContentO">
        <div class="headingContainer">
          <div class="headingorder">Kayaks</div>
          <img class="favourties" src="./assets/homepage/svgs/fav-heart.svg" />
        </div>
        <div class="subHeadingContainer">
          <div class="subHeading"> Dive into the world of kayaking and let the water be your playground! </div>
          <div class="price">
            18$ per hr
          </div>
        </div>
        <div class="locationPriceOrder">
          <div class="locationDivOrder">
            <img src="./assets/homepage/svgs/location-color.svg" />
            <div class="locationPlaceOrder">Hawaii </div>
            <div class="locationDetailsOrder">Waikiki Beach</div>
          </div>
        </div>
        <div class="d-flex">
          <a href="./kayaks.php" class="home-contact">
            <button class="button"> Book Now</button></a>
          <div class="eyeDiv">
            <img src="./assets/homepage/svgs/share.svg" />
            <img class="eyeIcon" src="./assets/homepage/svgs/eye.svg" />
            <span>721</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Listing Section  -->
  <div class="container">
    <div class="subContainer">
      <div class="listContent">
        <div class="listHeading">Get Cars, Beaches and Kayaks on Rent</div>
        <div> Rent our finest products today and elevate your outdoor experience to new heights. Get ready for
          unforgettable moments filled with fun, relaxation, and exploration!".</div>
      </div>
      <div class="listCardContainer">
        <div class="container">
          <div class="card">
            <img class="cardImg" src="./assets/homepage/listCard1.png" />
            <span class="heading">Golf cart</span>
            <span class="listNum">150+ listings</span>
            <div class="locationDiv">
              <img src="./assets/homepage/svgs/location.svg" />
              <div class="ms-1">Washington</div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="card">
            <img class="cardImg" src="./assets/homepage/listCard2.png" />
            <span class="heading">Beache Supplies</span>
            <span class="listNum">130+ listings</span>
            <div class="locationDiv">
              <img src="./assets/homepage/svgs/location.svg" />
              <div class="ms-1">New York</div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="card">
            <img class="cardImg" src="./assets/homepage/listCard3.png" />
            <span class="heading">Kayaks</span>
            <span class="listNum">110+ listings</span>
            <div class="locationDiv">
              <img src="./assets/homepage/svgs/location.svg" />
              <div class="ms-1">New York</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Contact us area  -->

  <div class='container'>
    <div class="ContactDetails">
      <div class="leftSec">
        <div class="title">CONTACT US</div>
        <div class="subHeading">Contact us now if you have any question. Lorem ipsum dolor sit
          adipiscing elit.</div>
        <a href="./contactus.php" class="home-contact">
          <button class="button"> Contact Now</button></a>
      </div>
      <div class="border"></div>
      <div class="rightSec">
        <a href='' class="link">
          <div class='d-flex mb-lg-5 mb-3'>
            <img src="./assets/homepage/svgs/phone.svg" />
            <div class='ms-3'>+44 65748435748</div>
          </div>
        </a>
        <a href='' class="link">
          <div class='d-flex mb-lg-5 mb-3'>
            <img src="./assets/homepage/svgs/phone.svg" />
            <div class='ms-3'>contact@rentnation.com</div>
          </div>
        </a>
        <a href='' class="link">
          <div class='d-flex'>
            <img src="./assets/homepage/svgs/location.svg" />
            <div class='ms-3'>New York, NY</div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- footer  -->
  <div class="footerMain">
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-lg-3 col-md-7 col-xs-9 mb-5 mb-lg-0">
            <div class="footerLogoMain">
              <div class="footerLogo">
                <a href="#">
                  <img class="w-100" src="./assets/homepage/svgs/logo.svg" alt="" />
                </a>
              </div>
              <div class="footerDiscription">
                Explore, Discover, and Experience with RentNation. Your trusted destination for top-quality rental
                products and exceptional customer service.
              </div>
            </div>
          </div>
          <div class="col-lg-9 footerMainList">
            <div class="row">
              <div class="col-md-3 col-xs-6">
                <div class="footerMainListCon">
                  <h4 class="footerTitle">Quick Links</h4>
                  <ul class="footerList">
                    <li>
                      <a href="about.html">Cars for rent</a>
                    </li>
                    <li>
                      <a href="portofolio.html">Beach for rent</a>
                    </li>
                    <li>
                      <a href="contact.html">Kayaks for rent</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3  col-xs-6">
                <div class="footerMainListCon">
                  <h4 class="footerTitle">Menehariya</h4>
                  <ul class="footerList">
                    <li>
                      <a href="contact.html">Contact Us</a>
                    </li>
                    <li>
                      <a href="about.html">About us</a>
                    </li>
                    <li>
                      <a href="ServicesScreen.html"> Privacy Policy</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3  col-xs-6">
                <div class="footerMainListCon">
                  <h4 class="footerTitle">Trendings</h4>
                  <ul class="footerList">
                    <li>
                      <a href="about.html">About us</a>
                    </li>
                    <li>
                      <a href="contact.html">Contact</a>
                    </li>
                    <li>
                      <a href="ServicesScreen.html">Services</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-xs-6">
                <div>
                  <h4 class="footerTitle">Social MEDIA</h4>
                </div>
                <div class="footerTecMain">
                  <div class="footerTec">
                    <img src="./assets/homepage/footerSectionImg/facebook.png" alt="" />
                  </div>
                  <div class="footerTec">
                    <img src="./assets/homepage/footerSectionImg/insta.png" alt="" />
                  </div>
                  <div class="footerTec">
                    <img src="./assets/homepage/footerSectionImg/twitter.png" alt="" />
                  </div>
                </div>

                <div class="footerLangDrop">
                  <select class="footerDropMain" id="language" name="language">
                    <option class="text-dark" value="en">
                      English - En
                    </option>
                    <option class="text-dark" value="es">
                      Spanish - Sp
                    </option>
                    <option class="text-dark" value="fr">
                      French - Fr
                    </option>
                    <option class="text-dark" value="de">
                      German - Ger
                    </option>
                  </select>
                  <div class="footerDropWorldIcon">
                    <img src="./assets/homepage/svgs/footerDropIcon.svg" alt="" />
                  </div>
                  <div class="footerDropArrowIcon">
                    <img src="./assets/homepage/svgs/footerDropArrow.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center copyright">
            <p class="mb-0">© Rentnation2023</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img class="left" src="./assets/homepage/bg-leftHalf.png" alt="">
  <img class="right" src="./assets/homepage/bg-rightHalf.png" alt="">
</body>

</html>