<?php
session_start();

include_once 'config/Database.php';

include_once 'controllers/AuthController.php';
include_once 'controllers/UserController.php';
include_once 'controllers/OwnerController.php';
include_once 'controllers/StaffController.php';
include_once 'controllers/AdminController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

if ($action == 'login') {
    include 'views/login.php';
    exit();
}
if ($action == 'login_submit') {
    $auth = new AuthController();
    $auth->login();
    exit();
}
if ($action == 'logout') {
    $auth = new AuthController();
    $auth->logout();
    exit();
}

if (!isset($_SESSION['role'])) {
    header("Location: index.php?action=login");
    exit();
}

$role = $_SESSION['role'];
$controller = null;

switch ($role) {
    case 'user':
        $controller = new UserController();
        break;
    case 'owner':
        $controller = new OwnerController();
        break;
    case 'staff':
        $controller = new StaffController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    default:
        session_destroy();
        header("Location: index.php");
        exit();
}

if ($controller && method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->dashboard();
}
?>