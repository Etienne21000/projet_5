<?php
namespace router;

class Route
{
    private $uri;
    private $action;
    private $params;

    private function __construct($uri, $action)
    {

    }

    public function match(string $requestUri) : bool
    {
        $uriExpr = preg_replace('~{\w+}~', '(.+)', $this->uri);

        $uriExpr = '~^' . trim($uriExpr, '/') . '$~';
        $requestUri = trim($requestUri, '/');

        if(!preg_match($uriExpr, $requestUri, $params))
        {
            return false;
        }

        array_shift($params);
        $this->params = $params;

        return true;
    }

    public function executeAction() : void
    {
        call_user_func_array($this->action, $this->params);
    }
}
