<?php
/**
 * Database Helper
 * 
 * Provides utility functions for database operations
 */

class DatabaseHelper {
    
    /**
     * Safely execute a query and return results
     * 
     * @param mysqli $conn Database connection
     * @param string $query SQL query
     * @param array $params Query parameters for prepared statements
     * @return array|bool Results array or false on failure
     */
    public static function executeQuery($conn, $query, $params = []) {
        if (empty($params)) {
            $result = mysqli_query($conn, $query);
            if (!$result) {
                error_log("Query Error: " . mysqli_error($conn));
                return false;
            }
            return $result;
        }
        
        // Use prepared statements for parameterized queries
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare Error: " . $conn->error);
            return false;
        }
        
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        if (!$stmt->execute()) {
            error_log("Execute Error: " . $stmt->error);
            return false;
        }
        
        return $stmt->get_result();
    }
    
    /**
     * Fetch single row from result
     * 
     * @param mysqli_result|bool $result Query result
     * @return array|null
     */
    public static function fetchRow($result) {
        if (!$result || $result === false) {
            return null;
        }
        if (is_object($result) && method_exists($result, 'fetch_assoc')) {
            return $result->fetch_assoc();
        }
        return null;
    }
    
    /**
     * Fetch all rows from result
     * 
     * @param mysqli_result|bool $result Query result
     * @return array
     */
    public static function fetchAll($result) {
        $rows = [];
        if ($result && $result !== false && is_object($result) && method_exists($result, 'fetch_assoc')) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    
    /**
     * Escape string for SQL (legacy support, use prepared statements instead)
     * 
     * @param mysqli $conn Database connection
     * @param string $string String to escape
     * @return string
     */
    public static function escapeString($conn, $string) {
        return mysqli_real_escape_string($conn, $string);
    }
    
    /**
     * Get number of rows affected by last query
     * 
     * @param mysqli $conn Database connection
     * @return int
     */
    public static function getAffectedRows($conn) {
        return mysqli_affected_rows($conn);
    }
    
    /**
     * Get last insert ID
     * 
     * @param mysqli $conn Database connection
     * @return int
     */
    public static function getLastInsertId($conn) {
        return mysqli_insert_id($conn);
    }
}
?>
