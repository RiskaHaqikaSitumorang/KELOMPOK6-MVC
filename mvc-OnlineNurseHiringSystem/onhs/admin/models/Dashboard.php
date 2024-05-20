

<?php
class DashboardModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getTotalNurses() {
        $query = "SELECT ID FROM tblnurse";
        $result = mysqli_query($this->con, $query);
        return mysqli_num_rows($result);
    }

    public function getTotalNewRequests() {
        $query = "SELECT ID FROM tblbooking WHERE Status IS NULL";
        $result = mysqli_query($this->con, $query);
        return mysqli_num_rows($result);
    }

    public function getTotalAcceptedRequests() {
        $query = "SELECT ID FROM tblbooking WHERE Status='Accepted'";
        $result = mysqli_query($this->con, $query);
        return mysqli_num_rows($result);
    }

    public function getTotalRejectedRequests() {
        $query = "SELECT ID FROM tblbooking WHERE Status='Rejected'";
        $result = mysqli_query($this->con, $query);
        return mysqli_num_rows($result);
    }
}
?>
