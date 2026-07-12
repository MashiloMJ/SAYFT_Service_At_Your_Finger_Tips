<?php
/**
 * Authentication Helper
 * 
 * Handles authentication and session management
 */

class AuthHelper {
    
    /**
     * Check if user is logged in
     * 
     * @return bool
     */
    public static function isLoggedIn() {
        return isset($_SESSION['user_id']) && isset($_SESSION['email']);
    }
    
    /**
     * Check if user is authenticated and has specific account type
     * 
     * @param string $accountType Account type to check
     * @return bool
     */
    public static function hasAccountType($accountType) {
        return self::isLoggedIn() && isset($_SESSION['account_type']) && 
               $_SESSION['account_type'] === $accountType;
    }
    
    /**
     * Get current user ID
     * 
     * @return int|null
     */
    public static function getUserId() {
        return $_SESSION['user_id'] ?? null;
    }
    
    /**
     * Get current user email
     * 
     * @return string|null
     */
    public static function getUserEmail() {
        return $_SESSION['email'] ?? null;
    }
    
    /**
     * Get current user account type
     * 
     * @return string|null
     */
    public static function getAccountType() {
        return $_SESSION['account_type'] ?? null;
    }
    
    /**
     * Login user - set session variables
     * 
     * @param int $userId User ID
     * @param string $email User email
     * @param string $accountType Account type
     * @return void
     */
    public static function login($userId, $email, $accountType) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $email;
        $_SESSION['account_type'] = $accountType;
        $_SESSION['login_time'] = time();
    }
    
    /**
     * Logout user - clear session variables
     * 
     * @return void
     */
    public static function logout() {
        session_destroy();
        unset($_SESSION);
    }
    
    /**
     * Require user to be logged in, redirect if not
     * 
     * @param string $accountType Optional - specific account type required
     * @return void
     */
    public static function requireLogin($accountType = null) {
        if (!self::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login.php');
            exit;
        }
        
        if ($accountType && !self::hasAccountType($accountType)) {
            header('Location: ' . BASE_URL . 'index.php');
            exit;
        }
    }
}
?>
