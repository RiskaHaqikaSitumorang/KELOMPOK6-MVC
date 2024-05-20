<?php
session_start();
include_once('../includes/config.php');
include_once('../models/Admin.php');

class AdminController {
    private $adminModel;

    public function __construct($adminModel) {
        $this->adminModel = $adminModel;
    }

    public function login() {
        if (isset($_POST['login'])) {
            $uname = $_POST['username'];
            $password = md5($_POST['inputpwd']);
            $result = $this->adminModel->login($uname, $password);
            if ($result) {
                $_SESSION['aid'] = $result['ID'];
                $_SESSION['uname'] = $result['AdminuserName'];
                header('location: dashboard.php');
            } else {
                echo "<script>alert('Invalid Details.');</script>";
            }
        }
    }
}

$adminModel = new Admin($con);
$adminController = new AdminController($adminModel);
$adminController->login();
?>

