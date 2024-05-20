<?php
// update-nurse-profile-pic.php

session_start();
include('includes/config.php');
include('model.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $editid = intval($_GET['lid']);
        $currentpic = $_POST['currentprofilepic'];
        $profilepic = $_FILES["profilepic"]["name"];
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        $result = updateNurseProfilePic($editid, $currentpic, $profilepic, $allowed_extensions, $con);
        echo "<script>alert('$result');</script>";
        echo "<script type='text/javascript'> document.location = 'manage-nurse.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Nurse Hiring System  | Update Nurse Profile Pic</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once("includes/navbar.php");?>
  <!-- Main Sidebar Container -->
  <?php include_once("includes/sidebar.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Nurse Profile Pic</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Update Nurse Profile Pic</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile Picture</h3>
              </div>
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php
                  $editid=intval($_GET['lid']);
                  $query=mysqli_query($con,"select ProfilePic,ID from tblnurse where ID='$editid'");
                  while($result=mysqli_fetch_array($query)) {
                  ?>
                  <div class="form-group">
                    <label for="exampleInputFullname">Current Profile Pic</label>
                    <img src="images/<?php echo $result['ProfilePic']?>" width="200">
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <label for="exampleInputFile">New Profile Pic <span style="font-size:12px;color:red;">(Only jpg / jpeg/ png /gif format allowed)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="currentprofilepic" value="<?php echo $result['ProfilePic'];?>">
                        <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer" align="center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');?>
</div>
<!-- ./wrapper -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
$(function () {
  $('.select2').select2()
  $('.select2bs4').select2({ theme: 'bootstrap4' })
});
</script>
</body>
</html>
