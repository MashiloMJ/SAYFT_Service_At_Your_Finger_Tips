# SAYFT Project - Restructuring Guide & Improvements

## NEW PROJECT STRUCTURE

```
SAYFT/
├── app/
│   ├── config/
│   │   ├── config.php           (Global configuration & constants)
│   │   └── database.php         (Database connection & credentials)
│   ├── controllers/             (Business logic - TO BE ORGANIZED)
│   ├── models/
│   │   ├── User.php            (User database operations)
│   │   ├── Service.php         (Service database operations)
│   │   ├── Booking.php         (Booking database operations)
│   │   ├── Payment.php         (Payment database operations)
│   │   └── Location.php        (Location/Address database operations)
│   ├── helpers/
│   │   ├── AuthHelper.php      (Authentication & session management)
│   │   ├── DatabaseHelper.php  (Database utility functions)
│   │   ├── ValidationHelper.php (Input validation)
│   │   └── FormHelper.php      (Form handling & CSRF protection)
│   └── views/                   (UI templates - TO BE ORGANIZED)
├── public/
│   ├── css/                     (CSS files - consolidated)
│   ├── js/                      (JavaScript files - consolidated)
│   ├── images/                  (Image assets)
│   └── index.php               (Public entry point)
├── db/
│   └── sayft.sql               (Database schema)
├── logs/                        (Error & access logs)
├── cache/                       (Temporary cache files)
└── vendor/                      (Third-party libraries - organize here)
    ├── phpmailer/
    └── jspdf/
```

## KEY CHANGES MADE

### 1. **Centralized Configuration** (app/config/)
- `config.php` - Global constants, timezone, error reporting, security headers
- `database.php` - Database connection management with error handling
- **Before**: Multiple files had hardcoded connection strings
- **After**: Single source of truth, easier to manage across development/production

### 2. **Database Models** (app/models/)
- Object-oriented approach to database operations
- Each model handles its entity (User, Service, Booking, Payment, Location)
- **Benefits**: 
  - Code reusability
  - Easy to maintain and test
  - Prevents SQL injection with prepared statements

**Example Usage**:
```php
require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/models/User.php';

$userModel = new User($conn);
$user = $userModel->getUserByEmail('user@example.com');
```

### 3. **Helper Classes** (app/helpers/)
- **AuthHelper** - Login, logout, session management
- **DatabaseHelper** - Safe query execution, prepared statements
- **ValidationHelper** - Email, phone, ID, password, file validation
- **FormHelper** - POST/GET retrieval, CSRF tokens, error messages

**Example Usage**:
```php
// Check if user is logged in and is an admin
AuthHelper::requireLogin(ACCOUNT_ADMIN);

// Validate email
if (ValidationHelper::isValidEmail($email)) {
    // Process email
}

// Generate CSRF token for forms
echo FormHelper::csrfTokenField();
```

### 4. **Organized Assets** (public/)
- All CSS consolidated in `public/css/`
- All JavaScript consolidated in `public/js/`
- All images in `public/images/`
- Remove redundant files and consolidate libraries

## IMMEDIATE ACTION ITEMS

### Files to Organize/Move:
1. **Controllers** (Logic files) → `app/controllers/`
   - accLogin.php → AuthController.php
   - addAccount.php → UserController.php
   - addbooking.php → BookingController.php
   - addservice.php → ServiceController.php
   - checkout.php → CartController.php
   - payment.php → PaymentController.php

2. **Views** (Display/UI files) → `app/views/`
   - index.php
   - profileDash.php
   - sprofileDash.php
   - adminDash.php
   - services.php
   - cart.php
   - bookingsdone.php

3. **Library Files** → Consolidate/Remove Duplicates
   - **REMOVE**: Duplicate jspdf.js (keep only one in vendor/)
   - **CONSOLIDATE**: Move all JS libraries to public/js/lib/
   - **CONSOLIDATE**: Move PHPMailer to vendor/phpmailer/

### Files to DELETE (Redundant/Unused):
```
- daily.php, daily1.php (duplicate reporting)
- weekly.php, weekly1.php (duplicate reporting)
- monthly.php, monthly1.php (duplicate reporting)
- dynatoclient.php, dynatoSP.php (unused dynamic imports?)
- chairs.php, drinks.php, foods.php, fridges.php, gardens.php, 
  halls.php, sofas.php, tables.php, tents.php, toilets.php 
  (these appear to be old category files - verify before deleting)
- Multiple jquery export plugins (consolidate into one solution)
```

---

## PERFORMANCE OPTIMIZATION RECOMMENDATIONS

### 1. **Image Optimization**
```
Current Issue: Large unoptimized images slow down page loads
Solutions:
- Use modern formats (WebP with PNG fallback)
- Implement lazy loading for images
- Compress images using tools like TinyPNG, ImageMagick
- Resize images appropriately (don't send 4000x3000 when displaying 200x200)
```

### 2. **Database Query Optimization**
```
Current Issues:
- Multiple queries per page (N+1 problem)
- No query caching
- Missing indexes

Solutions:
a) Add database indexes:
   ALTER TABLE user ADD INDEX email_idx (email);
   ALTER TABLE booking ADD INDEX user_idx (user_id);
   ALTER TABLE service ADD INDEX user_idx (user_id);
   ALTER TABLE booking_details ADD INDEX booking_idx (booking_id);
   ALTER TABLE payment ADD INDEX booking_idx (booking_id);
   ALTER TABLE location ADD INDEX user_idx (user_id);

b) Use JOIN queries instead of multiple queries:
   // Instead of querying booking, then querying user
   SELECT b.*, u.name, u.email FROM booking b 
   JOIN user u ON b.user_id = u.user_id;

c) Implement query result caching (5-15 min TTL for read-heavy data)

d) Use pagination instead of loading all records
```

### 3. **Asset Loading & Delivery**
```
CRITICAL ISSUE FOUND: index.php loads 60+ Google Fonts individually!
Each creates an HTTP request. This is MAJOR performance killer.

Solutions:
✗ Current: <link href="https://fonts.googleapis.com/css?family=ABeeZee"> (60 times!)
✓ Better: @import url('https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abhaya+Libre');
          (Single request for multiple fonts)
✓ Best:   Use a single, system font stack OR 2-3 curated Google Fonts

Recommended Font Stack (Remove 60+ imports):
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
OR 2-3 carefully chosen Google Fonts only.

Performance Impact: Could reduce initial page load by 30-50%!
```

### 4. **CSS & JavaScript Optimization**
```
Solutions:
a) Minify CSS and JS files
b) Combine multiple CSS files into one
c) Load JavaScript at end of body (defer non-critical scripts)
d) Use CSS preprocessors (SCSS) if expanding codebase
e) Implement lazy loading for non-critical components
f) Remove unused Bootstrap components (custom build)
g) Consider alternative to Bootstrap if bloated (use Tailwind CSS or custom)
```

### 5. **Backend Optimization**
```
a) Enable Output Buffering:
   ob_start();
   // ... page content
   ob_end_flush();

b) Implement Gzip compression in .htaccess:
   <IfModule mod_deflate.c>
     AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
   </IfModule>

c) Add browser caching headers:
   <FilesMatch "\\.(jpg|jpeg|png|gif|css|js|ico)$">
     Header set Cache-Control "max-age=31536000, public"
   </FilesMatch>

d) Implement session middleware (currently session_start() everywhere)

e) Use connection pooling for database (if switching to PDO)
```

### 6. **Frontend Optimization**
```
a) Lazy Load Images:
   <img src="placeholder.jpg" data-src="actual.jpg" loading="lazy">

b) Use CSS Grid/Flexbox instead of tables for layout

c) Minimize HTTP requests (combine files, use SVG sprites)

d) Implement service workers for offline capability

e) Use viewport meta tag for mobile optimization
```

---

## SECURITY IMPROVEMENTS NEEDED

### 1. **SQL Injection Prevention**
```
✗ Current: $query = "SELECT * FROM user WHERE email='$email'";
✓ Recommended: Use parameterized queries (already implemented in helpers)
   
The new DatabaseHelper::executeQuery() uses prepared statements.
```

### 2. **Password Security**
```
✗ Current: MD5 hashing (found in database - 12eaab111b446b732cc93aa6ba43cf80)
✓ Recommended: bcrypt or Argon2

Implementation:
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
if (password_verify($inputPassword, $hashedPassword)) {
    // Password matches
}
```

### 3. **CSRF Protection**
```
Implementation (use FormHelper):
<?php echo FormHelper::csrfTokenField(); ?>

Verify in controller:
if (!FormHelper::verifyCSRFToken()) {
    die('CSRF token validation failed');
}
```

### 4. **Input Validation**
```
Use ValidationHelper for all user inputs:
- isValidEmail()
- isValidPhone()
- isStrongPassword()
- sanitizeString()
- validateFileUpload()
```

### 5. **Session Security**
```
Add to config.php:
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);  // HTTPS only
ini_set('session.use_only_cookies', 1);
ini_set('session.gc_maxlifetime', 1800);  // 30 minutes
```

---

## DATABASE IMPROVEMENTS

### 1. **Add Missing Indexes**
```sql
-- Significantly improve query performance
ALTER TABLE user ADD UNIQUE INDEX email_unique_idx (email);
ALTER TABLE user ADD INDEX account_type_idx (account_type);
ALTER TABLE booking ADD INDEX user_date_idx (user_id, booking_date);
ALTER TABLE service ADD INDEX user_type_idx (user_id, service_type);
ALTER TABLE booking_details ADD INDEX service_idx (service_id);
ALTER TABLE payment ADD INDEX user_date_idx (user_id);
```

### 2. **Add Missing Constraints**
```sql
-- Foreign keys for referential integrity
ALTER TABLE booking ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;
ALTER TABLE booking_details ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;
ALTER TABLE booking_details ADD FOREIGN KEY (booking_id) REFERENCES booking(booking_id) ON DELETE CASCADE;
ALTER TABLE booking_details ADD FOREIGN KEY (service_id) REFERENCES service(service_id) ON DELETE CASCADE;
ALTER TABLE service ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;
ALTER TABLE location ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;
ALTER TABLE payment ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE;
ALTER TABLE payment ADD FOREIGN KEY (booking_id) REFERENCES booking(booking_id) ON DELETE CASCADE;
```

### 3. **Add Audit Fields**
```sql
-- Track record creation and modifications
ALTER TABLE user ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE user ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- Same for other tables...
ALTER TABLE service ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE booking ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
```

---

## CODE STANDARDS TO FOLLOW

### 1. **Naming Conventions**
```
- Classes: PascalCase (User, BookingController, UserModel)
- Functions/Methods: camelCase (getUserById, validateEmail)
- Constants: UPPER_SNAKE_CASE (ACCOUNT_CLIENT, DB_HOST)
- Variables: camelCase (userId, bookingDate)
- Database Tables: lowercase_plural (users, bookings, services)
- Database Columns: snake_case (user_id, booking_date, service_type)
```

### 2. **File Organization**
```
- One class per file
- Filename matches class name (User.php, BookingController.php)
- Use PSR-4 autoloading if scaling further
```

### 3. **Comments & Documentation**
```
/**
 * Brief description of what function does
 * 
 * @param type $paramName Description of parameter
 * @return type Description of return value
 */
function exampleFunction($paramName) {
    // Implementation
}
```

### 4. **Error Handling**
```
✓ Use try-catch for exceptional cases
✓ Log errors, don't display to users
✓ Return meaningful error messages
✓ Implement proper HTTP status codes
```

---

## NEXT STEPS (Recommended Order)

1. **Phase 1 (Completed)**: Create folder structure & helper classes ✓
2. **Phase 2**: Consolidate and remove duplicate/unused files
3. **Phase 3**: Add database indexes and constraints
4. **Phase 4**: Migrate old PHP files to controllers/models/views
5. **Phase 5**: Implement CSRF protection in all forms
6. **Phase 6**: Fix password hashing (MD5 → bcrypt)
7. **Phase 7**: Optimize images and assets
8. **Phase 8**: Implement query caching
9. **Phase 9**: Add error logging and monitoring
10. **Phase 10**: Performance testing and optimization

---

## QUICK REFERENCE: Using New Structure

### Login Example:
```php
<?php
require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/helpers/AuthHelper.php';
require_once __DIR__ . '/app/models/User.php';
require_once __DIR__ . '/app/helpers/ValidationHelper.php';
require_once __DIR__ . '/app/helpers/FormHelper.php';

if (FormHelper::isFormSubmitted()) {
    $email = FormHelper::getPost('email');
    $password = FormHelper::getPost('password');
    
    if (!ValidationHelper::isValidEmail($email)) {
        echo FormHelper::errorMessage('Invalid email format');
    } else {
        $userModel = new User($conn);
        $user = $userModel->getUserByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            AuthHelper::login($user['user_id'], $user['email'], $user['account_type']);
            header('Location: ' . BASE_URL . 'dashboard.php');
        } else {
            echo FormHelper::errorMessage('Invalid email or password');
        }
    }
}
?>
```

---

## CONTACT & SUPPORT
If implementing these changes, remember:
- Always backup your database first
- Test on staging before production
- Keep this guide updated as you implement changes
- Document any custom modifications
