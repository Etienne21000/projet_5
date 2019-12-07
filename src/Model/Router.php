<?php
namespace App\Model;

use App\Model\Route;

class Router
{
    private $url;
    private $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;

        return $route;
    }

    public function run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            throw new \Exception('REQUEST_METHOD does not exist');
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if($route->match($url))
            {
                return $route->call();
            }
        }
        throw new \Exception('No matching routes');
    }

}

//
// static private $instance;
// private $uri;
// // private $routes;
//
// public function __construct()
// {
//     $this->uri = $uri;
//     // $this->routes = $routes;
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

// private $url;
// private $rootes = [];
// private $nameRootes = [];
//
// public function __construct($url)
// {
//     $this->url = $url;
// }
//
// public function get($path, $callable, $name = null)
// {
//     return $this->add($path, $callable, $name, 'GET');
// }
//
// public function post($path, $callable, $name = null)
// {
//     return $this->add($path, $callable, $name, 'POST');
// }
//
// private function add($path, $callable, $name, $method)
// {
//     $root = new Route($path, $callable);
//     $this->rootes[$method][] = $root;
//
//     if(is_string($callable) && $name === null)
//     {
//         $name = $callable;
//     }
//
//     if($name)
//     {
//         $this->nameRootes[$name] = $root;
//     }
//     return $root;
// }
//
// public function run()
// {
//     if(!isset($this->rootes[$_SERVER['REQUEST_METHOD']]))
//     {
//         throw new \Exception("REQUEST_METHOD does not exist (Rooter)");
//
//     }
//
//     foreach ($this->rootes[$_SERVER['REQUEST_METHOD']] as $root)
//     {
//         if($root->match($this->url))
//         {
//             return $root->call();
//         }
//     }
//
//     throw new \Exception("No matching roots (rooter)");
//
// }
//
// public function url($name, $params = [])
// {
//     // var_dump($name);
//     if(!isset($this->nameRootes[$name]))
//     {
//         throw new \Exception("No roots matches this name (rooter)");
//     }
//     return $this->nameRootes[$name]->getUrl($params);
// }
