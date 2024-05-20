<?php
class Admin {
    private $con;

    public function __construct($db) {
        $this->con = $db;
    }

    public function login($uname, $password) {
        $query = "SELECT ID, AdminuserName FROM tbladmin WHERE AdminuserName='$uname' AND Password='$password'";
        $result = mysqli_query($this->con, $query);
        return mysqli_fetch_array($result);
    }
}
?>
