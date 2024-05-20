<?php
class Booking {
    private $con;

    public function __construct($db) {
        $this->con = $db;
    }

    public function checkAvailability($nbid, $fromdate, $todate) {
        $query = "SELECT * FROM tblbooking WHERE ('$fromdate' BETWEEN date(FromDate) AND date(ToDate) 
                  OR '$todate' BETWEEN date(FromDate) AND date(ToDate) 
                  OR date(FromDate) BETWEEN '$fromdate' AND '$todate') 
                  AND NurseID='$nbid' AND Status='Accepted'";
        $result = mysqli_query($this->con, $query);
        return mysqli_num_rows($result);
    }

    public function bookNurse($bookingid, $nbid, $contactname, $contphonenum, $contemail, $fromdate, $todate, $timeduration, $patientdesc) {
        $query = "INSERT INTO tblbooking (BookingID, NurseID, ContactName, ContactNumber, ContactEmail, FromDate, ToDate, TimeDuration, PatientDescrition) 
                  VALUES ('$bookingid', '$nbid', '$contactname', '$contphonenum', '$contemail', '$fromdate', '$todate', '$timeduration', '$patientdesc')";
        return mysqli_query($this->con, $query);
    }
}
?>
