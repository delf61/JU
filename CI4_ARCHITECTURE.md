# CI4 ARCHITECTURE

This document outlines the proposed clean CodeIgniter 4 architecture for the modern version of the legacy DOS JU application.

## 1. Directory Structure
```
app/
├── Config/
│   ├── Database.php          # Connection to MariaDB (`ju_migration` DB)
│   ├── Routes.php            # Modular routing
│   └── ...
├── Controllers/
│   ├── BaseController.php    # Common dependencies
│   ├── CashbookController.php
│   ├── InvoiceController.php
│   ├── PartnerController.php
│   ├── AssetController.php
│   ├── PropertyController.php
│   └── ...
├── Models/
│   ├── BaseModel.php         # Custom model extensions if needed
│   ├── CashbookModel.php     # Interacts with `pd` table
│   ├── InvoiceModel.php      # Interacts with `kp`, `kz` tables
│   ├── PartnerModel.php      # Interacts with `udajo` table
│   └── ...
├── Services/
│   ├── CashbookService.php   # Handles business logic (summaries, closures)
│   ├── InvoiceService.php    # Payment matching, VAT calculations
│   ├── VatService.php        # Dedicated DPH logic
│   └── ...
├── Entities/                 # (Optional DTOs if complex casting is needed)
│   ├── Transaction.php
│   ├── Partner.php
│   └── ...
├── Validation/               # Custom CI4 Validation rules
│   └── Rules.php
├── Views/
│   ├── layout/
│   │   ├── header.php
│   │   └── footer.php
│   ├── cashbook/
│   ├── invoices/
│   └── ...
└── ...

public/
├── css/
│   └── style.css
├── js/
│   ├── main.js               # Entry point
│   ├── modules/
│   │   ├── cashbook.js       # ES6 module for cashbook UI interactions
│   │   ├── datatable.js      # Reusable vanilla JS table handler
│   │   └── api.js            # fetch() wrapper
│   └── ...
```

## 2. Layer Responsibilities

### Controllers
- Receive HTTP Request (GET/POST).
- Call appropriate Validation rules.
- Delegate business logic to the corresponding `Service`.
- Return HTTP Response (HTML View or JSON API response).
- **Rule:** ZERO business logic or database queries inside the Controller.

### Services
- Contain the actual accounting and business rules (e.g., FAND `MERGE` logic translated to PHP logic).
- Can utilize multiple `Models` to aggregate data.
- Handle database transactions (`$db->transStart() / $db->transComplete()`) when multiple tables are updated.
- Designed to be easily testable (PHPUnit) without an HTTP request.

### Models
- Direct mapping to MariaDB tables.
- Extend `CodeIgniter\Model`.
- Handle specific SQL queries, joins, and FAND-style filtering logic.
- Return arrays or Entities.

## 3. JavaScript Architecture
- **No jQuery, No Heavy Frameworks (React/Vue/Angular)** unless strictly required by user scope later.
- Use Modern **Vanilla JS (ES6+)**.
- Organize logic into ES modules (`import / export`).
- Use `fetch()` for AJAX calls to CI4 Controllers (if using API endpoints for dynamic table updates).
- Event delegation for UI interactions to keep memory footprint low and DOM manipulation fast.

## 4. Authentication & Authorization
- Implement standard CI4 Session management.
- Given the accounting nature, a simple `AuthService` will handle login/logout.
- Middleware (CI4 Filters) applied globally or per-route to protect endpoints (`AuthFilter`).

## 5. Routing
- Modular approach grouped by business domain:
```php
$routes->group('cashbook', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'CashbookController::index');
    $routes->post('add', 'CashbookController::create');
});
```
