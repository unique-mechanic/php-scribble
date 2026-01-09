<?php

session_start();

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->get();

$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
unset($_SESSION['success']);

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
    'success' => $success
]);