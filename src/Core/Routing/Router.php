<?php

namespace Core\Routing;
class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
        'PATCH' => [],
        'DELETE' => []
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function patch($uri, $controller)
    {
        $this->routes['PATCH'][$uri] = $controller;
    }

    public function delete($uri, $controller)
    {
        $this->routes['DELETE'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        $this->abort();
    }
    protected function callAction($controller, $action)
    {
        $controller =  "DevPiotrek\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception(
                "{$controller} does not respond to the {$action}"
            );
        }
        return $controller->$action();
    }



    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
    }
}
