<?php

include_once(__DIR__ . '/../Models/userModel.php');

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function getUserModel() {
        return $this->userModel;
    }

    public function changePassword() {
        if (isset($_POST['update'])) {
            $uid = $_SESSION["edmsid"];
            $currentPassword = $_POST['cpass'];
            $newPassword = $_POST['newpass'];

            $user = $this->userModel->getUserByIdAndPassword($uid, $currentPassword);
            if ($user) {
                if ($this->userModel->updateUserPassword($uid, $newPassword)) {
                    $_SESSION['message'] = 'Password changed successfully.';
                } else {
                    $_SESSION['message'] = 'Failed to change password.';
                }
            } else {
                $_SESSION['message'] = 'Current Password is wrong.';
            }
            header('Location: change-password.php');
            exit;
        }
    }

    public function login() {
        if (isset($_POST['login'])) {
            $emailcon = $_POST['logindetail'];
            $password = md5($_POST['userpassword']);

            $user = $this->userModel->getUserByLoginDetails($emailcon, $password);
            if ($user) {
                $_SESSION['edmsid'] = $user['id'];
                $_SESSION['uemail'] = $user['emailId'];
                header('Location: dashboard.php');
                exit;
            } else {
                $_SESSION['message'] = 'Invalid details';
                header('Location: login.php');
                exit;
            }
        }
    }

    public function passwordRecovery() {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $cnumber = $_POST['contactno'];
            $newPassword = md5($_POST['inputPassword']);

            $user = $this->userModel->getUserByEmailAndPhone($username, $cnumber);
            if ($user) {
                $this->userModel->updateUserPassword($user['id'], $newPassword);
                $_SESSION['message'] = 'Password reset successfully.';
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['message'] = 'Invalid username or Contact Number';
                header('Location: password-recovery.php');
                exit;
            }
        }
    }

    public function register() {
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $emailid = $_POST['emailid'];
            $mobileno = $_POST['mobileno'];
            $npwd = md5($_POST['newpassword']);

            $existingUser = $this->userModel->getUserByLoginDetails($emailid, $mobileno);
            if (!$existingUser) {
                $this->userModel->insertUser($fname, $lname, $emailid, $mobileno, $npwd);
                $_SESSION['message'] = 'Registration successful. Please login now';
                header('Location: login.php');
                exit;
            } else {
                $_SESSION['message'] = 'Email Id or Mobile Number already registered. Please try again.';
                header('Location: registration.php');
                exit;
            }
        }
    }

    public function updateProfile() {
        if (isset($_POST['submit'])) {
            $id = intval($_SESSION["edmsid"]);
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];

            if ($this->userModel->updateUserProfile($id, $fname, $lname)) {
                $_SESSION['message'] = 'Profile Updated successfully';
            } else {
                $_SESSION['message'] = 'Failed to update profile';
            }
            header('Location: my-profile.php');
            exit;
        }
    }
}

$controller = new UserController();
$page = basename($_SERVER['PHP_SELF']);

switch ($page) {
    case 'change-password.php':
        $controller->changePassword();
        break;
    case 'login.php':
        $controller->login();
        break;
    case 'password-recovery.php':
        $controller->passwordRecovery();
        break;
    case 'registration.php':
        $controller->register();
        break;
    case 'my-profile.php':
        $controller->updateProfile();
        break;
}
?>
