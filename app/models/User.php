<?php
/**
 * User Model
 * 
 * Handles all user-related database operations
 */

require_once __DIR__ . '/../helpers/DatabaseHelper.php';

class User {
    private $conn;
    
    public function __construct($connection) {
        $this->conn = $connection;
    }
    
    /**
     * Get user by ID
     * 
     * @param int $userId User ID
     * @return array|null User data
     */
    public function getUserById($userId) {
        $query = "SELECT user_id, name, surname, email, phone_number, account_type, age, gender, id_number 
                  FROM user WHERE user_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Get user by email
     * 
     * @param string $email User email
     * @return array|null User data
     */
    public function getUserByEmail($email) {
        $query = "SELECT user_id, name, surname, email, phone_number, account_type, password, age, gender, id_number 
                  FROM user WHERE email = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$email]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Create new user
     * 
     * @param array $userData User data
     * @return int|false New user ID or false on failure
     */
    public function createUser($userData) {
        $query = "INSERT INTO user (name, surname, email, phone_number, password, account_type, age, gender, id_number) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $params = [
            $userData['name'],
            $userData['surname'],
            $userData['email'],
            $userData['phone_number'],
            $userData['password'],
            $userData['account_type'],
            $userData['age'],
            $userData['gender'],
            $userData['id_number']
        ];
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Update user information
     * 
     * @param int $userId User ID
     * @param array $userData Updated user data
     * @return bool Success
     */
    public function updateUser($userId, $userData) {
        $updates = [];
        $params = [];
        
        if (isset($userData['name'])) {
            $updates[] = "name = ?";
            $params[] = $userData['name'];
        }
        if (isset($userData['surname'])) {
            $updates[] = "surname = ?";
            $params[] = $userData['surname'];
        }
        if (isset($userData['phone_number'])) {
            $updates[] = "phone_number = ?";
            $params[] = $userData['phone_number'];
        }
        if (isset($userData['age'])) {
            $updates[] = "age = ?";
            $params[] = $userData['age'];
        }
        
        if (empty($updates)) {
            return false;
        }
        
        $params[] = $userId;
        $query = "UPDATE user SET " . implode(", ", $updates) . " WHERE user_id = ?";
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Change user password
     * 
     * @param int $userId User ID
     * @param string $hashedPassword Hashed password
     * @return bool Success
     */
    public function changePassword($userId, $hashedPassword) {
        $query = "UPDATE user SET password = ? WHERE user_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$hashedPassword, $userId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Get all users by account type
     * 
     * @param string $accountType Account type
     * @return array Users list
     */
    public function getUsersByType($accountType) {
        $query = "SELECT user_id, name, surname, email, phone_number, account_type 
                  FROM user WHERE account_type = ? ORDER BY name ASC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$accountType]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Delete user account
     * 
     * @param int $userId User ID
     * @return bool Success
     */
    public function deleteUser($userId) {
        $query = "DELETE FROM user WHERE user_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
}
?>
