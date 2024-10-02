<?php
@include('config.php');
@include('includes/clientheader.php');
//$logid = $row['fundi_id'];
$collect = "SELECT * FROM fundis WHERE status = 1";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DisplayFundi</title>
	<link href="assets/img/fav.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
  
</head>
<body class="finderbody text-center">
	<div class="s-bar">
	<a href="searchfundi.php" class="btn btn-primary btn-lg btn-get-started btn-rounded scrollto"><i class="bi bi-search"></i>  Find Fundi manually</a>
	
</div>

<div class="row pt-5" id="cards">

<?php
        
        $query_command = "SELECT * FROM fundis WHERE status = 1";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
            $a++;
            
            ?>


	<div class="card">
		
		
			<div class="card-image">
				<img src="fundidash/demo/pages/forms/images/<?=$row['userimage']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
			</div>
      <div class="namer card-title"><?php echo $row['name'];?></div>
      <div><strong> <?php echo $row['service']?></strong></div>
			<div>Experience: <?php echo $row['experience']?></div>
      <strong><div>Price from: <?php echo $row['payment']?></div></strong>
		
		<div class="divider">
			<?php echo "<a class='btn btn-small btn-primary' href='booking.php?id=".$row['id']."'>Book</a>&nbsp;";?>
		</div>
  </div>
	
	<?php
        }
      }

        ?>
</div>
 
  
</body>

<style type="text/css">
  *{
    font-family: sans-serif;
  }
  .s-bar{
    margin-top: 80px;
    
    position: relative;
  }
  .namer{
    font-weight: bold;
  }
  .divider{
    margin-top: 9px;
  }
  
  .btn-search{
  	margin-left: -30px;
  	position: absolut9pxe;
  	outline: none;
  	font-size: 15px;
  	border: 0;
  	
  	border-radius: 80px;
  }
  .cname{
    color: red;
  }
  .footer-top{
    margin-top: 87px;
    width: 100%;
  }
  .card{
  	max-height: 400px;
  	width: 200px;
    border: 1px solid #f9f9f9;
    box-shadow: 6px 8px 12px lightgrey;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    padding: 15px;
  	color: black;
    font-family: sans-serif;

  }
  .card img{
    border-radius: 6px;
    width: 100%;
    height: 100%;
  }
  .card-image{
    height: 150px;
  }
  .row{
  	justify-content: space-evenly;

  }
  span{
    color: #0d6efd;
  }
  body{
  	margin-left: 120px;
  	margin-right: 120px;
  }
</style>
</html>