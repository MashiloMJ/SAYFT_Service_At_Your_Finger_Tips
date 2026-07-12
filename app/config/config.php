<?php
/**
 * Application Configuration File
 * 
 * Global settings and constants for the SAYFT application
 */

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Application name and version
define('APP_NAME', 'SAYFT');
define('APP_VERSION', '2.0');

// Base URL (update this based on your deployment)
define('BASE_URL', 'http://localhost/SAYFT/');

// Time zone
date_default_timezone_set('Africa/Johannesburg');

// Account types
define('ACCOUNT_CLIENT', 'Client');
define('ACCOUNT_SERVICE_PROVIDER', 'Service Provider');
define('ACCOUNT_ADMIN', 'Admin');

// Booking status
define('BOOKING_PENDING', 0);
define('BOOKING_COMPLETED', 1);

// Payment types
define('PAYMENT_DEPOSIT', 'Deposit');
define('PAYMENT_FULL_AMOUNT', 'Full Amount');

// Payment methods
define('PAYMENT_METHOD_EFT', 'EFT');
define('PAYMENT_METHOD_CARD', 'Card');
define('PAYMENT_METHOD_CASH', 'Cash');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../../logs/error.log');

// Allowed file uploads
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_IMAGE_TYPES', ['jpeg', 'jpg', 'png', 'gif']);

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');

// Include database configuration
require_once __DIR__ . '/database.php';
?>
