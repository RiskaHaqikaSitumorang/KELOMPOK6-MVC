<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else {
    if($_GET['action']=='delete'){
        $bsid=intval($_GET['bsid']);
        $profilepic=$_GET['profilepic'];
        $ppicpath="lawyerpic"."/".$profilepic;
        $query=mysqli_query($con,"delete from tblnurse where id='$bsid'");
        if($query){
            unlink($ppicpath);
            echo "<script>alert('Nurse details deleted successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-nurse.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
    
    // Fetching Nurse Data
    $nurses = array();
    $query = mysqli_query($con, "SELECT * FROM tblnurse");
    while($result = mysqli_fetch_array($query)) {
        $nurses[] = $result;
    }
    
    // Include the View File
    include('manage-nurse_view.php');
}
?>
