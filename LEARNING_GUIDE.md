# PHP Learning Guide - Recent Notes Feature

## � Quick Start Guide

### Prerequisites
- PHP 7.4 or higher installed
- MySQL or MariaDB database running
- Basic command line knowledge

### Step 1: Setup the Database

Create a database called `myapp`:

```bash
mysql -u root -p
CREATE DATABASE myapp;
USE myapp;
```

Create the notes table:

```sql
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    body TEXT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Step 2: Configure the Database

Edit `config.php` and update the database settings if needed:

```php
'database' => [
    'host' => '127.0.0.1',
    'port' => 3306,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4'
]
```

### Step 3: Start the Project

Open a terminal and run:

```bash
cd /Users/uma/code/php_project
php -S localhost:8000 -t public
```

The `-S` flag starts a local server
The `-t public` flag sets the public directory as the root

### Step 4: Open in Browser

Go to: `http://localhost:8000`

### Step 5: Stop the Server

Press `Ctrl+C` in the terminal where the server is running

---

## ✨ Features You Can Try

| Feature | URL | What It Does |
|---------|-----|-------------|
| Home | `http://localhost:8000/` | View recent notes (3 most recent) |
| All Notes | `http://localhost:8000/notes` | See all your notes in a list |
| Create Note | `http://localhost:8000/notes/create` | Create a new note |
| View Note | Click any note | View full note content |
| Delete Note | On note detail page | Delete a note permanently |

---

## �📚 Concepts Covered

### 1. **Variables** - Containers for data
```php
$name = "Alice";              // String
$count = 5;                   // Integer
$notes = [];                  // Array (empty)
$isActive = true;             // Boolean
```

### 2. **Functions** - Reusable code blocks
```php
function getRecentNotes($db, $limit = 3) {
    // Parameters: $db, $limit
    // Default value: $limit = 3
    
    // Function body - the work it does
    return $recentNotes;  // Returns an array
}
```

### 3. **Objects & Methods** - Functions that belong to objects
```php
// Create an object instance
$db = new Database($config);

// Call a method (function of that object)
$db->query("SELECT * FROM notes");
```

### 4. **Arrays** - Collections of data
```php
// Indexed array (numbered keys)
$fruits = ['apple', 'banana', 'orange'];
echo $fruits[0];  // Output: apple

// Associative array (named keys)
$note = [
    'id' => 1,
    'title' => 'My Note',
    'body' => 'Content here'
];
echo $note['title'];  // Output: My Note
```

### 5. **Looping Through Arrays** - Process each item
```php
foreach ($recentNotes as $note) {
    echo $note['title'];  // Process each note
}
```

### 6. **Control Structures** - Make decisions
```php
if (count($recentNotes) > 0) {
    echo "We have notes!";
} else {
    echo "No notes yet";
}
```

## 🔄 The Data Flow

```
1. User visits homepage /
   ↓
2. controllers/index.php runs
   - Creates Database connection: new Database()
   - Calls function: getRecentNotes($db, 3)
   ↓
3. getRecentNotes() function:
   - Executes SQL query: SELECT FROM notes
   - Returns array of note data
   ↓
4. Controller passes array to view:
   view("index.view.php", ['recentNotes' => $recentNotes])
   ↓
5. views/index.view.php displays:
   - Uses foreach loop to show each note
   - Accesses data with $note['field_name']
```

## 💡 Key Functions & Methods You Learned

| Function/Method | Purpose | Example |
|---|---|---|
| `new Database()` | Create database connection | `$db = new Database($config)` |
| `$db->query()` | Execute SQL query | `$db->query("SELECT *")` |
| `->get()` | Get all results as array | `->get()` |
| `->find()` | Get one result | `->find()` |
| `getRecentNotes()` | Fetch recent notes (custom function) | `getRecentNotes($db, 3)` |
| `foreach` | Loop through array | `foreach ($array as $item)` |
| `count()` | Count array items | `count($recentNotes)` |
| `htmlspecialchars()` | Escape HTML for security | `htmlspecialchars($text)` |

## 🎯 Next Steps to Practice

### Challenge 1: Modify the limit
Change how many recent notes display on homepage.
- Find: `getRecentNotes($db, 3)`
- Change `3` to `5`

### Challenge 2: Add sorting options
Modify the SQL query to sort by creation date (oldest first instead of newest).
- Find: `ORDER BY created_at DESC`
- Change `DESC` to `ASC`

### Challenge 3: Filter by author
Modify to show notes from a specific user:
```php
WHERE user_id = :user_id ORDER BY created_at DESC
```

### Challenge 4: Create a helper function for formatting dates
Create a new function in `Core/functions.php`:
```php
function formatDate($dateString) {
    return date('M d, Y', strtotime($dateString));
}
```
Then use it in the view: `<?= formatDate($note['created_at']) ?>`

## ❓ Common Questions

**Q: What's the difference between a function and a method?**
- Function: `functionName()` - standalone code
- Method: `$object->methodName()` - belongs to an object

**Q: Why use arrays instead of variables?**
- When you have multiple items of the same type
- Example: 3 notes → array of 3 notes (not 3 separate variables)

**Q: What does `=> ` mean in foreach?**
```php
foreach ($notes as $note) {
    // $note is each item from the array
}
```

**Q: Why use htmlspecialchars()?**
- Prevents XSS attacks (malicious code injection)
- Escapes special characters for safe HTML display
