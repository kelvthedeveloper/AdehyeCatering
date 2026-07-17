<?php
namespace App;

class Router
{
    protected $routes = [];

    public function get($uri, $controllerAction)
    {
        $this->routes['GET'][$uri] = $controllerAction;
    }

    public function post($uri, $controllerAction)
    {
        $this->routes['POST'][$uri] = $controllerAction;
    }

    public function dispatch()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestUri = str_replace('/AdehyeCatering', '', $requestUri);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Check for exact match first
        if (isset($this->routes[$requestMethod][$requestUri])) {
            list($controller, $action) = explode('@', $this->routes[$requestMethod][$requestUri]);
            $controllerName = "Controllers\\$controller";
            $controllerInstance = new $controllerName();
            $controllerInstance->$action();
            return;
        }

        // Check for routes with parameters (like /admin/foods/(\d+)/edit)
        foreach ($this->routes[$requestMethod] as $routeUri => $controllerAction) {
            // Replace (\d+) with regex to match numbers
            $pattern = '#^' . str_replace('/', '\/', $routeUri) . '$#';
            if (preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove full match
                list($controller, $action) = explode('@', $controllerAction);
                $controllerName = "Controllers\\$controller";
                $controllerInstance = new $controllerName();
                call_user_func_array([$controllerInstance, $action], $matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
