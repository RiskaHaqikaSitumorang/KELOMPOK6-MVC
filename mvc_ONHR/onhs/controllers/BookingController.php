<?php
class BookingController {
    private $bookingModel;

    public function __construct($bookingModel) {
        $this->bookingModel = $bookingModel;
    }

    public function bookNurse() {
        if (isset($_POST['submit'])) {
            $nbid = $_GET['bookid'];
            $contactname = $_POST['contactname'];
            $contphonenum = $_POST['contphonenum'];
            $contemail = $_POST['contemail'];
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
            $timeduration = $_POST['timeduration'];
            $patientdesc = $_POST['patientdesc'];
            $bookingid = mt_rand(100000000, 999999999);

            $availability = $this->bookingModel->checkAvailability($nbid, $fromdate, $todate);
            if ($availability == 0) {
                $result = $this->bookingModel->bookNurse($bookingid, $nbid, $contactname, $contphonenum, $contemail, $fromdate, $todate, $timeduration, $patientdesc);
                if ($result) {
                    echo '<script>alert("Your Booking Request Has Been Sent. We Will Contact You Soon.")</script>';
                    echo "<script type='text/javascript'> document.location = 'team.php'; </script>";
                } else {
                    echo "<script>alert('Something went wrong. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('This nurse is not available for these dates.');</script>";
            }
        }
    }
}
?>
