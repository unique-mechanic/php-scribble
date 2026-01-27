<?php

session_start();

use Core\Database;
use Core\Validator;
use Core\Auth;

requireAuth();

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!Auth::verifyToken($_POST['csrf_token'] ?? '')) {
        $errors['csrf'] = 'Security token invalid. Please try again.';
    }

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => Auth::id()
        ]);
        $_SESSION['success'] = 'Note created successfully!';
        header('Location: /notes');
        exit();
    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors,
    'csrf_token' => Auth::generateToken()
]);