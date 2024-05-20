// controller.php

<?php
include_once('../includes/config.php');
include_once('../models/Dashboard.php');

class DashboardController {
    private $model;

    public function __construct($con) {
        $this->model = new DashboardModel($con);
    }

    public function index() {
        $nurseCount = $this->model->getTotalNurses();
        $newRequestCount = $this->model->getTotalNewRequests();
        $acceptedRequestCount = $this->model->getTotalAcceptedRequests();
        $rejectedRequestCount = $this->model->getTotalRejectedRequests();

        include('dashboard_view.php');
    }
}
?>
