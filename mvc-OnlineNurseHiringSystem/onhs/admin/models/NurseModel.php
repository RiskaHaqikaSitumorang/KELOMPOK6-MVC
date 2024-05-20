<?php
class NurseModel {
    private $con;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getNurseById($id) {
        $query = mysqli_query($this->con, "SELECT * FROM tblnurse WHERE ID='$id'");
        return mysqli_fetch_array($query);
    }

    public function updateNurse($data, $id) {
        $fname = $data['fullname'];
        $gender = $data['gender'];
        $email = $data['emailid'];
        $mobileno = $data['mobilenumber'];
        $address = $data['address'];
        $city = $data['city'];
        $state = $data['state'];
        $languagesknown = $data['languagesknown'];
        $experience = $data['experience'];
        $certificate = $data['certificate'];
        $description = $data['description'];

        $query = mysqli_query($this->con, "UPDATE tblnurse SET Name='$fname', Gender='$gender', Email='$email', MobileNo='$mobileno', Address='$address', City='$city', State='$state', LanguagesKnown='$languagesknown', NursingExp='$experience', NursingCertificate='$certificate', EducationDescription='$description' WHERE ID='$id'");
        return $query;
    }
}
?>
