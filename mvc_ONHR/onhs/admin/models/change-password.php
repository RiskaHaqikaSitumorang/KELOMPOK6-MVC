<?php
session_start();
include('includes/config.php');

function changePassword($currentPassword, $newPassword, $adminId, $con) {
    $cpassword = md5($currentPassword);
    $newpassword = md5($newPassword);
    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE ID='$adminId' AND Password='$cpassword'");
    $row = mysqli_fetch_array($query);
    if ($row > 0) {
        $ret = mysqli_query($con, "UPDATE tbladmin SET Password='$newpassword' WHERE ID='$adminId'");
        return true;
    } else {
        return false;
    }
}
?>
