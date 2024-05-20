<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Nurse Hiring System | Add Nurse</title>
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once("includes/navbar.php"); ?>
        <!-- Main Sidebar Container -->
        <?php include_once("includes/sidebar.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Nurse</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Nurse</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Personal Info</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form name="addnurse" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Full Name -->
                                        <div class="form-group">
                                            <label for="exampleInputFullname">Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Nurse Full Name" required>
                                        </div>
                                        <!-- Gender -->
                                        <div class="form-group">
                                            <label for="exampleInputFullname">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Choose Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" required>
                                        </div>
                                        <!-- Mobile Number -->
                                        <div class="form-group">
                                            <label for="text">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" pattern="[0-9]{10}" maxlength="10" title="10 numeric characters only" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="form-group">
                                            <label for="exampleInputCity">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                                        </div>
                                        <!-- City -->
                                        <div class="form-group">
                                            <label for="exampleInputCity">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                                        </div>
                                        <!-- State -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">State</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
                                        </div>
                                        <!-- Languages Known -->
                                        <div class="form-group">
                                            <label for="text">Languages known <span style="font-size:12px;">(Languages should be separated by comma(,) Ex: English, Hindi )</span></label>
                                            <input type="text" class="form-control" id="languagesknown" name="languagesknown" placeholder="Languages known" required>
                                        </div>
                                        <!-- Profile Pic -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Profile Pic <span style="font-size:12px;color:red;">(Only jpg / jpeg/ png /gif format allowed)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <div class="col-md-6">
                            <!-- Form Element sizes -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Professional Info</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Nursing Experience -->
                                    <div class="form-group">
                                        <label for="text">Nursing Experience (in years)</label>
                                        <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter Experience" pattern="[0-9]" title="2 numeric characters only" maxlength="2" required>
                                    </div>
                                    <!-- Nursing Certificate -->
                                    <div class="form-group">
                                        <label for="text">Nursing Certificate(if any) <span style="font-size:12px;">(Should be separated by comma(,) )</span></label>
                                        <input type="text" class="form-control" id="certificate" name="certificate" placeholder="Certificate">
                                    </div>
                                    <!-- Education Description -->

                                    <div class="form-group">
                                        <label for="text">Education Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once('includes/footer.php'); ?>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
</body>

</html>