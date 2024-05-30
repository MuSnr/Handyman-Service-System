<?php
@include('./config.php');
session_start();
$_SESSION['bookid'] = $_row['id'];
$bkid = $_SESSION['bookid'];
$collect = "SELECT username,price,service FROM bookings WHERE id ='$bookid'";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fundis - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script type="text/javascript">
    function confirmcancel(){
      var result = confirm("You are logging out.Are you sure you want to continue ?");
      if (!result) {
        event.preventDefault();
        }
        else{
          location.href = "logout.php";
        }
  // go to page in a tag's href when user choose 'OK'
}
  </script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.11.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top bg-dark ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="client.php">Fundis</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="client.php"><i class="bi bi-house"></i>Home</a></li>
          <li><a class="nav-link scrollto" href="viewbookings.php"><i class="bi bi-speedometer2"></i> My Bookings</a></li>
          <li><a class="nav-link scrollto" href="fundidisplay.php"></i><i class="bi bi-ticket-detailed"></i>Services</a></li>
          
          
          <li><a onclick="confirmcancel()" class="nav-link scrollto" href="./logout.php"><i class="bi bi-box-arrow-in-left"></i> Logout</a></li>
          <li><a href="./userdash/demo/pages/forms/viewuser.php" class="logo me-auto"><img src="./userdash/demo/pages/forms/images/<?=$row['userimage']; ?>" alt="" style="border-radius: 50%;width:30px;height: 30px;margin-left: 10px;border: 1px solid blue;" class="img-fluid"></a></li>
          <!--<li><a class="getstarted scrollto" href="#about">Get Started</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
</body>
<style type="text/css">
  h1{
    top: 120px;
  }
</style>
</html>