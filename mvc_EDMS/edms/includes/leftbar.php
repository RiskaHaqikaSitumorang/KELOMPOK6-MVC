<?php


include_once(__DIR__ . '/config.php');


// Periksa apakah pengguna sudah login sebelum mengakses leftbar.php
if (!isset($_SESSION["edmsid"])) {
    header('location:logout.php');
    exit; // Keluar dari skrip untuk mencegah eksekusi lebih lanjut jika pengguna belum login
}

// Dapatkan ID pengguna dari sesi untuk mengambil informasi pengguna
$id = intval($_SESSION["edmsid"]);
$query = mysqli_query($con, "SELECT * FROM tblregistration WHERE id='$id'");
while ($row = mysqli_fetch_array($query)) {
    $fullname = $row['firstName'] . " " . $row['lastName'];
}
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-category.php">Add</a>
                        <a class="nav-link" href="manage-categories.php">Manage</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Notes
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add-notes.php">Add</a>
                        <a class="nav-link" href="manage-notes.php">Manage</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Profile Setting</div>
                <a class="nav-link" href="change-password.php">
                    <div class="sb-nav-link-icon"><i class="fa fa-cog"></i></div>
                    Change Password
                </a>
                <a class="nav-link" href="my-profile.php">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    My Profile
                </a>

                <a class="nav-link" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                    Logout
                </a>
            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $fullname ?>
        </div>
    </nav>
</div>
