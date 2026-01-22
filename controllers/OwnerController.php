<?php
include_once 'config/Database.php';
include_once 'models/OwnerModel.php';

class OwnerController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->model = new OwnerModel($db);
    }

    // --- HELPER: Image Upload Function ---
    private function uploadImage($file) {
        $target_dir = "uploads/";

        // 1. Create folder if missing
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // 2. Validate
        $file_name = basename($file["name"]);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($file_ext, $allowed)) {
            return "default.jpg"; // Fallback
        }

        // 3. Generate Unique Name (e.g. 65a1b2.jpg)
        $new_name = uniqid() . "." . $file_ext;
        $target_file = $target_dir . $new_name;

        // 4. Move File
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $new_name;
        }

        return "default.jpg";
    }

    // --- DASHBOARD ---
    public function dashboard() {
        $user = $this->model->getOwner($_SESSION['user_id']);
        $stats = $this->model->getStats($_SESSION['user_id']);
        include 'views/owner/dashboard.php';
    }

    public function my_properties() {
        $properties = $this->model->getProperties($_SESSION['user_id']);
        include 'views/owner/my_properties.php';
    }

    public function add_property() {
        include 'views/owner/add_property.php';
    }

    // --- STORE PROPERTY (With Image) ---
    public function store_property() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prop_id = 'p-' . rand(1000, 9999);
            $name = $_POST['property_name'];
            $price = $_POST['property_price'];
            $desc = $_POST['description'];
            $location = $_POST['location'];

            // Handle Upload
            $image_name = "default.jpg";
            if (!empty($_FILES['image']['name'])) {
                $image_name = $this->uploadImage($_FILES['image']);
            }

            $this->model->addProperty($prop_id, $name, $price, $_SESSION['user_id'], $desc, $location, $image_name);

            header("Location: index.php?action=my_properties");
        }
    }

    // --- EDIT PROPERTY ---
    public function edit_property() {
        if(isset($_GET['id'])) {
            $prop = $this->model->getProperty($_GET['id']);
            include 'views/owner/edit_property.php';
        }
    }

    // --- UPDATE PROPERTY (With Image Replacement) ---
    public function update_property_submit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prop_id = $_POST['property_id'];
            $name = $_POST['property_name'];
            $price = $_POST['property_price'];
            $desc = $_POST['description'];
            $location = $_POST['location']; // Ensure this is captured

            // Keep old image by default
            $image_name = $_POST['current_image'];

            // If new image uploaded, replace it
            if (!empty($_FILES['new_image']['name'])) {
                $image_name = $this->uploadImage($_FILES['new_image']);
            }

            $this->model->updateProperty($prop_id, $name, $price, $desc, $location, $image_name);

            header("Location: index.php?action=my_properties");
        }
    }

    public function delete_property() {
        if(isset($_GET['id'])) {
            $this->model->deleteProperty($_GET['id']);
            header("Location: index.php?action=my_properties");
        }
    }

    public function booking_requests() {
        $bookings = $this->model->getBookings($_SESSION['user_id']);
        include 'views/owner/booking_requests.php';
    }

    public function accept_booking() {
        if (isset($_POST['booking_id'])) {
            $this->model->updateBookingStatus($_POST['booking_id'], 'Approved');
            echo "<script>alert('Booking Accepted!'); window.location.href='index.php?action=booking_requests';</script>";
        }
    }

    public function reject_booking() {
        if (isset($_POST['booking_id'])) {
            $this->model->updateBookingStatus($_POST['booking_id'], 'Rejected');
            echo "<script>alert('Booking Rejected.'); window.location.href='index.php?action=booking_requests';</script>";
        }
    }
}
?>