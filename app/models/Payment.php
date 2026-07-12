<?php
/**
 * Payment Model
 * 
 * Handles all payment-related database operations
 */

require_once __DIR__ . '/../helpers/DatabaseHelper.php';

class Payment {
    private $conn;
    
    public function __construct($connection) {
        $this->conn = $connection;
    }
    
    /**
     * Get payment by ID
     * 
     * @param int $paymentId Payment ID
     * @return array|null Payment data
     */
    public function getPaymentById($paymentId) {
        $query = "SELECT p.payment_id, p.user_id, p.booking_id, p.payment_type, p.payment_method,
                         p.balAmount, p.totAmount,
                         u.name, u.surname, u.email
                  FROM payment p
                  LEFT JOIN user u ON p.user_id = u.user_id
                  WHERE p.payment_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$paymentId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Get payments for a booking
     * 
     * @param int $bookingId Booking ID
     * @return array Payments list
     */
    public function getBookingPayments($bookingId) {
        $query = "SELECT payment_id, user_id, booking_id, payment_type, payment_method, balAmount, totAmount
                  FROM payment
                  WHERE booking_id = ?
                  ORDER BY payment_id DESC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$bookingId]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Get payments for a user
     * 
     * @param int $userId User ID
     * @return array Payments list
     */
    public function getUserPayments($userId) {
        $query = "SELECT payment_id, user_id, booking_id, payment_type, payment_method, balAmount, totAmount
                  FROM payment
                  WHERE user_id = ?
                  ORDER BY payment_id DESC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Create new payment
     * 
     * @param array $paymentData Payment data
     * @return int|false New payment ID or false on failure
     */
    public function createPayment($paymentData) {
        $query = "INSERT INTO payment (user_id, booking_id, payment_type, payment_method, balAmount, totAmount)
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $params = [
            $paymentData['user_id'],
            $paymentData['booking_id'],
            $paymentData['payment_type'],
            $paymentData['payment_method'],
            $paymentData['balAmount'],
            $paymentData['totAmount']
        ];
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Update payment
     * 
     * @param int $paymentId Payment ID
     * @param array $paymentData Updated payment data
     * @return bool Success
     */
    public function updatePayment($paymentId, $paymentData) {
        $updates = [];
        $params = [];
        
        if (isset($paymentData['payment_type'])) {
            $updates[] = "payment_type = ?";
            $params[] = $paymentData['payment_type'];
        }
        if (isset($paymentData['payment_method'])) {
            $updates[] = "payment_method = ?";
            $params[] = $paymentData['payment_method'];
        }
        if (isset($paymentData['balAmount'])) {
            $updates[] = "balAmount = ?";
            $params[] = $paymentData['balAmount'];
        }
        if (isset($paymentData['totAmount'])) {
            $updates[] = "totAmount = ?";
            $params[] = $paymentData['totAmount'];
        }
        
        if (empty($updates)) {
            return false;
        }
        
        $params[] = $paymentId;
        $query = "UPDATE payment SET " . implode(", ", $updates) . " WHERE payment_id = ?";
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Delete payment
     * 
     * @param int $paymentId Payment ID
     * @return bool Success
     */
    public function deletePayment($paymentId) {
        $query = "DELETE FROM payment WHERE payment_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$paymentId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Get total amount paid for booking
     * 
     * @param int $bookingId Booking ID
     * @return float Total amount paid
     */
    public function getTotalAmountPaid($bookingId) {
        $query = "SELECT SUM(balAmount) as total FROM payment WHERE booking_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$bookingId]);
        $row = DatabaseHelper::fetchRow($result);
        return $row['total'] ?? 0;
    }
}
?>
