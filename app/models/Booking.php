<?php
/**
 * Booking Model
 * 
 * Handles all booking-related database operations
 */

require_once __DIR__ . '/../helpers/DatabaseHelper.php';

class Booking {
    private $conn;
    
    public function __construct($connection) {
        $this->conn = $connection;
    }
    
    /**
     * Get booking by ID with details
     * 
     * @param int $bookingId Booking ID
     * @return array|null Booking data
     */
    public function getBookingById($bookingId) {
        $query = "SELECT b.booking_id, b.user_id, b.booking_date, b.status,
                         u.name, u.surname, u.email, u.phone_number
                  FROM booking b
                  LEFT JOIN user u ON b.user_id = u.user_id
                  WHERE b.booking_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$bookingId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Get all bookings for a user
     * 
     * @param int $userId User ID
     * @param int|null $status Optional status filter
     * @return array Bookings list
     */
    public function getUserBookings($userId, $status = null) {
        $query = "SELECT booking_id, user_id, booking_date, status
                  FROM booking
                  WHERE user_id = ?";
        
        $params = [$userId];
        
        if ($status !== null) {
            $query .= " AND status = ?";
            $params[] = $status;
        }
        
        $query .= " ORDER BY booking_date DESC";
        
        $result = DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Get booking details (items/services in booking)
     * 
     * @param int $bookingId Booking ID
     * @return array Booking details
     */
    public function getBookingDetails($bookingId) {
        $query = "SELECT bd.bd_id, bd.service_id, bd.qty, bd.price, bd.user_id,
                         s.service_type, s.description
                  FROM booking_details bd
                  LEFT JOIN service s ON bd.service_id = s.service_id
                  WHERE bd.booking_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$bookingId]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Create new booking
     * 
     * @param int $userId User ID
     * @param int $status Booking status
     * @return int|false New booking ID or false on failure
     */
    public function createBooking($userId, $status = 0) {
        $query = "INSERT INTO booking (user_id, status, booking_date)
                  VALUES (?, ?, NOW())";
        
        DatabaseHelper::executeQuery($this->conn, $query, [$userId, $status]);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Add item to booking
     * 
     * @param int $bookingId Booking ID
     * @param int $userId User ID
     * @param int $serviceId Service ID
     * @param int $quantity Quantity
     * @param float $price Price per unit
     * @return int|false Booking detail ID or false on failure
     */
    public function addBookingItem($bookingId, $userId, $serviceId, $quantity, $price) {
        $query = "INSERT INTO booking_details (booking_id, user_id, service_id, qty, price)
                  VALUES (?, ?, ?, ?, ?)";
        
        DatabaseHelper::executeQuery($this->conn, $query, [$bookingId, $userId, $serviceId, $quantity, $price]);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Update booking status
     * 
     * @param int $bookingId Booking ID
     * @param int $status New status
     * @return bool Success
     */
    public function updateBookingStatus($bookingId, $status) {
        $query = "UPDATE booking SET status = ? WHERE booking_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$status, $bookingId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Remove item from booking
     * 
     * @param int $bookingDetailId Booking detail ID
     * @return bool Success
     */
    public function removeBookingItem($bookingDetailId) {
        $query = "DELETE FROM booking_details WHERE bd_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$bookingDetailId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Cancel booking
     * 
     * @param int $bookingId Booking ID
     * @return bool Success
     */
    public function cancelBooking($bookingId) {
        return $this->updateBookingStatus($bookingId, 0);
    }
    
    /**
     * Get all bookings with optional filters
     * 
     * @param int|null $status Optional status filter
     * @param int $limit Limit results
     * @param int $offset Offset for pagination
     * @return array Bookings list
     */
    public function getAllBookings($status = null, $limit = 50, $offset = 0) {
        $query = "SELECT b.booking_id, b.user_id, b.booking_date, b.status,
                         u.name, u.surname, u.email
                  FROM booking b
                  LEFT JOIN user u ON b.user_id = u.user_id";
        
        $params = [];
        
        if ($status !== null) {
            $query .= " WHERE b.status = ?";
            $params[] = $status;
        }
        
        $query .= " ORDER BY b.booking_date DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        
        $result = DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::fetchAll($result);
    }
}
?>
