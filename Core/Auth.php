<?php

namespace Core;

class Auth
{
    /**
     * Check if a user is authenticated
     */
    public static function isAuthenticated()
    {
        return isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null;
    }

    /**
     * Get the currently authenticated user ID
     */
    public static function id()
    {
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Get the currently authenticated user data
     */
    public static function user($db = null)
    {
        if (!self::isAuthenticated() || !$db) {
            return null;
        }

        return $db->query('SELECT id, email FROM Users WHERE id = :id', [
            'id' => self::id()
        ])->find();
    }

    /**
     * Login a user
     */
    public static function login($userId)
    {
        $_SESSION['user_id'] = $userId;
    }

    /**
     * Logout the current user
     */
    public static function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }

    /**
     * Generate a CSRF token
     */
    public static function generateToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Verify CSRF token
     */
    public static function verifyToken($token)
    {
        if (empty($_SESSION['csrf_token']) || empty($token)) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }
}
