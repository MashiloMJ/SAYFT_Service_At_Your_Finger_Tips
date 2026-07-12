<?php
/**
 * Validation Helper
 * 
 * Provides utility functions for input validation
 */

class ValidationHelper {
    
    /**
     * Validate email format
     * 
     * @param string $email Email to validate
     * @return bool
     */
    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Validate phone number (South African format)
     * 
     * @param string $phone Phone number to validate
     * @return bool
     */
    public static function isValidPhone($phone) {
        // Simple validation - allows 10 digits starting with 0
        return preg_match('/^0[0-9]{9}$/', str_replace([' ', '-', '(', ')'], '', $phone));
    }
    
    /**
     * Validate ID number (South African format)
     * 
     * @param string $idNumber ID number to validate
     * @return bool
     */
    public static function isValidIdNumber($idNumber) {
        // South African ID: 13 digits
        return preg_match('/^[0-9]{13}$/', $idNumber);
    }
    
    /**
     * Validate password strength
     * 
     * @param string $password Password to validate
     * @return bool
     */
    public static function isStrongPassword($password) {
        // At least 8 characters, 1 uppercase, 1 lowercase, 1 number
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }
    
    /**
     * Validate numeric value
     * 
     * @param mixed $value Value to check
     * @return bool
     */
    public static function isNumeric($value) {
        return is_numeric($value) && $value > 0;
    }
    
    /**
     * Sanitize string input
     * 
     * @param string $input Input to sanitize
     * @return string
     */
    public static function sanitizeString($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Validate file upload
     * 
     * @param array $file File from $_FILES
     * @param array $allowedTypes Allowed file types
     * @param int $maxSize Maximum file size in bytes
     * @return array ['valid' => bool, 'error' => string|null]
     */
    public static function validateFileUpload($file, $allowedTypes = ['jpeg', 'jpg', 'png'], $maxSize = 5242880) {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return ['valid' => false, 'error' => 'No file uploaded'];
        }
        
        if ($file['size'] > $maxSize) {
            return ['valid' => false, 'error' => 'File size exceeds limit'];
        }
        
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedTypes)) {
            return ['valid' => false, 'error' => 'File type not allowed'];
        }
        
        return ['valid' => true, 'error' => null];
    }
    
    /**
     * Validate date format
     * 
     * @param string $date Date string to validate
     * @param string $format Expected date format
     * @return bool
     */
    public static function isValidDate($date, $format = 'Y-m-d') {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
?>
