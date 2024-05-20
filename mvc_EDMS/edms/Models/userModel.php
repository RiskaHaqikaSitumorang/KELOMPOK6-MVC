<?php
class UserModel {
    private $conn;

    function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "edmsdb");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function execute($query, $params = [], $types = "") {
        $stmt = $this->conn->prepare($query);
        if ($params && $types) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt;
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tblregistration WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function getUserByIdAndPassword($id, $password) {
        $hashedPassword = md5($password);
        $stmt = $this->conn->prepare("SELECT id FROM tblregistration WHERE id = ? AND userPassword = ?");
        $stmt->bind_param("is", $id, $hashedPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function updateUserPassword($id, $newPassword) {
        $hashedPassword = md5($newPassword);
        $stmt = $this->conn->prepare("UPDATE tblregistration SET userPassword = ? WHERE id = ?");
        $stmt->bind_param("si", $hashedPassword, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getUserByLoginDetails($emailOrPhone, $password) {
        $stmt = $this->conn->prepare("SELECT mobileNumber, emailId, id FROM tblregistration WHERE (emailId = ? OR mobileNumber = ?) AND userPassword = ?");
        $stmt->bind_param("sss", $emailOrPhone, $emailOrPhone, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getUserByEmailAndPhone($email, $phone) {
        $stmt = $this->conn->prepare("SELECT id FROM tblregistration WHERE emailId = ? AND mobileNumber = ?");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertUser($firstName, $lastName, $email, $phone, $password) {
        $stmt = $this->conn->prepare("INSERT INTO tblregistration (firstName, lastName, emailId, mobileNumber, userPassword) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $password);
        return $stmt->execute();
    }

    public function updateUserProfile($id, $firstName, $lastName) {
        $stmt = $this->conn->prepare("UPDATE tblregistration SET firstName = ?, lastName = ? WHERE id = ?");
        $stmt->bind_param("ssi", $firstName, $lastName, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>

