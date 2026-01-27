# Phase 1 Security Fixes - Testing Guide

## Overview
Phase 1 implements core security features: Authentication System, XSS Protection, CSRF Protection, and replacing hardcoded user IDs.

---

## Changes Made

### 1. Authentication System
- **New Files:**
  - `Core/Auth.php` - Authentication helper class
  - `controllers/auth/login.php` - Login page controller
  - `controllers/auth/logout.php` - Logout handler
  - `views/auth/login.view.php` - Login form view

### 2. XSS Protection
- **New Function:** `e()` in `Core/functions.php` - Short alias for escaping HTML
- **New Class:** `Core/Security.php` - Security utilities
- **Updated Views:** All note views now escape user input with `e()` function

### 3. CSRF Protection  
- **Auth Methods:** `Auth::generateToken()` and `Auth::verifyToken()` in `Core/Auth.php`
- **Updated Controllers:** All note forms now include CSRF token validation
- **Updated Forms:** All forms include hidden `csrf_token` input fields

### 4. User-Based Access Control
- **Removed:** Hardcoded `user_id = 1` from all controllers
- **Added:** `Auth::id()` to get current user's ID from session
- **Added:** `requireAuth()` function to protect routes
- **Added:** Integer validation on `$_GET['id']` parameters

---

## Setup Requirements

### Database Setup
You need a `users` table in your database. Create it with:

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a test user (password: "password")
INSERT INTO users (email, password) VALUES (
    'test@example.com',
    '$2y$10$YIjlrBxL5ZhKr2HcQVQ0Zu5ScXPzrGqzpJfMZIzLF3p3V9r0xaYhq'
);
```

**Test Account Credentials:**
- Email: `test@example.com`
- Password: `password`

---

## Testing Procedures

### Test 1: Authentication Flow

#### Test 1.1: Login Page Access
1. Open your browser and go to `http://localhost/login`
2. You should see a login form with Email and Password fields
3. **Expected:** Form displays correctly with cyberpunk styling

#### Test 1.2: Failed Login
1. Go to `http://localhost/login`
2. Enter invalid credentials (e.g., `wrong@example.com` / `wrongpass`)
3. Click "LOGIN"
4. **Expected:** Error message "Email or password is incorrect." appears

#### Test 1.3: Successful Login
1. Go to `http://localhost/login`
2. Enter: `test@example.com` / `password`
3. Click "LOGIN"
4. **Expected:** Redirects to `/notes` page, user is logged in

#### Test 1.4: Protected Routes
1. Logout (if logged in) or clear session
2. Try to access `http://localhost/notes` directly
3. **Expected:** Should abort with 401 (Unauthorized) or redirect to login

---

### Test 2: CSRF Protection

#### Test 2.1: Create Note CSRF Token
1. Login with test account
2. Go to `/notes/create`
3. Open browser DevTools (F12)
4. Find the hidden input: `<input type="hidden" name="csrf_token" value="...">`
5. **Expected:** Token exists and is a 64-character hex string

#### Test 2.2: CSRF Token Validation
1. Login and go to `/notes/create`
2. Copy the CSRF token value
3. Modify the token value in DevTools (change a few characters)
4. Try to submit the form
5. **Expected:** Error message "Security token invalid. Please try again."

#### Test 2.3: Create Note with Valid CSRF
1. Login and go to `/notes/create`
2. Enter note content: "Test note for CSRF validation"
3. Submit the form (CSRF token is automatically included)
4. **Expected:** Note created successfully, redirects to `/notes`

#### Test 2.4: Delete Note with CSRF
1. Go to any note (`/note?id=1`)
2. Find the delete button and inspect its form
3. **Expected:** Form contains `csrf_token` hidden input

---

### Test 3: XSS Protection

#### Test 3.1: HTML Injection Attempt
1. Login to the notes system
2. Create a new note with content: `<img src=x onerror="alert('XSS')">`
3. Submit the form
4. Go to `/notes` to view the note in the list
5. **Expected:** The HTML is escaped and displays as text, no alert pops up

#### Test 3.2: Script Tag Injection
1. Create a note with: `<script>alert('XSS')</script>`
2. Submit and view in the notes list
3. **Expected:** Script tag appears as escaped text `&lt;script&gt;...&lt;/script&gt;`, no alert appears

#### Test 3.3: Edit Note Shows Escaped Content
1. Create a note with: `<b>Bold</b> and <i>Italic</i>`
2. Click edit
3. **Expected:** The textarea displays the escaped HTML as text, not rendered HTML

#### Test 3.4: View Note Shows Escaped Content
1. Create a note with: `<!-- HTML Comment -->`
2. View the note detail page
3. **Expected:** Comment displays as text, not rendered as HTML

---

### Test 4: User-Based Access Control

#### Test 4.1: User Can Only Edit Own Notes
1. Login as `test@example.com`
2. Create a note: "My Personal Note"
3. Note the note ID (from URL)
4. Logout and login as a different user (if you have another test account)
5. Try to access `/note/edit?id={original_note_id}`
6. **Expected:** Access denied (403 Forbidden)

#### Test 4.2: User Sessions Isolated
1. Login and create a note
2. Open a private/incognito window and login as different user
3. Both should see different note lists
4. **Expected:** Each session shows only their own notes

#### Test 4.3: Invalid Note ID Handling
1. Try to access `/note?id=99999` (non-existent ID)
2. **Expected:** 404 Not Found page

#### Test 4.4: Non-Integer Note ID
1. Try to access `/note?id=abc`
2. **Expected:** 400 Bad Request or 404

---

### Test 5: Session Management

#### Test 5.1: Logout Clears Session
1. Login with test account
2. Go to any page and verify logged in (check if user info visible)
3. Click "Logout" button
4. **Expected:** Session destroyed, redirects to home page

#### Test 5.2: After Logout, Cannot Access Protected Routes
1. Logout
2. Try to access `/notes`
3. **Expected:** Redirected or shows 401 error

#### Test 5.3: Session Persists Across Pages
1. Login
2. Go to `/notes` → create note → edit note → view note
3. **Expected:** Stay logged in throughout, can access all user routes

---

## Automated Testing with cURL

### Quick Terminal Tests

**Test Login:**
```bash
curl -X POST http://localhost/login \
  -d "email=test@example.com&password=password&csrf_token=dummy" \
  -L -c cookies.txt
```

**Check Session:**
```bash
curl http://localhost/notes -b cookies.txt
```

**Test XSS - Create Note with HTML:**
```bash
curl -X POST http://localhost/notes/create \
  -d 'body=<script>alert("XSS")</script>&csrf_token=TOKEN' \
  -b cookies.txt
```

---

## Browser Console Tests

### Test XSS in Console
```javascript
// In browser console on notes list page
// Check if note content is escaped
const notes = document.querySelectorAll('[class*="note"]');
notes.forEach(note => {
    const content = note.textContent;
    if (content.includes('<script>') || content.includes('<img')) {
        console.log('FAIL: XSS vulnerability detected!');
    }
});
console.log('Pass: All content is properly escaped');
```

### Test CSRF Token Existence
```javascript
// In browser console on any note creation/edit page
const csrfToken = document.querySelector('input[name="csrf_token"]');
console.log('CSRF Token found:', !!csrfToken);
console.log('Token value length:', csrfToken?.value?.length || 0);
```

---

## Debugging Tips

### Enable Error Logging
Add to your controllers to debug authentication:
```php
error_log('User Auth Status: ' . Auth::id());
error_log('CSRF Token Valid: ' . Auth::verifyToken($_POST['csrf_token'] ?? ''));
```

### Check Session Data
```php
// Add temporarily to debug
dd($_SESSION);
```

### Database Verification
```sql
-- Check users table exists
SELECT * FROM users;

-- Check notes with user_id
SELECT id, user_id, LEFT(body, 50) as preview FROM notes;
```

---

## Common Issues & Fixes

### Issue: "Security token invalid" on every form submit
- **Cause:** CSRF token not being passed or session token not matching
- **Fix:** Ensure `session_start()` is called before generating/verifying token

### Issue: 401 errors on all protected routes
- **Cause:** `requireAuth()` function not defined or Auth::isAuthenticated() failing
- **Fix:** Make sure `Core/Auth.php` exists and `Core/functions.php` has `requireAuth()`

### Issue: XSS protection showing escaped HTML in output
- **Cause:** Escaping HTML is correct, but may look odd
- **Fix:** This is expected - `<` becomes `&lt;` which is correct behavior

### Issue: Login redirect loops
- **Cause:** Session not properly starting or Auth::id() returning null
- **Fix:** Check that `session_start()` is called at top of controllers

---

## Next Steps

After Phase 1 is tested and working:
1. Review Phase 2 items (error handling, logging)
2. Consider adding password strength requirements
3. Add account registration functionality
4. Implement "remember me" functionality
5. Add rate limiting to login attempts

---

## Summary of Security Improvements

| Issue | Before | After |
|-------|--------|-------|
| Authentication | None | Login system with sessions |
| User Isolation | All users see user_id 1 | Each user sees only their notes |
| XSS Protection | No escaping | All output escaped with `e()` |
| CSRF Protection | None | Token-based validation |
| Input Validation | Minimal | Type validation on IDs |
| Session Security | None | CSRF token per session |
