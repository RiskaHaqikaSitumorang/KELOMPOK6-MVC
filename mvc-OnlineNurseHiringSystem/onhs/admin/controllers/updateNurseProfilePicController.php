<?php
// controller.php

session_start();
include('includes/config.php');
include('modelupdateNurseProfilePic.php');

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
