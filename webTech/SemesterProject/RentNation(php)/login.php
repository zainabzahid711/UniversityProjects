<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$con = mysqli_connect("localhost:3307","root","","signup_login");

//connection 

if(mysqli_connect_errno()){
  die("connection failed" . mysqli_connect_error());
}

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "insert into loginfo(email,password) values('$email','$password')";


  $result = mysqli_query($con, $sql);

  if ($result) {
      header("Location: index.php");
      exit(); 
  } else {
      echo "Error: " . mysqli_error($con);
  }

}
mysqli_close($con);
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
          <div class="navBtnMain">
            <a href="./Signup.php" class="home-contact">
              <button class="navbutton "> Signup </button>
            </a>
          </div>

        </div>
      </nav>
    </div>
  </div>

  <!-- login  -->
  <div id="form" class="contactFormMain content">
    <div class="contactFormHeading">Login </div>
    <form name="form" action="login.php" onsubmit="return isvalid()" method="post">
      <div class="inputDiv mt-4">
        <label class="lable" for="email">Email</label>
        <input class="input" id="email" name="email" type=email placeholder="Enter your email" />
      </div>
      <div class="inputDiv mt-4">
        <label class="lable" for="password">Password</label>
        <input class="input" id="password" name="password"  type=password placeholder="Enter your password"  />
      </div>
      <button class="navbutton login-btn" type="submit" id="btn" value="Login" name="submit">login 
          </button>
    </form>
  </div>
  </div>
  <script>
    function isvalid(){
      var email =document.form.email.value;
      var password =document.form.password.value;
      if(email.length=="" && password.length==""){
        alert("email and password field is empty!");
        return false
      }
      else{
        if(email.length=="" ){
        alert("email  is empty!");
        return false}
      }
      if(password.length=="" ){
        alert("password is empty!");
        return false
        }

    }
  </script>

  <br><br>
  <div class="text-center text-white">Don't have an Account?</div>   <h5>Signup</h5> 


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
                      <a href="portfolio.html">Beach for rent</a>
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
  <img class="rightabout " src="./assets/homepage/bg-rightHalf.png" alt="">
</body>

</html>