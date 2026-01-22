<?php
class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // --- BROWSE PROPERTIES ---
    public function getAvailableProperties($search = "") {
        $sql = "SELECT * FROM property_info WHERE status = 'Available'";
        if (!empty($search)) {
            $search = $this->conn->real_escape_string($search);
            $sql .= " AND (property_name LIKE '%$search%' OR location LIKE '%$search%')";
        }
        return $this->conn->query($sql);
    }

    public function getUserBookingStatus($user_id) {
        $sql = "SELECT prop_id, status FROM bookings WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);
        $status = [];
        while($row = $result->fetch_assoc()) {
            $status[$row['prop_id']] = $row['status'];
        }
        return $status;
    }

    // --- BOOKING LOGIC ---
    public function bookProperty($prop_id, $user_id) {
        $check = "SELECT * FROM bookings WHERE prop_id = '$prop_id' AND user_id = '$user_id'";
        $result = $this->conn->query($check);

        if($result->num_rows == 0) {
            $sql = "INSERT INTO bookings (prop_id, user_id, booking_date, status) VALUES ('$prop_id', '$user_id', NOW(), 'Pending')";
            return $this->conn->query($sql);
        }
        return false;
    }

    public function getMyBookings($user_id) {
        $sql = "SELECT b.*, p.property_name, p.property_price 
                FROM bookings b 
                JOIN property_info p ON b.prop_id = p.property_id 
                WHERE b.user_id = '$user_id' 
                ORDER BY b.booking_date DESC";
        return $this->conn->query($sql);
    }

    public function cancelBooking($booking_id, $user_id) {
        $sql = "DELETE FROM bookings 
                WHERE booking_id = '$booking_id' 
                AND user_id = '$user_id' 
                AND status = 'Pending'";
        $this->conn->query($sql);
        return $this->conn->affected_rows > 0;
    }

    // --- PROFILE LOGIC ---
    public function getUserDetails($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function updateProfile($user_id, $name, $phone, $pass, $sec_ans) {
        $name = $this->conn->real_escape_string($name);
        $phone = $this->conn->real_escape_string($phone);
        $pass = $this->conn->real_escape_string($pass);
        $sec_ans = $this->conn->real_escape_string($sec_ans);

        $sql = "UPDATE user SET name='$name', phone='$phone', password='$pass', security_answer='$sec_ans' WHERE user_id='$user_id'";
        return $this->conn->query($sql);
    }
}
?>