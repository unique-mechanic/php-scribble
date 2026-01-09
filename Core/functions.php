<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function getRecentNotes($db, $limit = 3)
{
    // CONCEPT 1: Variables store data
    // $db = database object, $limit = number of notes to fetch
    
    // CONCEPT 2: Methods are functions that belong to objects
    // $db->query() is a METHOD of the Database object
    // We're asking the database to fetch notes ordered by creation date
    
    $recentNotes = $db->query(
        "SELECT * FROM notes ORDER BY created_at DESC LIMIT :limit",
        ['limit' => $limit]
    )->get();  // get() METHOD returns all results as an ARRAY
    
    // CONCEPT 3: Return the array so other code can use it
    return $recentNotes;
}