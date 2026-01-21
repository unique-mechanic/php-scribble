# CyberNotes - Futuristic Note Taking App 🌆

A modern, cyberpunk-themed note-taking application built with **PHP**, **Tailwind CSS**, and **DaisyUI**.

## 🎨 Features

- ✨ **Futuristic Cyberpunk UI** - Neon colors, glowing effects, terminal-like design
- 📝 **Create Notes** - Add new notes with a beautiful form
- 📋 **View All Notes** - See all your notes in a grid layout
- 👁️ **View Note Details** - Click on any note to see full content
- ✗ **Delete Notes** - Remove notes permanently with confirmation
- 💬 **Success Messages** - Get feedback on your actions
- 🎯 **Responsive Design** - Works on all screen sizes

---

## 🚀 Quick Start

### Prerequisites
- **PHP** 7.4 or higher
- **MySQL** or **MariaDB**
- **Composer** (optional, for dependency management)

### Installation

**1. Clone or navigate to the project**

```bash
cd /Users/uma/code/php_project
```

**2. Create the database**

```bash
mysql -u root -p
CREATE DATABASE myapp;
USE myapp;

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    body TEXT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**3. Start the PHP server**

```bash
php -S localhost:8000 -t public
```

**4. Open in browser**

Go to: `http://localhost:8000`

**5. Stop the server**

Press `Ctrl+C` in your terminal

---

## 📂 Project Structure

```
php_project/
├── config.php                 # Database configuration
├── routes.php                 # Route definitions
├── public/
│   └── index.php             # Entry point
├── controllers/
│   ├── index.php
│   ├── about.php
│   ├── contact.php
│   └── notes/
│       ├── index.php         # List all notes
│       ├── create.php        # Create note form & logic
│       └── show.php          # Show single note & delete
├── Core/
│   ├── Database.php          # Database class
│   ├── Router.php            # Router class
│   ├── Validator.php         # Validation class
│   ├── Response.php          # Response handling
│   └── functions.php         # Helper functions
└── views/
    ├── index.view.php
    ├── about.view.php
    ├── contact.view.php
    ├── notes/
    │   ├── index.view.php    # Notes list page
    │   ├── create.view.php   # Create form
    │   └── show.view.php     # Note detail page
    └── partials/
        ├── head.php          # HTML head with styles
        ├── nav.php           # Navigation bar
        ├── banner.php        # Page header
        └── footer.php        # Footer
```

---

## 🛣️ Routes

| Method | Route | Controller | Description |
|--------|-------|-----------|-------------|
| GET | `/` | `controllers/index.php` | Homepage with recent notes |
| GET | `/notes` | `controllers/notes/index.php` | All notes list |
| GET | `/notes/create` | `controllers/notes/create.php` | Create note form |
| POST | `/notes/create` | `controllers/notes/create.php` | Save new note |
| GET | `/note?id={id}` | `controllers/notes/show.php` | View single note |
| POST | `/note?id={id}` | `controllers/notes/show.php` | Delete note |
| GET | `/about` | `controllers/about.php` | About page |
| GET | `/contact` | `controllers/contact.php` | Contact page |

---

## 💻 How It Works

### Creating a Note

1. User goes to `/notes/create`
2. Form displays (handled by `controllers/notes/create.php`)
3. User fills in note body and clicks "TRANSMIT NOTE"
4. Controller validates the input
5. If valid, note is saved to database
6. Success message is stored in session
7. User is redirected to `/notes`
8. Success message displays for 5 seconds

### Deleting a Note

1. User clicks "DELETE NOTE" on a note detail page
2. JavaScript confirmation dialog appears
3. If user confirms, form is submitted via POST
4. Controller validates user owns the note
5. Note is deleted from database
6. Success message is stored in session
7. User is redirected to `/notes`

---

## 🎓 Learning Concepts

This project demonstrates:

- **PHP Basics** - Variables, functions, classes
- **Database** - MySQL queries, PDO
- **MVC Architecture** - Controllers, Views, Models
- **Routing** - URL routing and request handling
- **Sessions** - Storing user data across requests
- **Form Handling** - POST/GET requests
- **Validation** - Input validation
- **Templating** - PHP as a template engine

For detailed learning guide, see [LEARNING_GUIDE.md](LEARNING_GUIDE.md)

---

## 🌈 Styling

The app uses:

- **Tailwind CSS** - Utility-first CSS framework
- **DaisyUI** - Component library for Tailwind
- **Custom Cyberpunk Theme** - Neon colors, glowing effects
- **Fonts** - Orbitron (headings), Space Mono (body)

---

## 🔧 Troubleshooting

### Database connection error

Make sure MySQL is running and config.php has correct credentials:

```php
'host' => '127.0.0.1',
'port' => 3306,
'dbname' => 'myapp'
```

### Port 8000 already in use

Use a different port:

```bash
php -S localhost:8001 -t public
```

### Permissions error

Make sure you have read/write permissions in the project directory

---

## 📝 Git Branches

Main branches in this project:

- `main` - Stable version with all features
- `add-daisyui` - Added DaisyUI styling
- `improve-ui-styling` - Cyberpunk UI overhaul
- `add-delete-note` - Delete functionality

---

## 🚀 Future Enhancements

- [ ] User authentication/login
- [ ] Edit notes functionality
- [ ] Multiple users support
- [ ] Note categories/tags
- [ ] Search notes
- [ ] Export notes to PDF
- [ ] Dark/Light theme toggle

---

## 📄 License

This project is for learning purposes.

---

## 🤝 Contributing

This is a learning project. Feel free to fork and experiment!

---

## 💡 Tips for Learning

1. **Read the code** - Understand what each file does
2. **Modify it** - Change things and see what breaks
3. **Add features** - Try implementing new features
4. **Debug** - Use `var_dump()` or `dd()` to inspect data
5. **Read errors** - Error messages tell you what's wrong

Happy coding! 🚀
