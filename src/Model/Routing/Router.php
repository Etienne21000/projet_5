<?php
namespace model\router;

class Router
{
    static private $instance;

    private function __construct()
    {

    }

    static public function getInstance() : self
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function register(string $uri, string $name, callable $action)
    {
        $this->routes[$name] = new Route($uri, $action);
    }

    public function start()
    {
        foreach($this->routes as $route)
        {
            if($route->match($this->uri))
            {
                $route->executeAction();
                return;
            }
        }
    }
}