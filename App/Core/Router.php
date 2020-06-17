<?php

namespace App\Core;

class Router
{
    public static ?self $route = null;

    private ?string $routePath = null;

    public static array $routesRegister  = [];

    private function __construct(string $routerPath)
    {
        $this->routePath = $routerPath;
    }

    private function __clone()
    {
    }

    public static function path(string $name, $controller)
    {
        self::$routesRegister[$name] = $controller;
    }

    public static function getIntance(string $routerPath)
    {
        if (self::$route === null) {
            self::$route = new self($routerPath);
        }

        return self::$route;
    }


    public function runController()
    {
        var_dump($this->routePath);
        if (isset(self::$routesRegister[$this->routePath])) {
            list($controllerPath, $method)  = explode("@", self::$routesRegister[$this->routePath]);
            //$controllerPath  = "\\App\\".$controllerPath;
            $controller = new $controllerPath();
            $controller->{$method}();
        }
    }
}
