// controller.php

<?php
include_once('../includes/config.php');
include_once('../models/Nurse.php');

class NurseController {
    private $model;

    public function __construct($con) {
        $this->model = new NurseModel($con);
    }

    public function addNurse() {
        if(isset($_POST['submit'])){
            //Getting Post Values  
            $fname=$_POST['fullname'];
            $gender=$_POST['gender'];
            $email=$_POST['emailid'];
            $mobileno=$_POST['mobilenumber'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $languagesknown=$_POST['languagesknown'];
            $experience=$_POST['experience'];
            $certificate=$_POST['certificate'];
            $description=$_POST['description'];
            $profilepic=$_FILES["profilepic"]["name"];

            // get the image extension
            $extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
            // allowed extensions
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");

            // Validation for allowed extensions .in_array() function searches an array for a specific value.
            if(!in_array($extension,$allowed_extensions)) {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                //rename the image file
                $newprofilepic=md5($profilepic).time().$extension;
                // Code for move image into directory
                move_uploaded_file($_FILES["profilepic"]["tmp_name"],"images/".$newprofilepic);

                $result = $this->model->addNurse($fname, $gender, $email, $mobileno, $address, $city, $state, $languagesknown, $experience, $certificate, $description, $newprofilepic);

                if($result) {
                    echo "<script>alert('Nurse details has been added successfully.');</script>";
                    echo "<script type='text/javascript'> document.location = 'add-nurse.php'; </script>";
                } else {
                    echo "<script>alert('Something went wrong. Please try again.');</script>";
                }
            }
        }
    }

    public function handleRequest() {
        if (strlen($_SESSION['aid']) == 0) {
            header('location:index.php');
            exit;
        }

        if (isset($_POST['update'])) {
            $editid = intval($_GET['editid']);
            $updateStatus = $this->model->updateNurse($_POST, $editid);

            if ($updateStatus) {
                echo "<script>alert('Nurse details updated successfully.');</script>";
                echo "<script type='text/javascript'> document.location = 'manage-nurse.php'; </script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }

        if (isset($_GET['editid'])) {
            $editid = intval($_GET['editid']);
            $nurse = $this->model->getNurseById($editid);
            include('update-nurse-view.php');
        }
    }

    

}
?>
