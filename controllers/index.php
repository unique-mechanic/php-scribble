<?php

session_start();

// CONCEPT 4: Create instances - new Database object
use Core\Database;

// Create a new database connection using the config
$db = new Database(
    (require base_path('config.php'))['database']
);

// CONCEPT 5: Using a function we created
// Fetch the 3 most recent notes
$recentNotes = getRecentNotes($db, 3);

// Pass the data to the view (template)
view("index.view.php", [
    'heading' => 'Home',
    'recentNotes' => $recentNotes,  // Send the array to the template
]);