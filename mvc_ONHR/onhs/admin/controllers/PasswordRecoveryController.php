<?php
include('includes/config.php');
include('models/PasswordRecovery.php');

if (isset($_POST['resetpwd'])) {
    $uname = $_POST['username'];
    $mobile = $_POST['mobileno'];
    $newpassword = md5($_POST['newpassword']);
    $result = resetPassword($uname, $mobile, $newpassword, $con);
    echo "<script>alert('$result');</script>";
}
?>
