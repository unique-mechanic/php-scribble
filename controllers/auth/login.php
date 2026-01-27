<?php

session_start();

use Core\Database;
use Core\Validator;
use Core\Auth;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Verify CSRF token
    if (!Auth::verifyToken($_POST['csrf_token'] ?? '')) {
        $errors['csrf'] = 'Security token invalid. Please try again.';
    }

    // Validate email
    if (!Validator::email($email)) {
        $errors['email'] = 'Valid email is required.';
    }

    // Validate password
    if (!Validator::string($password, 6)) {
        $errors['password'] = 'Password is required (at least 6 characters).';
    }

    if (empty($errors)) {
        // Find user by email
        $user = $db->query('SELECT id, email, password FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            Auth::login($user['id']);
            $_SESSION['success'] = 'Logged in successfully!';
            header('Location: /notes');
            exit();
        } else {
            $errors['login'] = 'Email or password is incorrect.';
        }
    }
}

view("auth/login.view.php", [
    'heading' => 'Login',
    'email' => $email,
    'errors' => $errors,
    'csrf_token' => Auth::generateToken()
]);
