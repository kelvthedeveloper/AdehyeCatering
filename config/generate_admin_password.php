<?php
/**
 * Script to generate a password hash for the admin user
 * Just change the $password variable to your desired password and run this script
 */

// Change this to your desired admin password
$password = 'FoodIsReady';

// Generate the hash
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Your password hash is: " . $hash . "\n";
echo "Use this hash in database/schema.sql when inserting the admin user!\n";
