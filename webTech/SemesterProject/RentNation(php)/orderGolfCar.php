<?php
session_start();
$con = mysqli_connect("localhost:3307","root","","golfcards");
if(isset($_POST['submit'])){
  $name = $_POST['fname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $product = $_POST['product'];
  $quantity= $_POST['quantity'];
  $time = $_POST['time'];

  $sql = "insert into ordercard_services(name,email,address,product,quantity,time) values('$name','$email','$address','$product','$quantity','$time')";

  $result= mysqli_query($con,$sql);
  if($result){
    echo "data inserted";
  }
  else{
    echo "not inserted";
  }
}
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
    <h1>Our Glof Cars</h1>
    <p>"Experience the ultimate convenience and comfort on the golf course with our premium golf car rentals. Whether
      you're a seasoned golfer or a casual player, our fleet of top-quality golf cars is ready to enhance your golfing
      experience. From sleek and stylish models to eco-friendly options, we offer a range of golf cars to suit your
      preferences. Enjoy the freedom to navigate the course with ease, allowing you to focus on your game and make the
      most of every swing. Rent a golf car from us today and elevate your golfing adventure to new heights."</p>
  </div>
  <div class="contactFormMain content content-check">
    <div class="contactFormHeading">Order Now</div>
    <form action="orderGolfCar.php" method="post">
      <div class="inputDiv">
        <label class="lable" for="name">Full Name</label>
        <input class="input" id="name" name="fname" type=text placeholder="Enter your name" />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="email">Email</label>
        <input class="input" id="email" name="email" type=email placeholder="Enter your email" />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="address">Address</label>
        <input class="input" id="address" name="address" type=text placeholder="Enter your Address" />
      </div>
      <div class="inputDiv mt-4">
        <label class="lable" for="product">Product</label>
        <input class="input" id="product" name="product" type=text value="Golf Cart" readonly />
      </div>
      <div class="inputDiv mt-4">
        <label class="lable" for="quantity">Quantity</label>
        <input class="input" id="quantity" name="quantity" type=number placeholder="Enter your Quantity" />
      </div>
      <div class="inputDiv mt-4">
        <label class="lable" for="time">Time Duration ( 28$/hr )</label>
        <input class="input" id="time" name="time" type=number placeholder="i.e 4hrs" />
      </div>
      <button class="navbutton submit-contact " type="submit" name="submit"> Order Confirm</button>

    </form>
  </div>
  <h1 class="text-center mb-5 headc">Here's a view of our Some Products</h2>
    <div class=" container services-display">
      <img src="./assets/homepage/golfCar-img1.png" alt="">
      <img src="./assets/homepage/golfCar-img2.png" alt="">
      <img src="./assets/homepage/golfCar-img3.png" alt="">
    </div>
    </div>
    <img class="left" src="./assets/homepage/bg-leftHalf.png" alt="">
    <img class="right" src="./assets/homepage/bg-rightHalf.png" alt="">

</body>
<script>
</script>

</html>