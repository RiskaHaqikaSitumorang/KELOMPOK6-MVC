<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Nurse Hiring System | Update/Edit Nurse</title>
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
  <?php include_once("includes/navbar.php");?>
  <?php include_once("includes/sidebar.php");?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update/Edit Nurse</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Update/Edit Nurse</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <?php if($nurse) { ?>
    <section class="content">
      <div class="container-fluid">
        <h5 style="color:red"><?php echo $nurse['Name']; ?>'s Profile</h5>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Personal Info</h3>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $nurse['Name']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" required>
                      <option value="<?php echo $nurse['Gender']; ?>"><?php echo $nurse['Gender']; ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="emailid">Email address</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" required value="<?php echo $nurse['Email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="mobilenumber">Mobile Number</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" pattern="[0-9]{10}" title="10 numeric characters only" required value="<?php echo $nurse['MobileNo']; ?>" maxlength="10">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" required><?php echo $nurse['Address']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required value="<?php echo $nurse['City']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state" required value="<?php echo $nurse['State']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="languagesknown">Languages Known <span style="font-size:12px;">(Separate by comma, e.g., English, Hindi)</span></label>
                    <input type="text" class="form-control" id="languagesknown" name="languagesknown" required value="<?php echo $nurse['LanguagesKnown']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Pic</label>
                    <img src="images/<?php echo $nurse['ProfilePic']; ?>" width="120">
                    <a href="update-nurse-pic.php?lid=<?php echo $nurse['ID']; ?>">Update Profile Pic</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Professional Info</h3>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="experience">Nursing Experience (in years)</label>
                    <input type="text" class="form-control" id="experience" name="experience" pattern="[0-9]+" title="2 numeric characters only" maxlength="2" required value="<?php echo $nurse['NursingExp']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="certificate">Nursing Certificate (if any) <span style="font-size:12px;">(Separate by comma, e.g., High Court, Supreme Court)</span></label>
                    <input type="text" class="form-control" id="certificate" name="certificate" value="<?php echo $nurse['NursingCertificate']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="description">Education Description (if Any)</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?php echo $nurse['EducationDescription']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="regdate">Profile Reg. Date</label>
                    <input type="text" class="form-control" id="regdate" name="regdate" readonly value="<?php echo $nurse['CreationDate']; ?>">
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
  </div>
  <?php include_once('includes/footer.php'); ?>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
  $('.select2').select2();
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
});
</script>
</body>
</html>
