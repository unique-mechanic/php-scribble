<?php

session_start();

use Core\Database;
use Core\Auth;

requireAuth();

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = Auth::id();

// Validate note ID
$noteId = (int)($_GET['id'] ?? 0);
if (!$noteId) {
    abort(400);
}

// Fetch the note once
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $noteId
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!Auth::verifyToken($_POST['csrf_token'] ?? '')) {
        $_SESSION['failure'] = 'Security token invalid. Please try again.';
        header('Location: /note?id=' . $noteId);
        exit();
    }

    $db->query('DELETE FROM notes WHERE id = :id', [
        'id' => $noteId
    ]);

    $_SESSION['success'] = 'Note deleted successfully!';
    header('Location: /notes');
    exit();
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
    'csrf_token' => Auth::generateToken()
]);