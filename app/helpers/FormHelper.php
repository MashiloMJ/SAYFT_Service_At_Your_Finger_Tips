<?php
/**
 * Form Helper
 * 
 * Provides utility functions for form generation and handling
 */

class FormHelper {
    
    /**
     * Check if form was submitted via POST
     * 
     * @param string $formId Optional form ID to check
     * @return bool
     */
    public static function isFormSubmitted($formId = null) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }
        
        if ($formId && !isset($_POST['form_id'])) {
            return false;
        }
        
        if ($formId && $_POST['form_id'] !== $formId) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Get POST value with default fallback
     * 
     * @param string $key Key to retrieve
     * @param mixed $default Default value if key doesn't exist
     * @return mixed
     */
    public static function getPost($key, $default = '') {
        return $_POST[$key] ?? $default;
    }
    
    /**
     * Get GET value with default fallback
     * 
     * @param string $key Key to retrieve
     * @param mixed $default Default value if key doesn't exist
     * @return mixed
     */
    public static function getGet($key, $default = '') {
        return $_GET[$key] ?? $default;
    }
    
    /**
     * Get REQUEST value (POST or GET)
     * 
     * @param string $key Key to retrieve
     * @param mixed $default Default value if key doesn't exist
     * @return mixed
     */
    public static function getRequest($key, $default = '') {
        return $_REQUEST[$key] ?? $default;
    }
    
    /**
     * Generate CSRF token for form
     * 
     * @return string Token
     */
    public static function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    /**
     * Verify CSRF token
     * 
     * @return bool
     */
    public static function verifyCSRFToken() {
        return isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token'];
    }
    
    /**
     * Generate hidden CSRF token field for forms
     * 
     * @return string HTML
     */
    public static function csrfTokenField() {
        return '<input type="hidden" name="csrf_token" value="' . self::generateCSRFToken() . '">';
    }
    
    /**
     * Display form error message
     * 
     * @param string $message Error message
     * @return string HTML
     */
    public static function errorMessage($message) {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
               htmlspecialchars($message) .
               '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>' .
               '</div>';
    }
    
    /**
     * Display form success message
     * 
     * @param string $message Success message
     * @return string HTML
     */
    public static function successMessage($message) {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
               htmlspecialchars($message) .
               '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>' .
               '</div>';
    }
    
    /**
     * Display form info message
     * 
     * @param string $message Info message
     * @return string HTML
     */
    public static function infoMessage($message) {
        return '<div class="alert alert-info alert-dismissible fade show" role="alert">' .
               htmlspecialchars($message) .
               '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>' .
               '</div>';
    }
}
?>
