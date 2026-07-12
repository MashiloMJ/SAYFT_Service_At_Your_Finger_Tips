<?php
/**
 * Service Model
 * 
 * Handles all service-related database operations
 */

require_once __DIR__ . '/../helpers/DatabaseHelper.php';

class Service {
    private $conn;
    
    public function __construct($connection) {
        $this->conn = $connection;
    }
    
    /**
     * Get service by ID
     * 
     * @param int $serviceId Service ID
     * @return array|null Service data
     */
    public function getServiceById($serviceId) {
        $query = "SELECT s.service_id, s.user_id, s.service_type, s.quantity, s.image, s.description, s.price,
                         u.name, u.surname, u.email, u.phone_number
                  FROM service s
                  LEFT JOIN user u ON s.user_id = u.user_id
                  WHERE s.service_id = ?";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$serviceId]);
        return DatabaseHelper::fetchRow($result);
    }
    
    /**
     * Get all services
     * 
     * @param int|null $limit Limit number of results
     * @param int $offset Offset for pagination
     * @return array Services list
     */
    public function getAllServices($limit = null, $offset = 0) {
        $query = "SELECT s.service_id, s.user_id, s.service_type, s.quantity, s.image, s.description, s.price,
                         u.name, u.surname
                  FROM service s
                  LEFT JOIN user u ON s.user_id = u.user_id
                  ORDER BY s.service_type ASC";
        
        if ($limit) {
            $query .= " LIMIT ? OFFSET ?";
            $result = DatabaseHelper::executeQuery($this->conn, $query, [$limit, $offset]);
        } else {
            $result = DatabaseHelper::executeQuery($this->conn, $query);
        }
        
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Get services by type
     * 
     * @param string $serviceType Service type
     * @return array Services list
     */
    public function getServicesByType($serviceType) {
        $query = "SELECT s.service_id, s.user_id, s.service_type, s.quantity, s.image, s.description, s.price,
                         u.name, u.surname
                  FROM service s
                  LEFT JOIN user u ON s.user_id = u.user_id
                  WHERE s.service_type = ?
                  ORDER BY s.service_id ASC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$serviceType]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Get services by provider (user)
     * 
     * @param int $userId User ID (Service Provider)
     * @return array Services list
     */
    public function getServicesByProvider($userId) {
        $query = "SELECT service_id, service_type, quantity, image, description, price
                  FROM service
                  WHERE user_id = ?
                  ORDER BY service_id DESC";
        $result = DatabaseHelper::executeQuery($this->conn, $query, [$userId]);
        return DatabaseHelper::fetchAll($result);
    }
    
    /**
     * Create new service
     * 
     * @param array $serviceData Service data
     * @return int|false New service ID or false on failure
     */
    public function createService($serviceData) {
        $query = "INSERT INTO service (user_id, service_type, quantity, image, description, price)
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $params = [
            $serviceData['user_id'],
            $serviceData['service_type'],
            $serviceData['quantity'],
            $serviceData['image'],
            $serviceData['description'],
            $serviceData['price']
        ];
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getLastInsertId($this->conn);
    }
    
    /**
     * Update service
     * 
     * @param int $serviceId Service ID
     * @param array $serviceData Updated service data
     * @return bool Success
     */
    public function updateService($serviceId, $serviceData) {
        $updates = [];
        $params = [];
        
        if (isset($serviceData['service_type'])) {
            $updates[] = "service_type = ?";
            $params[] = $serviceData['service_type'];
        }
        if (isset($serviceData['quantity'])) {
            $updates[] = "quantity = ?";
            $params[] = $serviceData['quantity'];
        }
        if (isset($serviceData['image'])) {
            $updates[] = "image = ?";
            $params[] = $serviceData['image'];
        }
        if (isset($serviceData['description'])) {
            $updates[] = "description = ?";
            $params[] = $serviceData['description'];
        }
        if (isset($serviceData['price'])) {
            $updates[] = "price = ?";
            $params[] = $serviceData['price'];
        }
        
        if (empty($updates)) {
            return false;
        }
        
        $params[] = $serviceId;
        $query = "UPDATE service SET " . implode(", ", $updates) . " WHERE service_id = ?";
        
        DatabaseHelper::executeQuery($this->conn, $query, $params);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
    
    /**
     * Delete service
     * 
     * @param int $serviceId Service ID
     * @return bool Success
     */
    public function deleteService($serviceId) {
        $query = "DELETE FROM service WHERE service_id = ?";
        DatabaseHelper::executeQuery($this->conn, $query, [$serviceId]);
        return DatabaseHelper::getAffectedRows($this->conn) > 0;
    }
}
?>
