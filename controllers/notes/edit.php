<?php

session_start();

use Core\Database;
use Core\Validator;
use Core\Auth;

requireAuth();

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = Auth::id();
$errors = [];

// Validate note ID
$noteId = (int)($_GET['id'] ?? 0);
if (!$noteId) {
    abort(400);
}

// Fetch the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $noteId
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!Auth::verifyToken($_POST['csrf_token'] ?? '')) {
        $errors['csrf'] = 'Security token invalid. Please try again.';
    }

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('UPDATE notes SET body = :body WHERE id = :id', [
            'body' => $_POST['body'],
            'id' => $noteId
        ]);
        $_SESSION['success'] = 'Note updated successfully!';
        header('Location: /note?id=' . $noteId);
        exit();
    }
}

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => $errors,
    'csrf_token' => Auth::generateToken()
]);
