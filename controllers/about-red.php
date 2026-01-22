<?php

use Core\Database;

// Create a new database connection using the config
$db = new Database(
    (require base_path('config.php'))['database']
);

// Get total notes count
$result = $db->query('SELECT COUNT(*) as total FROM notes')->find();
$totalNotes = $result['total'] ?? 0;

view("about-red.view.php", [
    'heading' => 'About - Cyberpunk Red Theme',
    'totalNotes' => $totalNotes,
]);