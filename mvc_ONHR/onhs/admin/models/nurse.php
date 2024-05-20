
<?php
class NurseModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function addNurse($fname, $gender, $email, $mobileno, $address, $city, $state, $languagesknown, $experience, $certificate, $description, $newprofilepic) {
        $query = "INSERT INTO tblnurse(Name, Gender, Email, MobileNo, Address, City, State, LanguagesKnown, NursingExp, NursingCertificate, EducationDescription, ProfilePic) VALUES ('$fname', '$gender', '$email', '$mobileno', '$address', '$city', '$state', '$languagesknown', '$experience', '$certificate', '$description', '$newprofilepic')";
        return mysqli_query($this->con, $query);
    }
}
?>
