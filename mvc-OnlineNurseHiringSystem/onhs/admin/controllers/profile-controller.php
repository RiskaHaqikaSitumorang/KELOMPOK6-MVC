<?php
session_start();
// Database Connection
include('includes/config.php');

if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else {
    // Code for Update Sub Admin Details
    if(isset($_POST['update'])){
        $fname=$_POST['fullname'];
        $email=$_POST['emailid'];
        $mobileno=$_POST['mobilenumber'];
        $adminid=intval($_SESSION['aid']);
        $query=mysqli_query($con,"update tbladmin set AdminName='$fname',MobileNumber='$mobileno',Email='$email' where  ID='$adminid'");
        if($query){
            echo "<script>alert('Profile details updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}
?>
