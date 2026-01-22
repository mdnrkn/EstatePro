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

    public function getStats($owner_id) {
        $s1 = $this->conn->prepare("SELECT COUNT(*) as c FROM property_info WHERE owner_id=?");
        $s1->bind_param("s", $owner_id); $s1->execute();
        $l = $s1->get_result()->fetch_assoc()['c'];

        $s2 = $this->conn->prepare("SELECT COUNT(*) as c FROM bookings b JOIN property_info p ON b.prop_id=p.property_id WHERE p.owner_id=? AND b.status='Pending'");
        $s2->bind_param("s", $owner_id); $s2->execute();
        $r = $s2->get_result()->fetch_assoc()['c'];

        return ['listings' => $l, 'owners' => 0, 'requests' => $r];
    }

    public function getProperties($owner_id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_info WHERE owner_id=?");
        $stmt->bind_param("s", $owner_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function addProperty($id, $name, $price, $owner_id, $desc, $location, $image) {
        $sql = "INSERT INTO property_info (property_id, property_name, property_price, owner_id, description, location, property_image, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Available')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $id, $name, $price, $owner_id, $desc, $location, $image);
        return $stmt->execute();
    }

    public function getProperty($prop_id) {
        $stmt = $this->conn->prepare("SELECT * FROM property_info WHERE property_id=?");
        $stmt->bind_param("s", $prop_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateProperty($id, $name, $price, $desc, $location, $image) {
        $sql = "UPDATE property_info SET property_name=?, property_price=?, description=?, location=?, property_image=? WHERE property_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $price, $desc, $location, $image, $id);
        return $stmt->execute();
    }

    public function deleteProperty($id) {
        $this->conn->query("DELETE FROM bookings WHERE prop_id='$id'");
        $stmt = $this->conn->prepare("DELETE FROM property_info WHERE property_id=?");
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }

    public function getBookings($owner_id) {
        $sql = "SELECT b.*, p.property_name, u.name as requester_name 
                FROM bookings b 
                JOIN property_info p ON b.prop_id = p.property_id 
                LEFT JOIN user u ON b.user_id = u.user_id 
                WHERE p.owner_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $owner_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function updateBookingStatus($booking_id, $status) {
        $stmt = $this->conn->prepare("UPDATE bookings SET status = ? WHERE booking_id = ?");
        $stmt->bind_param("si", $status, $booking_id);
        return $stmt->execute();
    }
}
?>