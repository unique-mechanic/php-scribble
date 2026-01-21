<?php

session_start();

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

// Kinda gross, yes? We'll refactor toward a cleaner approach in episode 33.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    $_SESSION['success'] = 'Note deleted successfully!';
    header('location: /notes');
    exit();
} else {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}