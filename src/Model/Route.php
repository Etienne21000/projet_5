<?php
namespace App\Model;

class Route
{

    private $path;
    private $callable;
    private $matches;

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        // var_dump($regex);

        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }

        array_shift($matches);

        $this->matches = $matches;
        return true;

        // var_dump($matches);
    }

    private function paramMatch($match)
    {
        if(isset($this->params[$match[1]])){
            return '(' . $this->params[$match[1]] . ')';
        }

        return '([^/]+)';
    }

    public function getUrl($params)
    {
        $path = $this->path;
        foreach ($params as $key => $value)
        {
            $path = str_replace(':$key', $value, $path);
        }

        return $path;
    }

    public function call()
    {
        if(is_string($this->callable))
        {
            $params = explode('#', $this->callable);
            $controller = "App\\Controller\\" . $params[0] . 'Controller';
            $controller = new $controller();

            return call_user_func_array([$controller, $params[1]], $this->matches);
        }

        else
        {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

}

// private $uri;
// private $action;
// private $params;
//
// public function __construct($uri, $action)
// {
//     $this->uri = trim($uri, '/');
//     $this->action = $action;
// }
//
// public function match(string $requestUri) : bool
// {
//     $uriExpr = preg_replace('~{\w+}~', '(.+)', $this->uri);
//
//     $uriExpr = '~^' . trim($uriExpr, '/') . '$~';
//     $requestUri = trim($requestUri, '/');
//
//     if(!preg_match($uriExpr, $requestUri, $params))
//     {
//         return false;
//     }
//
//     array_shift($params);
//     $this->params = $params;
//
//     return true;
// }
//
// public function executeAction() : void
// {
//     call_user_func_array($this->action, $this->params);
// }
