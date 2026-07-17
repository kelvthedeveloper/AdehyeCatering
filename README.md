# Adehye Catering Services

A modern, full-featured catering service website focused on Ghanaian and African cuisine, built with PHP, MySQL, and Bootstrap 5.


## Features

### Public Features
- 🏠 **Home Page**: Hero section, featured foods, category browse
- 🍽️ **Menu Page**: Browse all food items, filter by categories, search functionality
- ℹ️ **About Page**: Company story, team, core values, stats
- 📞 **Contact Page**: Contact form, Google Map integration
- 🔐 **Authentication**: User registration & login, with auto-location detection

### Customer Features
- 🛒 **Shopping Cart**: Add, update, remove items, cart count badge in header
- 📦 **Checkout**: Delivery address, date selection (auto-detect via Geolocation API, delivery date picker (future dates only), Paystack payment integration
- 📋 **Orders**: View order history
- 🎉 **Bookings**: Event booking with event type, date, guest count, venue, special requests

### Admin Dashboard
- 🍴 **Food Management**: Create, edit, delete food items
- 📂 **Category Management**: Manage food categories
- 📦 **Order Management**: View orders, update statuses
- 📅 **Booking Management**: View bookings, update statuses
- 👥 **User Management**: Manage users
- 📊 **Reports**: Sales & reports (placeholder)

## Tech Stack

| Component | Technology |
|-----------|------------|
| Backend | PHP 8+ (Custom MVC) |
| Database | MySQL (XAMPP) |
| Frontend | Bootstrap 5.3 |
| Icons | Font Awesome |
| Payment | Paystack API |
| Geolocation | Browser Geolocation + OpenStreetMap Nominatim |
| Email | PHPMailer |

## Installation & Setup

### Prerequisites
- XAMPP (or similar with PHP 8+, MySQL)
- Composer (optional, for dependencies like PHPMailer)

### Steps
1. Clone or download the project into your XAMPP `htdocs` folder (or web root
2. Create the database using [database/schema.sql](file:///c:/xampp/htdocs/AdehyeCatering/database/schema.sql):
   ```sql
   CREATE DATABASE IF NOT EXISTS adehye_catering CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   USE adehye_catering;
   -- Run the rest of the schema.sql script
   ```
3. Update [config/config.php](file:///c:/xampp/htdocs/AdehyeCatering/config/config.php) with your database and Paystack credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'adehye_catering');

   // Paystack config
   define('PAYSTACK_SECRET_KEY', 'your_paystack_secret_key_here');
   define('PAYSTACK_PUBLIC_KEY', 'your_paystack_public_key_here');
   ```
4. Access the site at `http://localhost/AdehyeCatering`

### Default Admin Credentials
- Email: `ceo@adehyecatering.com`
- Password: (Generate your own password hash using [config/generate_admin_password.php](file:///c:/xampp/htdocs/AdehyeCatering/config/generate_admin_password.php)


## Project Structure

```
AdehyeCatering/
├── assets/                 # Public assets
│   ├── css/            # Stylesheets
│   ├── js/             # JavaScript
│   ├── images/         # Images
│   └── uploads/       # Uploaded files
├── config/             # Config files
├── controllers/        # Controllers
├── core/             # Core MVC classes
├── database/         # Database schema
├── helpers/         # Helper functions & classes
├── models/          # Models
├── routes/          # Routes
├── views/           # Views
│   ├── admin/       # Admin views
│   ├── auth/      # Auth views
│   ├── customer/  # Customer views
│   ├── food/      # Food views
│   ├── layouts/   # Layout files (header, footer)
│   └── pages/    # Public pages
├── .htaccess       # Apache rewrite rules
├── composer.json     # Composer dependencies
└── index.php        # Entry point
```


## Screenshots

### Home Page
![Home Page](Screenshots/Home%20-%20Adehye%20Catering%20Services.png)

### Menu Page
![Menu Page](Screenshots/Menu%20-%20Adehye%20Catering%20Services.png)

### About Page
![About Page](Screenshots/About%20Us%20-%20Adehye%20Catering%20Services.png)

### Contact Page
![Contact Page](Screenshots/Contact%20Us%20-%20Adehye%20Catering%20Services.png)

### Login Page
![Login Page](Screenshots/Login%20-%20Adehye%20Catering%20Services.png)

### Register Page
![Register Page](Screenshots/Register%20-%20Adehye%20Catering%20Services.png)

### Customer Dashboard (My Account)
![My Account](Screenshots/My%20Account%20-%20Adehye%20Catering%20Services.png)

### Admin Dashboard
![Admin Dashboard](Screenshots/Admin%20Dashboard%20-%20Adehye%20Catering%20Services.png)


## Configuration

Update [config/config.php](file:///c:/xampp/htdocs/AdehyeCatering/config/config.php) for:
- Database credentials
- Paystack API keys
- SMTP settings (for emails)


## Usage

### For Customers
1. Browse the menu and add items to cart
2. Register or login
3. Proceed to checkout
4. Enter delivery details (auto-detect location available)
5. Complete payment via Paystack
6. View order history and bookings in your account

### For Administrators
1. Login with admin credentials
2. Manage foods, categories, orders, and bookings
3. Update order and booking statuses


## License

(Add your license here)


## Contributing

Feel free to fork and submit pull requests!

