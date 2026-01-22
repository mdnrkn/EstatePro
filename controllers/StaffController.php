<?php
include_once 'models/StaffModel.php';

class StaffController {
    private $model;

    public function __construct() {
        $db = new Database();
        $this->model = new StaffModel($db->connect());
    }

    public function dashboard() {
        $tasks = $this->model->getAssignedTasks($_SESSION['user_id']);
        include 'views/staff/dashboard.php';
    }

    public function my_tasks() {
        $tasks = $this->model->getAssignedTasks($_SESSION['user_id']);
        include 'views/staff/my_tasks.php';
    }

    public function update_task() {
        $this->model->updateTaskStatus($_POST['booking_id'], $_POST['status']);
        header("Location: index.php?action=my_tasks");
    }
}
?>