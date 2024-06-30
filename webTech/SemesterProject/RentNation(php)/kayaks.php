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
  <div class="navMain">
    <div class="container">
      <nav class="navx">
        <div class=""><img class="logo head-logo" src="./assets/homepage/svgs/logo.svg" alt="" /></div>
        <div class="navItemMain navItemSubMain">
          <div class="navItem">
            <a aria-current="page" href="./index.php">
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
            <a href="contactus.php">
              CONTACT
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- Contact US  -->
  <div class="order-content text-center mb-5 headc">
    <h1>Our Kayaks</h1>
    <p>"Experience the thrill of kayaking with our premium kayak rentals. Whether you're a novice or an experienced
      paddler, our kayaks are perfect for exploring waterways and enjoying the beauty of nature. Glide through calm
      lakes, navigate through winding rivers, or brave the waves of the ocean. Our kayaks are designed for stability,
      maneuverability, and comfort, providing you with a safe and enjoyable paddling experience. With our wide selection
      of kayaks, you can choose the perfect model for your adventure, whether it's a solo excursion or a fun-filled
      outing with friends and family. Rent a kayak from us and embark on an exhilarating journey, discovering hidden
      coves, encountering wildlife, and creating lifelong memories. Dive into the world of kayaking and let the water be
      your playground!"</p>
  </div>
  <div class="width-adjust contactFormMain content content-check">

    <div class="kayaks-sold">
      <span class="sorry">Sorry! </span> Product unavailable
    </div>
  </div>
  <h1 class="text-center mb-5 headc">Here's a view of our Some Products</h2>
    <div class=" container services-display">
      <img src="./assets/homepage/kayaks-img1.png" alt="">
      <img src="./assets/homepage/kayaks-img3.png" alt="">
      <img src="./assets/homepage/kayaks-img4.png" alt="">
    </div>
    </div>
    <!-- <img class="left" src="./assets/homepage/bg-leftHalf.png" alt=""> -->
    <img class="right" src="./assets/homepage/bg-rightHalf.png" alt="">

</body>
<script>
  function redirectToConfirm() {
    window.location.href = "./confirm.html";
  }
</script>

</html>