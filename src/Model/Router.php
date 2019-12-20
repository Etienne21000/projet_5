<?php
namespace App\Model;

use App\Model\Route;

class Router
{
    private $url;
    private $routes = [];
    private $routesNames = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');

    }

    private function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;

        if(is_string($callable) && $name === null)
        {
            $name = $callable;
        }

        if($name)
        {
            $this->routesNames[$name] = $route;
        }

        return $route;
    }

    public function url($name, $params = [])
    {
        if(!isset($this->routesNames[$name]))
        {
            throw new \Exception('Aucune route ne correspond');
        }

        $this->routesNames[$name]->getUrl($params);
    }

    public function run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            throw new \Exception('Aucune url trouvée');
        }

        // print_r($this->routesNames);
        // $routes = parse_url($this->routes[$_SERVER['REQUEST_METHOD']]);

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }

        // throw new \Exception('Aucune url trouvée');

        // echo 'Can\'t find route';
        // echo '<pre>';
        // echo print_r($this->url);
        // echo '<pre>';
    }

}

// static private $instance;
// private $uri;
// private $routes = [];
// private $name;
//
// public function __construct()
// {
//     $this->uri = $_SERVER['REQUEST_URI'];
//     // $this->uri = trim($uri, '/');
//     // $this->routes = $routes;
//     // $this->routes = [];
//     // $this->name = $name;
//     // $route->uri = $uri;
// }
//
// static public function getInstance() : self
// {
//     if(self::$instance === null)
//     {
//         self::$instance = new self();
//     }
//
//     return self::$instance;
// }
//
// public function register(string $uri, string $name, callable $action)
// {
//     $this->routes[$name] = new Route($uri, $action);
// }
//
// public function start()
// {
//     foreach($this->routes as $route)
//     {
//         if($route->match($this->uri))
//         {
//             $route->executeAction();
//             return;
//         }
//     }
// }
