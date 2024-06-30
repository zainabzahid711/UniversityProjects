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
  $name = $_POST['fname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "insert into loginfo(name,email,password) values('$name','$email','$password')";


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
          <div class="navItem me-5">
            <a aria-current="page" href="">
              WELCOME
            </a>
          </div>
          <div class="navBtnMain">
            <a href="./login.php" class="home-contact">
              <button class="navbutton "> Log in </button>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- sign up  -->
  <div class="contactFormMain content">
    <div class="contactFormHeading">Signup </div>
    <form action="Signup.php" onsubmit="return isvalid()" method="post">
      <div class="inputDiv">
        <label class="lable" for="name">Name</label>
        <input class="input" id="name" name="fname" type=text placeholder="Enter your name"  />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="email">Email</label>
        <input class="input" id="email" name="email" type=email placeholder="Enter your email"  />
      </div>

      <div class="inputDiv mt-4">
        <label class="lable" for="password">Password</label>
        <input class="input" id="password" name="password" type=password placeholder="Enter your password"  />
      </div>

      <button class="navbutton login-btn" type="submit" name="submit">  Signup </button>
    </form>
  </div>
  </div>
  <script>
    function isvalid()
    {
      var name =document.form.name.value;
      var email =document.form.email.value;
      var password =document.form.password.value;
      if(name.length=="" && email.length=="" && password.length==""){
        alert(" name and email and password field is empty!");
        return false
      }
      else{
        
        if(name.length=="" ){
        alert("name  is empty!");
        return false}
      }


        if(email.length=="" ){
        alert("email  is empty!");
        return false
      }
          if(password.length=="" ){
        alert("password is empty!");
        return false
        }
      
      }
  

  </script>


  <!-- footer  -->
  <img class="rightabout " src="./assets/homepage/bg-rightHalf.png" alt="">
</body>

</html>