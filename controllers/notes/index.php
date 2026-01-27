<?php

session_start();

use Core\Database;
use Core\Auth;

requireAuth();

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [
    'user_id' => Auth::id()
])->get();

$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
unset($_SESSION['success']);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
    'success' => $success
]);