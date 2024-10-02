<?php
@include('includes/bookheader.php');
@include 'config.php';

error_reporting(0);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from fundis where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $serv=$row['apartment_name'];
    $sprice = $row['apartment_price'];
    
  }else{
    header('serv.php');
    die();
  }
}
$servselect = "SELECT * services";
$services = array();

if(isset($_POST['makepay'])){
  $pay = $_POST['prices'];

  $update_data = "UPDATE bookings SET price='$pay' id='$id' ";
  mysqli_query($conn,$update_data);
  if(!$update_data){
    $error[] = '<div class="alert alert-danger" role="alert">
  error saving data
</div>';

  }
  else{
    header('location:fundidisplay.php');

  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="navbar-top-fixed.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function hidebook(){
        document.getElementById("modalbook").style.display="none";
        document.getElementById("payment").style.display  "block";
      }
    </script>
</head>
<body>
  
<section id="payment">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card rounded-3">
          <form action="" method="POST">
          <div class="card-body mx-1 my-2">
            <div class="d-flex align-items-center">
              <div>
                <i class="fab fa-cc-visa fa-4x text-black pe-3"></i>
              </div>
              <div>
                <p class="d-flex flex-column mb-0">
                  <b><?php echo $row['name'] ?></b><span class="small text-muted">**** 8880</span>
                </p>
              </div>
            </div>

            <div class="pt-3">
              <div class="d-flex flex-row pb-3">
                <div class="rounded border border-primary border-2 d-flex w-100 p-3 align-items-center"
                  style="background-color: rgba(18, 101, 241, 0.07);">
                  <div class="d-flex align-items-center pe-3">
                    <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel11"
                      value="" aria-label="..." checked />
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-1 small text-primary">Total amount due</p>
                    <h6 class="mb-0 text-primary"><?php echo $row['price']?></h6>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-row pb-3">
                <div class="rounded border d-flex w-100 px-3 py-2 align-items-center">
                  <div class="d-flex align-items-center pe-3">
                    <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel22"
                      value="" aria-label="..." />
                  </div>
                  <div class="d-flex flex-column py-1">
                    <p class="mb-1 small text-primary">Other amount</p>
                    <div class="d-flex flex-row align-items-center">
                      <h6 class="mb-0 text-primary pe-1">$</h6>
                      <input name="prices" type="text" value="<?php echo $row['payment']?>" class="form-control form-control-sm" id="numberExample"
                        style="width: 55px;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pb-1">
              <?php
                
                
                echo "<a class='btn btn-lg btn-danger' href='?type=delete&id=".$row['id']."'>Cancel</a>";
                
                ?>
              <button type="button" name="makepay" class="btn btn-primary btn-lg">Proceed</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</section>


</body>
<style type="text/css">
  body{
    background: url(images/mac.jpg);
    background-position: center;
    background-repeat: none;
    background-size: cover;
  }
</style>
</html>