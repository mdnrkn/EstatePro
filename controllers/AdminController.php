<?php
include_once 'models/AdminModel.php';

class AdminController {
    private $model;

    public function __construct() {
        $db = new Database();
        $this->model = new AdminModel($db->connect());
    }

    public function dashboard() {
        $stats = $this->model->getStats();
        include 'views/admin/dashboard.php';
    }

    // --- USERS ---
    public function manage_users() {
        $users = $this->model->getAllUsers();
        include 'views/admin/manage_users.php';
    }
    public function edit_user() {
        $user = $this->model->getUser($_GET['id']);
        include 'views/admin/edit_user.php';
    }
    public function update_user_submit() {
        $this->model->updateUser($_POST['user_id'], $_POST['name'], $_POST['phone']);
        header("Location: index.php?action=manage_users");
    }
    public function delete_user() {
        $this->model->deleteUser($_GET['id']);
        header("Location: index.php?action=manage_users");
    }

    // --- OWNERS ---
    public function manage_owners() {
        $owners = $this->model->getAllOwners();
        include 'views/admin/manage_owners.php';
    }
    public function edit_owner() {
        $owner = $this->model->getOwner($_GET['id']);
        include 'views/admin/edit_owner.php';
    }
    public function update_owner_submit() {
        $this->model->updateOwner($_POST['owner_id'], $_POST['name'], $_POST['phone']);
        header("Location: index.php?action=manage_owners");
    }
    public function delete_owner() {
        $this->model->deleteOwner($_GET['id']);
        header("Location: index.php?action=manage_owners");
    }

    // --- STAFF ---
    public function manage_staff() {
        $staff_list = $this->model->getAllStaff();
        include 'views/admin/manage_staff.php';
    }
    public function add_staff() {
        $id = 's' . rand(100,999);
        $this->model->addStaff($id, $_POST['name'], $_POST['phone'], $_POST['password']);
        header("Location: index.php?action=manage_staff");
    }
    public function edit_staff() {
        $staff = $this->model->getStaff($_GET['id']);
        include 'views/admin/edit_staff.php';
    }
    public function update_staff_submit() {
        $this->model->updateStaff($_POST['staff_id'], $_POST['name'], $_POST['phone']);
        header("Location: index.php?action=manage_staff");
    }
    public function delete_staff() {
        $this->model->deleteStaff($_GET['id']);
        header("Location: index.php?action=manage_staff");
    }

    // --- ADMIN PROFILE ---
    public function profile() {
        // $_SESSION['user_id'] holds the admin_id from Login
        $admin = $this->model->getAdmin($_SESSION['user_id']);
        include 'views/admin/profile.php';
    }
    public function update_profile_submit() {
        $this->model->updateAdminProfile($_SESSION['user_id'], $_POST['name'], $_POST['phone'], $_POST['password']);
        $_SESSION['name'] = $_POST['name'];
        echo "<script>alert('Admin Profile Updated'); window.location.href='index.php?action=dashboard';</script>";
    }
}
?>