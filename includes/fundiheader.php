<?php
@include('./config.php');
session_start();
$logid = $_SESSION['fundi_id'];
$collect = "SELECT * FROM fundis WHERE id = '$logid'";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);

  //count notifications
  $book = "SELECT count(*) FROM bookings WHERE fundiname = '{$_SESSION['fundi_name']}' && status = 1";
$countbk = mysqli_query($conn,$book);

//count bookings
while($row= mysqli_fetch_array($countbk)){
  $bookcount = $row['count(*)'];
}
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

      <h1 class="logo me-auto"><a href="fundipage.php">Fundis</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="fundipage.php"><i class="bi bi-house"></i>Home</a></li>
          <li><a class="nav-link scrollto" href="./fundidash/index.php"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
          <li><a class="nav-link scrollto" href="fundidash/demo/pages/forms/viewbookings.php"><i class="bi bi-chat-text"></i> Bookings <?php echo $bookcount?></a></li>
          
          
          <li><a class="nav-link scrollto" href="./logout.php"><i class="bi bi-box-arrow-in-left"></i>Logout</a></li>
          <li><a href="./fundidash/demo/pages/forms/viewfundi.php" class="logo me-auto"><img src="./fundidash/demo/pages/forms/images/<?=$row['userimage']; ?>" alt="" style="border-radius: 50%;width:30px;height: 30px;margin-left: 10px;border: 1px solid blue;" class="img-fluid"></a></li>
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
  i{
    font-size: 24px;
  }
</style>
</html>