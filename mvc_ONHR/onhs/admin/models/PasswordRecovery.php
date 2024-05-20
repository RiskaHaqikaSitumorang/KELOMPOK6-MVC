<?php
function resetPassword($uname, $mobile, $newpassword, $con) {
    $result = "";
    $sql = mysqli_query($con, "SELECT ID FROM tbladmin WHERE AdminuserName='$uname' and MobileNumber='$mobile'");
    $rowcount = mysqli_num_rows($sql);

    if ($rowcount > 0) {
        $query = mysqli_query($con, "update tbladmin set Password='$newpassword' where AdminuserName='$uname' and MobileNumber='$mobile'");
        if ($query) {
            $result = 'Your Password has been successfully changed';
        } else {
            $result = 'Something went wrong. Please try again.';
        }
    } else {
        $result = 'Username or Mobile number is invalid';
    }

    return $result;
}
?>