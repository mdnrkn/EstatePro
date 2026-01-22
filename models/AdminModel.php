<?php
class AdminModel {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getStats() {
        $stats = [];
        $stats['users'] = $this->conn->query("SELECT COUNT(*) as c FROM user")->fetch_assoc()['c'];
        $stats['owners'] = $this->conn->query("SELECT COUNT(*) as c FROM property_owner")->fetch_assoc()['c'];
        $stats['staff'] = $this->conn->query("SELECT COUNT(*) as c FROM staff")->fetch_assoc()['c'];
        $stats['properties'] = $this->conn->query("SELECT COUNT(*) as c FROM property_info")->fetch_assoc()['c'];
        return $stats;
    }

    // --- USERS ---
    public function getAllUsers() { return $this->conn->query("SELECT * FROM user"); }
    public function getUser($id) {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE user_id=?");
        $stmt->bind_param("s", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function updateUser($id, $name, $phone) {
        $stmt = $this->conn->prepare("UPDATE user SET name=?, phone=? WHERE user_id=?");
        $stmt->bind_param("sss", $name, $phone, $id);
        return $stmt->execute();
    }
    public function deleteUser($id) {
        $this->conn->query("DELETE FROM bookings WHERE user_id='$id'"); // Cleanup
        return $this->conn->query("DELETE FROM user WHERE user_id='$id'");
    }

    // --- OWNERS ---
    public function getAllOwners() { return $this->conn->query("SELECT * FROM property_owner"); }
    public function getOwner($id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_owner WHERE property_owner_id=?");
        $stmt->bind_param("s", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function updateOwner($id, $name, $phone) {
        $stmt = $this->conn->prepare("UPDATE property_owner SET name=?, phone=? WHERE property_owner_id=?");
        $stmt->bind_param("sss", $name, $phone, $id);
        return $stmt->execute();
    }
    public function deleteOwner($id) {
        $this->conn->query("DELETE FROM property_info WHERE owner_id='$id'"); // Cleanup properties
        return $this->conn->query("DELETE FROM property_owner WHERE property_owner_id='$id'");
    }

    // --- STAFF ---
    public function getAllStaff() { return $this->conn->query("SELECT * FROM staff"); }
    public function getStaff($id) {
        $stmt = $this->conn->prepare("SELECT * FROM staff WHERE staff_id=?");
        $stmt->bind_param("s", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function addStaff($id, $name, $phone, $pass) {
        $stmt = $this->conn->prepare("INSERT INTO staff (staff_id, name, phone, password, security_answer) VALUES (?, ?, ?, ?, 'default')");
        $stmt->bind_param("ssss", $id, $name, $phone, $pass);
        return $stmt->execute();
    }
    public function updateStaff($id, $name, $phone) {
        $stmt = $this->conn->prepare("UPDATE staff SET name=?, phone=? WHERE staff_id=?");
        $stmt->bind_param("sss", $name, $phone, $id);
        return $stmt->execute();
    }
    public function deleteStaff($id) { return $this->conn->query("DELETE FROM staff WHERE staff_id='$id'"); }

    // --- ADMIN PROFILE ---
    public function getAdmin($id) {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE admin_id=?");
        $stmt->bind_param("s", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function updateAdminProfile($id, $name, $phone, $password) {
        $stmt = $this->conn->prepare("UPDATE admin SET name=?, phone=?, password=? WHERE admin_id=?");
        $stmt->bind_param("ssss", $name, $phone, $password, $id);
        return $stmt->execute();
    }
}
?>