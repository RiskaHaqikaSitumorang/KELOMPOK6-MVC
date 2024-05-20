<?php
class Nurse {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getTotalNurses() {
        $result = mysqli_query($this->con, "SELECT COUNT(ID) As total_records FROM tblnurse");
        $total_records = mysqli_fetch_array($result);
        return $total_records['total_records'];
    }

    public function getNurses($offset, $total_records_per_page) {
        $query = mysqli_query($this->con, "SELECT * FROM tblnurse LIMIT $offset, $total_records_per_page");
        $nurses = [];
        while ($result = mysqli_fetch_array($query)) {
            $nurses[] = $result;
        }
        return $nurses;
    }

    public function getAllNurses($offset, $total_records_per_page) {
        $query = "SELECT * FROM tblnurse LIMIT $offset, $total_records_per_page";
        $result = $this->con->query($query);
        $nurses = [];
        while ($row = $result->fetch_assoc()) {
            $nurses[] = $row;
        }
        return $nurses;
    }
}
?>
