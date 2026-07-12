# SAYFT - Service & Events Booking Platform

## Project Overview

SAYFT is an event planning platform that connects event planners (clients) with entertainment service providers (vendors). The platform enables:
- Service providers to register and list services (tents, catering, decorations, etc.)
- Event planners to browse and book multiple services
- Admin management of bookings and users
- Payment tracking and invoicing

**Status**: Restructured and optimized (v2.0)

---

## New Project Structure

```
SAYFT/
├── app/                                    # Application core
│   ├── config/
│   │   ├── config.php                     # Global config & constants
│   │   └── database.php                   # DB connection
│   ├── controllers/                       # Business logic (TO ORGANIZE)
│   ├── models/                            # Data access layer
│   │   ├── User.php, Service.php
│   │   ├── Booking.php, Payment.php
│   │   └── Location.php
│   ├── helpers/                           # Utility functions
│   │   ├── AuthHelper.php
│   │   ├── DatabaseHelper.php
│   │   ├── ValidationHelper.php
│   │   └── FormHelper.php
│   └── views/                             # UI templates (TO ORGANIZE)
├── public/                                 # Web root
│   ├── css/, js/, images/
│   └── index.php
├── db/sayft.sql                           # Database schema
├── logs/, cache/                          # Runtime files
└── Documentation:
    ├── PROJECT_RESTRUCTURING_GUIDE.md     # Setup & migration guide
    ├── PERFORMANCE_RECOMMENDATIONS.md     # Optimization strategies
    └── README.md (this file)
```

---

## Key Improvements Made

✅ **Centralized Configuration** - Single source for DB credentials & settings
✅ **Object-Oriented Models** - User, Service, Booking, Payment, Location classes
✅ **Reusable Helpers** - Authentication, validation, forms, database operations
✅ **Security** - Prepared statements, CSRF tokens, input validation framework
✅ **Performance** - Ready for caching, indexing, query optimization
✅ **Code Standards** - Consistent naming, documentation, structure
✅ **Comprehensive Docs** - Setup guides, best practices, examples

---

## Quick Start

### 1. Import Database
```bash
mysql -u root -p < db/sayft.sql
```

### 2. Configure Database
Edit `app/config/database.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sayft');
```

### 3. Set Permissions
```bash
chmod 755 logs/ cache/ public/images/
```

### 4. Access Application
```
http://localhost/SAYFT/public/index.php
```

---

## Using New Features

### Authentication
```php
require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/helpers/AuthHelper.php';

// Check if logged in
AuthHelper::requireLogin(ACCOUNT_ADMIN);

$userId = AuthHelper::getUserId();
```

### Database Operations
```php
require_once __DIR__ . '/app/models/User.php';

$userModel = new User($conn);
$user = $userModel->getUserById(1);
$user = $userModel->getUserByEmail('user@example.com');
```

### Input Validation
```php
require_once __DIR__ . '/app/helpers/ValidationHelper.php';

if (!ValidationHelper::isValidEmail($email)) {
    echo "Invalid email";
}
```

### Form Handling
```php
require_once __DIR__ . '/app/helpers/FormHelper.php';

echo FormHelper::csrfTokenField();
echo FormHelper::errorMessage("An error occurred");
```

---

## Performance Optimizations Applied

📌 **Database**: Framework for indexes, query caching, prepared statements
📌 **Assets**: Consolidated file structure, ready for minification
📌 **Code**: Eliminated code duplication, organized into logical modules
📌 **Security**: CSRF protection, input validation, prepared statements

**See PERFORMANCE_RECOMMENDATIONS.md for:**
- Quick wins (Google Fonts, database indexes)
- Query optimization strategies
- Caching implementation
- Asset compression tips

---

## Code Standards

- **Classes**: PascalCase (`UserModel`, `BookingController`)
- **Methods**: camelCase (`getUserById`, `validateEmail`)
- **Constants**: UPPER_SNAKE_CASE (`DB_HOST`, `ACCOUNT_ADMIN`)
- **Database**: snake_case columns (`user_id`, `booking_date`)

---

## Security Features

✅ Prepared statements (SQL injection prevention)
✅ CSRF token protection framework
✅ Input validation helpers
✅ Password hashing framework (bcrypt-ready)
✅ Secure session configuration
✅ Security headers

---

## Documentation Files

| File | Purpose |
|------|---------|
| `PROJECT_RESTRUCTURING_GUIDE.md` | Detailed folder structure, migration steps, immediate actions |
| `PERFORMANCE_RECOMMENDATIONS.md` | Optimization strategies, database tuning, caching |
| `README.md` | This file - quick reference and getting started |

---

## Main Features

**For Clients**
- Browse services by category
- Book multiple services
- Manage bookings and payments
- View invoices
- Track booking status

**For Service Providers**
- Register services
- Manage inventory
- View bookings
- Update services
- Access reports

**For Admins**
- Manage users
- Monitor bookings
- Generate reports
- Handle payments
- System settings

---

## Technology Stack

- **Backend**: PHP 7.2+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, Bootstrap
- **Libraries**: jQuery, jsPDF, PHPMailer
- **Server**: Apache with mod_rewrite

---

## Next Steps

1. **Review** detailed setup in `PROJECT_RESTRUCTURING_GUIDE.md`
2. **Organize** existing PHP files into controller/view folders
3. **Migrate** old files to use new helper classes
4. **Implement** performance optimizations from guide
5. **Test** all features thoroughly
6. **Monitor** logs for issues

---

## Troubleshooting

**DB Connection Error?** → Check `app/config/database.php` credentials

**Session Issues?** → Verify `logs/` and `cache/` folders have write permissions

**Slow Performance?** → Read `PERFORMANCE_RECOMMENDATIONS.md`

---

## Support & Questions

Refer to the comprehensive guides:
- Structure questions → `PROJECT_RESTRUCTURING_GUIDE.md`
- Performance questions → `PERFORMANCE_RECOMMENDATIONS.md`
- Code examples → Check model files in `app/models/`

---

## Version

**SAYFT v2.0** - Restructured and optimized
**Last Updated**: 2024

## Opciones 

- type: Opcion(string) para especificar el tipo de exportacion (csv,txt,json,pdf)
- separator: Opcion(string) que sera util solo cuando se exportar a *csv* en donde se especifica el caracter que servira como separador entre columnas *default: ,*
- newline: Opcion(string) que sera util solo cuando se exportar a *csv* en donde se especifica los caracteres para una nueva linea *default: \r\n*
- ignoreColumns: Opcion(string) para especificar el con los selectores de css de las columnas que se ignoraran *default: ''*
- ignoreRows: Opcion(string) para especificar los selectores de css de las columnas que se ignoraran *default: ''*
- htmlContent: Opcion(bool) para indicar si el contenido de la tabla a exportar tiene codigo HTML *default: false*
- consoleLog: Opcion(bool) para indicar si se quiere que se vean los logs del proceso de exportacion *default: false*
- trimContent: Opcion(bool) que sera util solo cuando se exporta a *csv* y la cual recorta el contenido de las etiquetas individuales *\<th>*, *\<td>*  de los espacios en blanco. Esto producirá una salida válida incluso si la tabla está sangrada *default: true*
- quoteFields Opcion(bool) que sera util solo cuando se exporta a *csv* y la cual cita campos *default: true*.
- filename: Opcion(string) nombre con el que el archivo se va a guardar *default: tableHTMLExport.csv*

## Options
- type: Option (string) to specify the type of export (csv, txt, json, pdf)
- separator: Option (string) that will be useful only when exporting to *csv* where the character that will serve as separator between columns is specified *default: ,*
- newline: Option (string) that will be useful only when exporting to *csv* where the characters are specified for a new line *default: \r\n*
- ignoreColumns: Option (string) to specify the with the css selectors of the columns that will be ignored *default: ''*
- ignoreRows: Option (string) to specify the css selectors of the columns to be ignored *default:''*
- htmlContent: Option (bool) to indicate if the content of the table to be exported has HTML code *default:false*
- consoleLog: Option (bool) to indicate if you want to see the logs of the export process *default: false*
- trimContent: Option (bool) that will be useful only when exported to * csv * and which trims the contents of the individual tags *\<th>*, *\<td>* of the blanks. This will produce a valid output even if the table is indented. *default: true*
- quoteFields Option (bool) that will be useful only when exported to * csv * and which cites fields *default: true*.
- filename: Option (string) name with which the file is to be saved *default: tableHTMLExport.csv*

# Ejemplos | Examples


```html
<table id="tableCompany">
  <thead>
    <tr>
      <th>Company</th>
      <th>Contact</th>
      <th class='acciones'>Country</th>
  </tr>    
  </thead>
  <tbody>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td id="primero">Maria Anders</td>
      <td class="acciones">Germany</td>
    </tr>
    <tr>
      <td>Ernst Handel</td>
      <td>Roland Mendel</td>
      <td class="acciones">Austria</td>
    </tr>
    <tr>
      <td>Island Trading</td>
      <td>Helen Bennett</td>
      <td>UK</td>
    </tr>
    <tr id="ultimo">
      <td>Magazzini Alimentari Riuniti</td>
      <td>Giovanni Rovelli</td>
      <td>Italy</td>
    </tr>
  </tbody>  
</table>
```


## Exportar a JSON | Export To JSON

[Ejemplo Funcional | Functional Example](https://codepen.io/furiosojack/pen/JmyExX?editors=1111)

```javascript
$("#tableCompany").tableHTMLExport({type:'json',filename:'tablaLicencias.json',ignoreColumns:'.acciones,#primero',ignoreRows: '#ultimo'});
```

Resultado: tablaLicencias.json
```json
{
  "header": [
    "Company",
    "Contact"
  ],
  "data": [
    [
      "Alfreds Futterkiste"
    ],
    [
      "Ernst Handel",
      "Roland Mendel"
    ],
    [
      "Island Trading",
      "Helen Bennett",
      "UK"
    ]
  ]
}

```
## Exportar a CSV | Export To CSV

```javascript
$("#tableCompany").tableHTMLExport({type:'csv',filename:'tablaLicencias.csv',ignoreColumns:'.acciones,#primero',ignoreRows: '#ultimo'});
```
Resultado: 
```csv
"Company","Contact"
"Alfreds Futterkiste","Ernst Handel","Roland Mendel"
"Island Trading","Helen Bennett"
"UK",
```

## Exportar a PDF | Export To PDF
[Ejemplo Funcional | Functional Example ](https://codepen.io/furiosojack/pen/gBxmvQ?editors=1111) 

Para exportar a PDF es requerido la libreria [jsPDF-AutoTable](https://github.com/simonbengtsson/jsPDF-AutoTable)
To export to PDF the library is required [jsPDF-AutoTable](https://github.com/simonbengtsson/jsPDF-AutoTable)

```javascript
$("#tableCompany").tableHTMLExport({type:'pdf',filename:'tablaLicencias.pdf',ignoreColumns:'.acciones,#primero',ignoreRows: '#ultimo'});
```

Resultado | Result:  
![alt text][exporPDF]

[exporPDF]: https://image.ibb.co/kZvgB9/Captura.png "Como ser ve la exportacion PDF"



