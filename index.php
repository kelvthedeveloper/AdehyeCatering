<?php
require_once 'config/config.php';

// Autoloader (fallback if composer is not installed)
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $class = str_replace('\\', '/', $class);
    
    // Map App namespace to core directory
    if (strpos($class, 'App/') === 0) {
        $class = 'core/' . substr($class, 4);
    }
    
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Try to load composer autoloader if available
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

require_once 'helpers/functions.php';

use App\Router;
use Helpers\Session;

Session::init();

$router = new Router();

require_once 'routes/web.php';

$router->dispatch();
