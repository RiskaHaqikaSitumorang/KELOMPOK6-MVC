<?php
include('change-password.php');

if (strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else {
    if (isset($_POST['change'])) {
        $currentPassword = $_POST['currentpassword'];
        $newPassword = $_POST['newpassword'];
        $adminId = $_SESSION['aid'];

        if (changePassword($currentPassword, $newPassword, $adminId, $con)) {
            echo '<script>alert("Your password successfully changed.")</script>';
        } else {
            echo '<script>alert("Your current password is wrong.")</script>';
        }
    }
}
?>
