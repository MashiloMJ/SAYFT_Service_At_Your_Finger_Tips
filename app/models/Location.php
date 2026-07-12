<?php
/**
 * Location Model
 * 
 * Handles all location/address-related database operations
 */

require_once __DIR__ . '/../helpers/DatabaseHelper.php';

class Location {
    private $conn;
    
    public function __construct($connection) {
        $this->conn = $connection;
    }
    
    /**
     * Get location by ID
     * 
     * @param int $locationId Location ID
     * @return array|null Location data
     */
    public function getLocationById($locationId) {
        $query = "SELECT location_id, user_id, province, city, suburb, street_name, stand_no
                  FROM location
                  WHERE location_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$locationId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Get locations for a user
     * 
     * @param int $userId User ID
     * @return array Locations list
     */
    public function getUserLocations($userId) {
        $query = "SELECT location_id, user_id, province, city, suburb, street_name, stand_no
                  FROM location
                  WHERE user_id = ?
                  ORDER BY location_id ASC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Get first location for a user (primary address)
     * 
     * @param int $userId User ID
     * @return array|null Location data
     */
    public function getPrimaryLocation($userId) {
        $query = "SELECT location_id, user_id, province, city, suburb, street_name, stand_no
                  FROM location
                  WHERE user_id = ?
                  LIMIT 1";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Create new location
     * 
     * @param array $locationData Location data
     * @return int|false New location ID or false on failure
     */
    public function createLocation($locationData) {
        $query = "INSERT INTO location (user_id, province, city, suburb, street_name, stand_no)
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $params = [
            $locationData['user_id'],
            $locationData['province'],
            $locationData['city'],
            $locationData['suburb'],
            $locationData['street_name'],
            $locationData['stand_no']
        ];
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Update location
     * 
     * @param int $locationId Location ID
     * @param array $locationData Updated location data
     * @return bool Success
     */
    public function updateLocation($locationId, $locationData) {
        $updates = [];
        $params = [];
        
        if (isset($locationData['province'])) {
            $updates[] = "province = ?";
            $params[] = $locationData['province'];
        }
        if (isset($locationData['city'])) {
            $updates[] = "city = ?";
            $params[] = $locationData['city'];
        }
        if (isset($locationData['suburb'])) {
            $updates[] = "suburb = ?";
            $params[] = $locationData['suburb'];
        }
        if (isset($locationData['street_name'])) {
            $updates[] = "street_name = ?";
            $params[] = $locationData['street_name'];
        }
        if (isset($locationData['stand_no'])) {
            $updates[] = "stand_no = ?";
            $params[] = $locationData['stand_no'];
        }
        
        if (empty($updates)) {
            return false;
        }
        
        $params[] = $locationId;
        $query = "UPDATE location SET " . implode(", ", $updates) . " WHERE location_id = ?";
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Delete location
     * 
     * @param int $locationId Location ID
     * @return bool Success
     */
    public function deleteLocation($locationId) {
        $query = "DELETE FROM location WHERE location_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$locationId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
}
?>
