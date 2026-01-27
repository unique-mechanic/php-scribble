<?php

session_start();

use Core\Auth;

// Verify CSRF token for logout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (Auth::verifyToken($_POST['csrf_token'] ?? '')) {
        Auth::logout();
        $_SESSION['success'] = 'Logged out successfully!';
    }
}

header('Location: /');
exit();
