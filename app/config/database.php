<?php
/**
 * Database Configuration File
 * 
 * Centralized database connection management
 * Handles connection to MySQL/MariaDB database
 */

// Database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sayft');

/**
 * Establish database connection
 * 
 * @return mysqli|bool Connection object or false on failure
 */
function getDBConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if (!$conn) {
        error_log("Database Connection Error: " . mysqli_connect_error());
        die("Database connection failed. Please try again later.");
    }
    
    // Set charset to utf8mb4 for better character support
    mysqli_set_charset($conn, "utf8mb4");
    
    return $conn;
}

/**
 * Close database connection
 * 
 * @param mysqli $conn Database connection object
 * @return bool
 */
function closeDBConnection($conn) {
    if ($conn) {
        return mysqli_close($conn);
    }
    return false;
}

// Get connection for use in files that include this
$conn = getDBConnection();
?>
