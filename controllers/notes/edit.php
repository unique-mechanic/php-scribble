<?php

session_start();

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;
$errors = [];

// Fetch the note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('UPDATE notes SET body = :body WHERE id = :id', [
            'body' => $_POST['body'],
            'id' => $_GET['id']
        ]);
        $_SESSION['success'] = 'Note updated successfully!';
        header('Location: /note?id=' . $_GET['id']);
        exit();
    }
}

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => $errors
]);
