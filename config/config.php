<?php
session_start();

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://localhost/AdehyeCatering');
define('SITENAME', 'Adehye Catering Services');

// Database config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'adehye_catering');

// Paystack config
define('PAYSTACK_SECRET_KEY', 'your_paystack_secret_key_here');
define('PAYSTACK_PUBLIC_KEY', 'your_paystack_public_key_here');

// PHPMailer config
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your_email@gmail.com');
define('SMTP_PASS', 'your_email_password');
