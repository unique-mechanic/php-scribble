# Scribble

A calm learning and troubleshooting notebook for programming and IT learners.

## What you can do

- Capture free notes or start with a Concept, How-to, or Problem → Solution template.
- Organize notes into personal notebooks and tags.
- Search titles, explanations, code, and tag names; combine notebook, tag, type, and learning-status filters.
- Save a source link and a code example or shell command. Code is escaped and displayed as text.
- Mark notes as Still learning or Useful reference.
- Switch between light and dark themes; your preference is remembered in this browser.
- Use focus mode while writing or reading, view a live word count, and save with Cmd/Ctrl+S.
- Copy code snippets or wrap long lines in the reading view.

## Stack

Laravel 13, Eloquent, SQLite, Blade, Tailwind CSS 3, Alpine.js, and Vite.

## Local setup

Use a PHP runtime compatible with `composer.json` and a Node version compatible with the installed Vite version.

```sh
composer install
npm ci
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve --host=127.0.0.1 --port=8000
```

Run the `.env` copy and key-generation steps only for a new installation. Preserve an existing `.env`, application key, and database when updating a checkout.

The default SQLite database is `database/database.sqlite`. Back it up before migrations on an existing installation. Existing notes without titles, notebooks, or timestamps are supported.

For live frontend edits, run `npm run dev` alongside the PHP server.

## Checks

```sh
php artisan test
npm run build
```

Tests use an in-memory SQLite database. Feature tests cover notebook isolation, note ownership, safe source links, escaped code, tag removal, search/filter combinations, pagination, and notes with missing dates.

## Learning through the app

Follow `routes/web.php` into `NoteController` and the `notes` Blade views to see the request flow. `User`, `Notebook`, `Note`, and `Tag` demonstrate `hasMany`, `belongsTo`, and `belongsToMany` relationships. Note saving uses a database transaction and `sync()` for the pivot table. The note list demonstrates eager loading, grouped search conditions, `whereHas()`, and pagination.

Notebooks currently support creation and browsing. The learning-status filter is a manual revisit list; there is no automatic review schedule.

## Design research

See [programming notes research](docs/programming-notes-research.md) for the sources behind the workspace design and ideas for future product work.
