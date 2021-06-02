<?php


namespace App\Core;


class Router
{
    /**
     * @var array[]
     * All routes
     */
    public $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * @param $file
     * @return static
     * Load routes
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * @param $uri
     * @param $controller
     * Writes a GET route to an array of routes
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $controller
     * Writes a POST route to an array of routes
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $requestType
     * @return mixed
     */
    public function direct($uri, $requestType)
    {
        if(array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route defined for this uri');
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     * Calls the action of the controller
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

//        die(var_dump($controller, $action));

        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action"
            );
        }
        return $controller->$action();
    }
}