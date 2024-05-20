<?php
require_once __DIR__ . '/../models/Nurse.php';
require_once __DIR__ . '/../includes/config.php';

class TeamController {
    private $nurseModel;

    public function __construct() {
        $this->nurseModel = new Nurse($con);
    }

    public function index() {
        $page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;
        $total_records_per_page = 5;
        $offset = ($page_no - 1) * $total_records_per_page;
        $total_records = $this->nurseModel->getTotalNurses();
        $total_no_of_pages = ceil($total_records / $total_records_per_page);

        $nurses = $this->nurseModel->getNurses($offset, $total_records_per_page);

        include_once __DIR__ . '/../views/team/team.view.php';
    }
}
?>
