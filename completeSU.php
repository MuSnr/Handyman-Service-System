<?php
session_start();
@include('config.php');
@include('./includes/incompletesuhead.php');
error_reporting(1);


if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from clients where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row['name'];
    
  }else{
    header('location:vendor_management.php');
    die();
  }
}
if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="UPDATE clients SET status='$status' WHERE id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from clients where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}
if(isset($_POST['update'])){
  $username=$_POST['name'];
  $email = mysqli_escape_string($conn,$_POST['email']);
  $idnum = $_POST['idnumber'];
  $exp = $_POST['exp'];
  $logid = $_SESSION['client_id'];

  //image
  $path="userdash/demo/pages/forms/images/".basename($image_name);
  
  $image_name = $_FILES["profile_pic"]["name"];
  
  $file_extension= pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
  
  $allowed_ext = array("png","jpg");
  
  if (!in_array($file_extension, $allowed_ext )){
    header("Location:updateuser.php");
    exit();
  }
  $profile_pic = rand() .$profile_pic.'.'.$file_extension;
  
  $profile_pic_tmp_name = $_FILES["profile_pic"]["tmp_name"];
  
  $target = $path . $profile_pic;
  
  move_uploaded_file($profile_pic_tmp_name, $target);
  

 

  $update_data = "UPDATE clients SET regnumber='$idnum',experience='$exp',userimage='$profile_pic' WHERE id='$logid' ";
  mysqli_query($conn,$update_data);
  if(!$update_data){
    $error[] = '<div class="alert alert-danger" role="alert">
  error saving data
</div>';

  }
  else{
    header('location:client.php');

  }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fundis|FRegistration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/fav.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <main>
    <div class="formcontainer">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-md-6 d-flex flex-column align-items-center justify-content-center">


      <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Complete Signup</h5>
              </div>
              <div class="card-body">
              <?php
          if (isset($error)) {
            foreach ($error as $error) {
              echo '<span class="login100-form-title">'.$error.'</span>';
              // code...
            };
            // code...
          };

          ?>
                <form action="" method="POST" enctype ="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>ID number</label>
                        <input type="text" name="idnumber" class="form-control" placeholder="123456789" value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Experience</label>
                        <input type="text" name = "exp" class="form-control" placeholder="experience" value="">
                      </div>
                    </div>

                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Profile Picture</label>
                        <input class="" type="file" name="profile_pic">
                      </div>
                    </div>

                    
                    
                   
                  
                  <div class="row" style="margin-top:13px;">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name = "update">Complete</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Fundis</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<style type="text/css">
  .formcontainer{
    margin-top: 120px;
  }
  
</style>

</html>