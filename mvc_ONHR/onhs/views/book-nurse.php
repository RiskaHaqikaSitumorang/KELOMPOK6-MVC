<?php 
session_start();
include_once('../includes/config.php');
include_once('../models/Booking.php');
include_once('../controllers/BookingController.php');

// Initialize the booking model and controller
$bookingModel = new Booking($con);
$bookingController = new BookingController($bookingModel);

// Handle form submission
$bookingController->bookNurse();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Online Nurse Hiring System | Nurse Booking</title>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="../css/fontawesome-all.min.css" rel="stylesheet">
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
    <!-- banner -->
    <div class="inner-banner" id="home">
        <?php include_once("includes/navbar.php"); ?>
    </div>

    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Nurse Booking</li>
        </ol>
    </nav>

    <!-- booking form -->
    <section class="team-agile py-lg-5">
        <div class="container py-sm-5 pt-5 pb-0">
            <div class="title-section text-center pb-lg-5">
                <h4>world of medicine</h4>
                <h3 class="w3ls-title text-center text-capitalize">Nurse Booking</h3>
            </div>

            <div class="row mt-5 pb-lg-5">
                <div class="col-md-8 team-text mt-md-0 mt-5">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="contactname" class="col-form-label">Contact Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="contactname" id="contactname" required="">
                        </div>
                        <div class="form-group">
                            <label for="contphonenum" class="col-form-label">Contact Number</label>
                            <input type="text" class="form-control" placeholder="Phone" name="contphonenum" id="contphonenum" required="">
                        </div>
                        <div class="form-group">
                            <label for="contemail" class="col-form-label">Contact Email Address</label>
                            <input type="email" class="form-control" placeholder="Email" name="contemail" id="contemail" required="">
                        </div>
                        <div class="form-group">
                            <label for="fromdate" class="col-form-label">From Date</label>
                            <input type="date" class="form-control" id="fromdate" name="fromdate" required="">
                        </div>
                        <div class="form-group">
                            <label for="todate" class="col-form-label">To Date</label>
                            <input type="date" class="form-control" id="todate" name="todate" required="">
                        </div>
                        <div class="form-group">
                            <label for="timeduration" class="col-form-label">Time Duration</label>
                            <input type="text" class="form-control" id="timeduration" name="timeduration" required="">
                        </div>
                        <div class="form-group">
                            <label for="patientdesc" class="col-form-label">Patient Description</label>
                            <textarea class="form-control" id="patientdesc" name="patientdesc" required=""></textarea>
                        </div>
                        <button type="submit" class="btn_apt" name="submit">Request Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include_once("includes/footer.php"); ?>
    <!-- //footer -->

    <!-- js -->
    <script src="../js/jquery-2.2.3.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>
