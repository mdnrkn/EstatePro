<?php
class OwnerController {
    private $model;

    public function __construct($db) {
        $this->model = new OwnerModel($db);
    }

   
    private function uploadFiles($filesArray) {
        $uploaded_names = [];
      
        $target_dir = __DIR__ . "/../uploads/";
        
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        foreach ($filesArray['name'] as $key => $name) {
            if ($filesArray['error'][$key] == 0) {
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $new_name = uniqid() . "." . $ext; 
                
                
                if(move_uploaded_file($filesArray['tmp_name'][$key], $target_dir . $new_name)) {
                    $uploaded_names[] = $new_name;
                }
            }
        }
        return $uploaded_names;
    }

    
    private function uploadSingleFile($file) {
        $target_dir = __DIR__ . "/../uploads/";
        
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $new_name = uniqid() . "." . $ext;
        
        if(move_uploaded_file($file['tmp_name'], $target_dir . $new_name)) {
            return $new_name;
        }
        return null;
    }

   
    public function updateProfileSubmit() {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
        
        $profile_pic = null;
    
        if (!empty($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['error'] == 0) {
            $profile_pic = $this->uploadSingleFile($_FILES['profile_pic']);
        }

        if($this->model->updateOwnerProfile($_SESSION['owner_id'], $name, $phone, $pass, $profile_pic)) {
            $_SESSION['owner_name'] = $name;
            echo "<script>alert('Profile Updated Successfully!'); window.location.href='index.php?action=edit_profile';</script>";
        } else {
            echo "<script>alert('Update Failed'); window.history.back();</script>";
        }
    }

   
    public function storeProperty() {
        header('Content-Type: application/json');
        $prop_id = 'p' . rand(1000, 9999);
        $name = $_POST['property_name'];
        $price = $_POST['property_price'];
        $desc = $_POST['description'];

        $images = [];
        if(isset($_FILES['images'])) {
            $images = $this->uploadFiles($_FILES['images']);
        }

        if($this->model->addProperty($prop_id, $name, $price, $_SESSION['owner_id'], $desc, $images)) {
            echo json_encode(['status'=>'success', 'message'=>'Property Added with Images!']);
        } else {
            echo json_encode(['status'=>'error', 'message'=>'Database Error']);
        }
    }

  
    public function updatePropertySubmit() {
        $id = $_POST['property_id'];
        $name = $_POST['property_name'];
        $price = $_POST['property_price'];
        $desc = $_POST['description'];

        $new_images = [];
        if(isset($_FILES['new_images'])) {
            $new_images = $this->uploadFiles($_FILES['new_images']);
        }

        if($this->model->updateProperty($id, $_SESSION['owner_id'], $name, $price, $desc, $new_images)) {
            echo "<script>alert('Property Updated!'); window.location.href='index.php?action=my_properties';</script>";
        }
    }

   
    public function dashboard() { $user=$this->model->getOwner($_SESSION['owner_id']); $stats=$this->model->getStats($_SESSION['owner_id']); include 'views/dashboard.php'; }
    public function editProfile() { $user=$this->model->getOwner($_SESSION['owner_id']); include 'views/edit_profile.php'; }
    public function addProperty() { include 'views/add_property.php'; }
    public function myProperties() { $properties=$this->model->getProperties($_SESSION['owner_id']); include 'views/my_properties.php'; }
    public function editProperty() { 
        if(!isset($_GET['id'])) { header("Location: index.php?action=my_properties"); return; }
        $prop = $this->model->getProperty($_GET['id'], $_SESSION['owner_id']);
        $gallery = $this->model->getPropertyImages($_GET['id']);
        include 'views/edit_property.php'; 
    }
    public function deleteProperty() { if(isset($_GET['id'])) { $this->model->deleteProperty($_GET['id'], $_SESSION['owner_id']); header("Location: index.php?action=my_properties"); } }
    public function bookingRequests() { $bookings=$this->model->getBookings($_SESSION['owner_id']); include 'views/booking_requests.php'; }
    public function history() { include 'views/history.php'; }
}
?>