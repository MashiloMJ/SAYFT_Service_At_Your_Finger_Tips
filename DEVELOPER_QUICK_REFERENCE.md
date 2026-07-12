# SAYFT Developer Quick Reference

## File Locations Quick Map

### Entry Points
```
public/index.php              → Main homepage/router
login.php                     → Login page
register.php                  → Registration
admin/                        → Admin dashboard
```

### Core Application Files
```
app/config/config.php         → Global settings, constants
app/config/database.php       → Database connection
```

### Models (Database Layer)
```
app/models/User.php           → User operations
app/models/Service.php        → Service operations
app/models/Booking.php        → Booking operations
app/models/Payment.php        → Payment operations
app/models/Location.php       → Address/location operations
```

### Helpers (Utility Functions)
```
app/helpers/AuthHelper.php    → Authentication, session, login/logout
app/helpers/DatabaseHelper.php → Safe queries, prepared statements
app/helpers/ValidationHelper.php → Email, phone, password validation
app/helpers/FormHelper.php    → Forms, CSRF, error messages
```

### Database
```
db/sayft.sql                  → Database schema and initial data
```

### Assets
```
public/css/                   → CSS stylesheets
public/js/                    → JavaScript files
public/images/                → Images and media
```

### Logs & Cache
```
logs/                         → Error and activity logs
cache/                        → Temporary cached data
```

---

## Common Code Patterns

### Require Configuration
```php
<?php
require_once __DIR__ . '/app/config/config.php';
// This automatically includes database connection
```

### Use a Model
```php
<?php
require_once __DIR__ . '/app/models/User.php';

$userModel = new User($conn);
$user = $userModel->getUserById(1);
echo $user['name']; // John
?>
```

### Validate Input
```php
<?php
require_once __DIR__ . '/app/helpers/ValidationHelper.php';

$email = $_POST['email'] ?? '';
if (!ValidationHelper::isValidEmail($email)) {
    echo "Invalid email";
}
?>
```

### Check Authentication
```php
<?php
require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/helpers/AuthHelper.php';

// Require login
AuthHelper::requireLogin();

// Require specific account type
AuthHelper::requireLogin(ACCOUNT_ADMIN);

// Get user info
$userId = AuthHelper::getUserId();
?>
```

### Handle Form Submission
```php
<?php
require_once __DIR__ . '/app/helpers/FormHelper.php';

if (FormHelper::isFormSubmitted()) {
    $email = FormHelper::getPost('email');
    $password = FormHelper::getPost('password');
    
    // Verify CSRF
    if (!FormHelper::verifyCSRFToken()) {
        die('Invalid security token');
    }
    
    // Process form...
}
?>
```

### Generate Form with CSRF
```html
<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <?php echo FormHelper::csrfTokenField(); ?>
    <button type="submit">Login</button>
</form>
```

### Display Messages
```php
<?php
echo FormHelper::successMessage("User created successfully!");
echo FormHelper::errorMessage("Password is too weak");
echo FormHelper::infoMessage("Please verify your email");
?>
```

---

## Constants Available

### Account Types
```php
ACCOUNT_CLIENT              = 'Client'
ACCOUNT_SERVICE_PROVIDER    = 'Service Provider'
ACCOUNT_ADMIN               = 'Admin'
```

### Booking Status
```php
BOOKING_PENDING    = 0
BOOKING_COMPLETED  = 1
```

### Payment Types
```php
PAYMENT_DEPOSIT     = 'Deposit'
PAYMENT_FULL_AMOUNT = 'Full Amount'
```

### Payment Methods
```php
PAYMENT_METHOD_EFT  = 'EFT'
PAYMENT_METHOD_CARD = 'Card'
PAYMENT_METHOD_CASH = 'Cash'
```

### Configuration
```php
APP_NAME            = 'SAYFT'
APP_VERSION         = '2.0'
BASE_URL            = 'http://localhost/SAYFT/'
DB_HOST             = 'localhost'
DB_USER             = 'root'
DB_PASS             = ''
DB_NAME             = 'sayft'
```

---

## Database Tables Summary

```
user
├── user_id (PK)
├── name, surname, email, phone_number
├── password (use bcrypt!)
├── account_type (Client, Service Provider, Admin)
├── id_number, age, gender

service
├── service_id (PK)
├── user_id (FK to user)
├── service_type (Tents, Food, Catering, etc.)
├── quantity
├── image
├── description
└── price

booking
├── booking_id (PK)
├── user_id (FK to user)
├── booking_date
└── status (0=pending, 1=completed)

booking_details
├── bd_id (PK)
├── booking_id (FK to booking)
├── user_id (FK to user)
├── service_id (FK to service)
├── qty
└── price

payment
├── payment_id (PK)
├── user_id (FK to user)
├── booking_id (FK to booking)
├── payment_type (Deposit, Full Amount)
├── payment_method (EFT, Card, Cash)
├── balAmount
└── totAmount

location
├── location_id (PK)
├── user_id (FK to user)
├── province, city, suburb
├── street_name
└── stand_no
```

---

## Performance Tips

### DON'T Do This
```php
// ✗ Slow: Creates 3 separate queries
$user = getUserById($id);
$location = getLocationByUserId($id);
$bookings = getBookingsByUserId($id);
```

### DO This Instead
```php
// ✓ Fast: Single query with JOIN
$sql = "SELECT u.*, l.*, COUNT(b.booking_id) as total
        FROM user u
        LEFT JOIN location l ON u.user_id = l.user_id
        LEFT JOIN booking b ON u.user_id = b.user_id
        WHERE u.user_id = ?
        GROUP BY u.user_id";
```

### Cache Results
```php
// Cache service list for 1 hour
$cacheKey = 'services_list_' . date('Y-m-d-H');
if (!isset($_SESSION[$cacheKey])) {
    $_SESSION[$cacheKey] = $serviceModel->getAllServices();
}
$services = $_SESSION[$cacheKey];
```

### Use Pagination
```php
$page = FormHelper::getGet('page', 1);
$limit = 20;
$offset = ($page - 1) * $limit;

$bookings = $bookingModel->getAllBookings(null, $limit, $offset);
```

---

## Security Checklist

- [ ] Use prepared statements (DatabaseHelper does this)
- [ ] Validate all inputs (use ValidationHelper)
- [ ] Hash passwords with bcrypt (use password_hash())
- [ ] Add CSRF tokens to forms (use FormHelper::csrfTokenField())
- [ ] Escape output (use htmlspecialchars())
- [ ] Check user permissions (use AuthHelper::requireLogin())
- [ ] Use HTTPS in production
- [ ] Keep SQL queries safe from injection

---

## Common Tasks

### Add User
```php
$userModel = new User($conn);
$userId = $userModel->createUser([
    'name' => 'John',
    'surname' => 'Doe',
    'email' => 'john@example.com',
    'phone_number' => '0721234567',
    'password' => password_hash('secure_pass', PASSWORD_BCRYPT),
    'account_type' => ACCOUNT_CLIENT,
    'age' => 25,
    'gender' => 'Male',
    'id_number' => '9502015696082'
]);
```

### Get User Email
```php
$userModel = new User($conn);
$user = $userModel->getUserByEmail('john@example.com');
if ($user && password_verify($password, $user['password'])) {
    AuthHelper::login($user['user_id'], $user['email'], $user['account_type']);
}
```

### Create Booking
```php
$bookingModel = new Booking($conn);
$bookingId = $bookingModel->createBooking($userId, BOOKING_PENDING);

// Add items to booking
$bookingModel->addBookingItem($bookingId, $userId, 15, 5, 100.00);
$bookingModel->addBookingItem($bookingId, $userId, 14, 2, 500.00);
```

### Record Payment
```php
$paymentModel = new Payment($conn);
$paymentId = $paymentModel->createPayment([
    'user_id' => $userId,
    'booking_id' => $bookingId,
    'payment_type' => PAYMENT_DEPOSIT,
    'payment_method' => PAYMENT_METHOD_EFT,
    'balAmount' => 500.00,
    'totAmount' => 2000.00
]);
```

### Add Address
```php
$locationModel = new Location($conn);
$locationId = $locationModel->createLocation([
    'user_id' => $userId,
    'province' => 'Gauteng',
    'city' => 'Pretoria',
    'suburb' => 'Soshanguve',
    'street_name' => '88 Jaivane',
    'stand_no' => '73'
]);
```

---

## Debugging Tips

### Enable Error Logging
```php
// In app/config/config.php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../../logs/error.log');
```

### Check Logs
```bash
tail -f logs/error.log          # View real-time errors
grep "SQL" logs/error.log       # Find SQL errors
```

### Debug Query
```php
echo "Debug: SQL Query = " . $query;
echo "Debug: Params = " . print_r($params, true);
var_dump($result);
```

### Test Database Connection
```php
require_once 'app/config/database.php';
if ($conn) {
    echo "Connected!";
} else {
    echo "Connection failed: " . mysqli_error();
}
```

---

## File Organization Rules

When adding new files:
1. **Utility functions** → `app/helpers/FeatureHelper.php`
2. **Database class** → `app/models/Feature.php`
3. **Processing logic** → `app/controllers/FeatureController.php`
4. **Display template** → `app/views/feature.php`
5. **Static files** → `public/css/`, `public/js/`, `public/images/`

---

## Quick Links

- **Configuration**: `app/config/config.php`
- **Database Setup**: `db/sayft.sql`
- **Full Structure Guide**: `PROJECT_RESTRUCTURING_GUIDE.md`
- **Performance Guide**: `PERFORMANCE_RECOMMENDATIONS.md`
- **Implementation Plan**: `IMPLEMENTATION_CHECKLIST.md`
- **Main Readme**: `README.md`

---

## Important Files to Know

| File | Purpose | Modified? |
|------|---------|-----------|
| `app/config/config.php` | Global settings | ✓ NEW |
| `app/config/database.php` | DB connection | ✓ NEW |
| `app/helpers/AuthHelper.php` | Authentication | ✓ NEW |
| `app/helpers/ValidationHelper.php` | Validation | ✓ NEW |
| `app/helpers/DatabaseHelper.php` | DB utils | ✓ NEW |
| `app/helpers/FormHelper.php` | Form handling | ✓ NEW |
| `app/models/User.php` | User data | ✓ NEW |
| `app/models/Service.php` | Service data | ✓ NEW |
| `app/models/Booking.php` | Booking data | ✓ NEW |
| `app/models/Payment.php` | Payment data | ✓ NEW |
| `app/models/Location.php` | Location data | ✓ NEW |
| `db/sayft.sql` | Database schema | - |
| `public/index.php` | Main entry | - |
| `README.md` | Documentation | ✓ UPDATED |

---

## Support

Need help? Check these files in order:
1. This file (Quick Reference)
2. `README.md` (Overview & examples)
3. `PROJECT_RESTRUCTURING_GUIDE.md` (Detailed architecture)
4. Code comments in the actual class files
