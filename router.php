<?php

class Router
{
    private $routes = [];
    private $baseURL;

    public function __construct($baseURL)
    {
        $this->baseURL = $baseURL;
    }

    public function get($path, $controllerMethod)
    {
        $this->routes['GET'][$this->baseURL . $path] = $controllerMethod;
    }

    public function post($path, $controllerMethod)
    {
        $this->routes['POST'][$this->baseURL . $path] = $controllerMethod;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes[$method] as $path => $controllerMethod) {
            $pattern = str_replace('/', '\/', $path);
            $pattern = '/^' . $pattern . '$/';

            // Extract the dynamic segment from the route
            $pattern = preg_replace('/\{(\w+)\}/', '(\w+)', $pattern);

            if (preg_match($pattern, $uri, $matches)) {
                $controllerMethodParts = explode('@', $controllerMethod);
                $controllerName = $controllerMethodParts[0];
                $method = $controllerMethodParts[1];

                $params = array_slice($matches, 1);

                $controllerClass = "controllers\\" . $controllerName;

                $controllerFile = __DIR__ . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;

                    if (class_exists($controllerClass)) {
                        $controllerInstance = new $controllerClass();
                        if (method_exists($controllerInstance, $method)) {
                            call_user_func_array([$controllerInstance, $method], $params);
                        } else {
                            // Method doesn't exist in the controller
                            header("HTTP/1.0 404 Not Found");
                            echo "404 Not Found";
                        }
                    } else {
                        // Controller class doesn't exist
                        header("HTTP/1.0 404 Not Found");
                        echo "404 Not Found";
                    }
                } else {
                    // Controller file doesn't exist
                    header("HTTP/1.0 404 Not Found");
                    echo "404 Not Found";
                }
                return;
            }
        }

        // If no route matches, show a 404 page
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }


}


