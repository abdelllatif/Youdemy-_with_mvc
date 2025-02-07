<?php

class Router {
    private $routes = [];

    public function add($route, $controller, $method) {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch($requestedRoute) {
        if (array_key_exists($requestedRoute, $this->routes)) {
            $controllerName = $this->routes[$requestedRoute]['controller'];
            $methodName = $this->routes[$requestedRoute]['method'];

            $controllerFile = __DIR__ . "/../controllers/{$controllerName}.php";

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();

                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    echo "Method '$methodName' not found in $controllerName.";
                }
            } else {
                echo "Controller '$controllerName' not found in path: $controllerFile.";
            }
        } else {
            $this->handleNotFound();
        }
    }

    private function handleNotFound() {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }
}
