<?php
class StaffModel {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function getStaff($id) {
        $stmt = $this->conn->prepare("SELECT * FROM staff WHERE staff_id = ?");
        $stmt->bind_param("s", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAssignedTasks($id) {
        $sql = "SELECT b.*, p.property_name, u.name as requester_name 
                FROM bookings b 
                LEFT JOIN property_info p ON b.prop_id = p.property_id 
                LEFT JOIN user u ON b.user_id = u.user_id
                WHERE b.status = 'Approved' OR b.status = 'Assigned'";
        return $this->conn->query($sql);
    }

    public function updateTaskStatus($booking_id, $status) {
        $stmt = $this->conn->prepare("UPDATE bookings SET status=? WHERE booking_id=?");
        $stmt->bind_param("ss", $status, $booking_id);
        return $stmt->execute();
    }
}
?>