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



## Deployment Guide

This guide covers how to deploy Adehye Catering Services to a production server.

### Deployment Options
1. Shared Hosting (cPanel)
2. VPS/Dedicated Server (Apache/Nginx)
3. Cloud Providers (AWS, DigitalOcean, Google Cloud, etc.)

---

### 1. Shared Hosting Deployment (cPanel)
#### Prerequisites
- A cPanel hosting account
- Domain name (e.g., `adehyecatering.com`)
- MySQL database access (via cPanel's MySQL Database Wizard or phpMyAdmin)

#### Step-by-Step Guide

1. **Compress Project Files**:
   - Compress all files (excluding `vendor/` and `uploads/` if using Composer locally) into a `.zip` file

2. **Upload and Extract to Server**:
   - Log into cPanel → File Manager → `public_html` directory
   - Upload your zip file and extract it

3. **Create Database and User**:
   - In cPanel, use "MySQL Database Wizard"
   - Create database (e.g., `youracc_adehye_catering`)
   - Create database user and password
   - Assign user to database with all privileges

4. **Import Database Schema**:
   - In cPanel → phpMyAdmin
   - Select your new database → Import tab
   - Import [database/schema.sql](file:///c:/xampp/htdocs/AdehyeCatering/database/schema.sql)

5. **Update Configuration**:
   - Open `config/config.php` with production database and API credentials
   ```php
   define('URLROOT', 'https://yourdomain.com'); // Replace with your actual domain
   define('DB_HOST', 'localhost'); // Usually correct for cPanel
   define('DB_USER', 'youracc_adehyeuser'); // Replace
   define('DB_PASS', 'your_secure_password'); // Replace
   define('DB_NAME', 'youracc_adehye_catering'); // Replace
   
   // Update Paystack keys (use LIVE keys for production!)
   define('PAYSTACK_SECRET_KEY', 'sk_live_your_actual_secret_key');
   define('PAYSTACK_PUBLIC_KEY', 'pk_live_your_actual_public_key');
   ```

6. **Set Permissions**:
   - Ensure `assets/uploads/` and any other writable directories have permissions 755 or 775 (not 777!)
   - In File Manager: right-click directory → Change Permissions

7. **Test the Site**:
   - Visit your domain name in a browser!

---

### 2. VPS/Dedicated Server Deployment (Ubuntu + Apache)
#### Prerequisites
- Ubuntu server (20.04/22.04 LTS recommended)
- SSH access as root or sudo user
- Domain name pointing to server IP

#### Step-by-Step Guide

1. **Update Server Packages**:
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```

2. **Install LAMP Stack**:
   ```bash
   sudo apt install apache2 mariadb-server php libapache2-mod-php php-mysql php-curl php-json php-gd php-mbstring
   ```

3. **Configure MySQL (Secure Installation)**:
   ```bash
   sudo mysql_secure_installation
   ```

4. **Create Database and User**:
   ```sql
   sudo mysql -u root -p
   CREATE DATABASE IF NOT EXISTS adehye_catering CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE USER 'adehyeuser'@'localhost' IDENTIFIED BY 'your_secure_password';
   GRANT ALL PRIVILEGES ON adehye_catering.* TO 'adehyeuser'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

5. **Deploy Project Files**:
   - Copy project files to `/var/www/html/` or your vhost directory
   - Set ownership: `sudo chown -R www-data:www-data /var/www/html/`
   - Set permissions: `sudo chmod -R 755 /var/www/html/`
   - For `assets/uploads`: `sudo chmod -R 775 /var/www/html/assets/uploads/`

6. **Import Database Schema**:
   ```bash
   sudo mysql -u adehyeuser -p adehye_catering < /path/to/database/schema.sql
   ```

7. **Configure Apache Virtual Host (Optional but Recommended)**:
   - Create `/etc/apache2/sites-available/adehye_catering.conf`
   ```apache
   <VirtualHost *:80>
       ServerName adehyecatering.com
       ServerAlias www.adehyecatering.com
       DocumentRoot /var/www/html/adehye_catering
       <Directory /var/www/html/adehye_catering>
           AllowOverride All
           Require all granted
       </Directory>
       ErrorLog ${APACHE_LOG_DIR}/error.log
       CustomLog ${APACHE_LOG_DIR}/access.log combined
   </VirtualHost>
   ```
   - Enable the site and rewrite module:
   ```bash
   sudo a2ensite adehye_catering.conf
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

8. **Secure with SSL (Let’s Encrypt)**:
   - Install Certbot:
   ```bash
   sudo apt install certbot python3-certbot-apache
   sudo certbot --apache -d adehyecatering.com -d www.adehyecatering.com
   ```
   - Follow prompts to obtain SSL certificate and auto-renewal!

9. **Update Configuration File (config/config.php)**:
   ```php
   define('URLROOT', 'https://adehyecatering.com');
   define('DB_HOST', 'localhost');
   define('DB_USER', 'adehyeuser');
   define('DB_PASS', 'your_secure_password');
   define('DB_NAME', 'adehye_catering');
   // Update Paystack LIVE keys
   ```

---

### General Production Checklist
- [ ] Update all database credentials
- [ ] Use Paystack LIVE keys (not test!)
- [ ] Enable HTTPS (SSL certificate)
- [ ] Update `URLROOT` in `config/config.php`
- [ ] Secure file permissions
- [ ] Remove debug and test all pages!

---

## License

(Add your license here)


## Contributing

Feel free to fork and submit pull requests!

