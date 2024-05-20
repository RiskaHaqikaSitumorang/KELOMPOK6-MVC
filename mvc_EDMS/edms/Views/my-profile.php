<?php 
session_start();
include_once('../includes/config.php');
include_once('../Controllers/userController.php');

if(strlen($_SESSION["edmsid"]) == 0) {   
    header('location:logout.php');
} else {
    $controller = new UserController();

    if(isset($_SESSION['message'])) {
        echo "<script>alert('" . $_SESSION['message'] . "');</script>";
        unset($_SESSION['message']);
    }

    $id = intval($_SESSION["edmsid"]);
    $user = $controller->getUserModel()->getUserById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>e-Diary Management System </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once('../includes/header.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('../includes/leftbar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col-3">First name</div>
                                    <div class="col-4"><input type="text" value="<?php echo htmlentities($user['firstName']); ?>" name="fname" class="form-control" required></div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-3">Last Name</div>
                                    <div class="col-4"><input type="text" value="<?php echo htmlentities($user['lastName']); ?>" name="lname" class="form-control" required></div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-3">Email id</div>
                                    <div class="col-4"><input type="text" value="<?php echo htmlentities($user['emailId']); ?>" name="emailid" class="form-control" readonly></div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-3">Mobile Number</div>
                                    <div class="col-4"><input type="text" value="<?php echo htmlentities($user['mobileNumber']); ?>" name="mobileno" class="form-control" readonly></div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-3">Reg. Date</div>
                                    <div class="col-4"><input type="text" value="<?php echo htmlentities($user['regDate']); ?>" name="regdate" class="form-control" readonly></div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-7" align="center"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once('../includes/footer.php'); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
<?php } ?>
