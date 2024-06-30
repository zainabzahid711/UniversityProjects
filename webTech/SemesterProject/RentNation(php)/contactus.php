<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit']))
{
 $name = $_POST['name'];
 $email = $_POST['email'];  
 $message = $_POST['msg'];
 
 // Database connection details
 $servername = "127.0.0.1";
 $username = "root";
 $password = "";
 $dbname = "emaildata";
 $port = "3307"; // Specify the port

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname, $port);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // Insert data into the database
 $sql = "INSERT INTO emails (name, email, message) VALUES ('$name', '$email', '$message')";

 if ($conn->query($sql) === TRUE) {
     echo "Data inserted successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 // Close the database connection
 $conn->close();







require 'PHPMailer/PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';
 $mail = new PHPMailer(true);
 try {                      
     $mail->isSMTP();                                            
     $mail->Host       = 'smtp.gmail.com';                    
     $mail->SMTPAuth   = true;                                   
     $mail->Username   = 'zynabzahid877@gmail.com';                
     $mail->Password   = 'zyNabDelL&&$%';                               
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
     $mail->Port       = 465;                                    
     $mail->setFrom('f2022105062@umt.edu.pk', 'burhan');
     $mail->addAddress('zynabzahid877@gmail.com', 'admin');        
     $mail->isHTML(true);                                  
     $mail->Subject = 'Test mail';
     $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> message - $message";
 $mail->send();
 ?>
 <script>
  alert("Mail has been sent")
 </script>;
 <?php
 } catch (Exception $e) {
 ?>
  <script>
  alert("Send")
 </script>;
  <?php
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
            <a href="#">
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

  <!-- Contact US  -->
  <div class="contactFormMain content">
    <div class="contactFormHeading">Contact Us</div>
    <form action="contactus.php" method="post">
      <div class="inputDiv">
        <label class="lable" for="name">Full Name</label>
        <input class="input" id="name" name="name" type=text placeholder="Enter your name" />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="email">Email</label>
        <input class="input" id="email" name="email" type=email placeholder="Enter your email" />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="message">Message</label>
        <input class="input" id="message" name="msg" type=text placeholder="your message" />
      </div>

      <button class="navbutton submit-contact " type="submit" name="submit"> Submit</button>
    </form>
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
  <img class="rightabout contactbg" src="./assets/homepage/bg-rightHalf.png" alt="">
</body>

</html>