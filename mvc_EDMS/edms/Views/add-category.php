<?php
session_start();
include_once('../includes/config.php');
include_once("../Controllers/categoryController.php");

$categoryController = new CategoryController();

// Mendapatkan userId dari sesi jika tersedia
$createdBy = isset($_SESSION['edmsId']) ? $_SESSION['edmsId'] : null;

// Periksa apakah data dikirim melalui metode POST
if (isset($_POST['submit'])) {
    $categoryName = $_POST['categoryName'];
    // Panggil addCategory dengan dua argumen yang diperlukan
    $categoryController->addCategory($categoryName, $createdBy);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>e-Diary Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include_once('../includes/header.php'); ?>
<div id="layoutSidenav">
    <?php include_once('../includes/leftbar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add Category</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Category</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                    <form method="post">
    <div class="row mb-3">
        <label for="category" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="category" name="categoryName" placeholder="Enter category Name" required>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
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
