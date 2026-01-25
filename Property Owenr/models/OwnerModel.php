<?php
class OwnerModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getOwner($id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_owner WHERE property_owner_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

   
    public function updateOwnerProfile($id, $name, $phone, $password, $image_path = null) {
        if ($image_path) {
            $stmt = $this->conn->prepare("UPDATE property_owner SET name=?, phone=?, password=?, profile_pic=? WHERE property_owner_id=?");
            $stmt->bind_param("sssss", $name, $phone, $password, $image_path, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE property_owner SET name=?, phone=?, password=? WHERE property_owner_id=?");
            $stmt->bind_param("ssss", $name, $phone, $password, $id);
        }
        return $stmt->execute();
    }

    
    public function addProperty($id, $name, $price, $owner_id, $desc, $images) {
       
        $main_image = !empty($images) ? $images[0] : 'default.jpg';
        $stmt = $this->conn->prepare("INSERT INTO property_info (property_id, property_name, property_price, owner_id, description, property_image, status) VALUES (?, ?, ?, ?, ?, ?, 'Available')");
        $stmt->bind_param("ssssss", $id, $name, $price, $owner_id, $desc, $main_image);
        $stmt->execute();

        
        if (!empty($images)) {
            $stmt_img = $this->conn->prepare("INSERT INTO property_images (property_id, image_path) VALUES (?, ?)");
            foreach ($images as $img) {
                $stmt_img->bind_param("ss", $id, $img);
                $stmt_img->execute();
            }
        }
        return true;
    }

    
    public function updateProperty($prop_id, $owner_id, $name, $price, $desc, $new_images) {
        $stmt = $this->conn->prepare("UPDATE property_info SET property_name=?, property_price=?, description=? WHERE property_id=? AND owner_id=?");
        $stmt->bind_param("sssss", $name, $price, $desc, $prop_id, $owner_id);
        $stmt->execute();

       
        if (!empty($new_images)) {
            $stmt_img = $this->conn->prepare("INSERT INTO property_images (property_id, image_path) VALUES (?, ?)");
            foreach ($new_images as $img) {
                $stmt_img->bind_param("ss", $prop_id, $img);
                $stmt_img->execute();
            }
        }
        return true;
    }

   
    public function getPropertyImages($prop_id) {
       
        $stmt = $this->conn->prepare("SELECT * FROM property_images WHERE property_id = ?");
        if ($stmt) {
            $stmt->bind_param("s", $prop_id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        return []; 
    }
   

    public function getProperty($prop_id, $owner_id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_info WHERE property_id = ? AND owner_id = ?");
        $stmt->bind_param("ss", $prop_id, $owner_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getStats($id) {
        $s1 = $this->conn->prepare("SELECT COUNT(*) as c FROM property_info WHERE owner_id=?");
        $s1->bind_param("s", $id); $s1->execute(); 
        $l = $s1->get_result()->fetch_assoc()['c'];

        $s2 = $this->conn->prepare("SELECT COUNT(*) as c FROM bookings b JOIN property_info p ON b.property_id=p.property_id WHERE p.owner_id=? AND b.status='Pending'");
        $s2->bind_param("s", $id); $s2->execute(); 
        $r = $s2->get_result()->fetch_assoc()['c'];

        return ['listings'=>$l, 'earnings'=>0, 'requests'=>$r];
    }

    public function getProperties($id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_info WHERE owner_id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteProperty($pid, $oid) {
        $stmt = $this->conn->prepare("DELETE FROM property_info WHERE property_id=? AND owner_id=?");
        $stmt->bind_param("ss", $pid, $oid);
        return $stmt->execute();
    }

    public function getBookings($id) {
        $stmt = $this->conn->prepare("SELECT b.*,p.property_name FROM bookings b JOIN property_info p ON b.property_id=p.property_id WHERE p.owner_id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>