<?php

namespace App\Core;

use Nette\Http\Request;
use Nette\Http\UrlScript;
use Doctrine\ORM\EntityManager;

class App
{

    private static EntityManager $dbOrm;

    private static Request $request;
    
    public function __construct($dbOrm)
    {
        self::$dbOrm = $dbOrm;
        self::$request = new Request(
            new UrlScript($_SERVER['REQUEST_URI']),
            $_POST,
            [],
            [],
            [],
            $_SERVER['REQUEST_METHOD']
        );
    }

    public function initRouters($fileRouters)
    {
        Router::getIntance(self::$request->getUrl()->path);
        include $fileRouters;
    }

    public function run()
    {
        Router::$route->runController();
    }

    public static function DB(): EntityManager
    {
        return self::$dbOrm;
    }

    public static function request() : Request
    {
        return self::$request;
    }

    public static function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public static function auth() : bool
    {
        return isset($_SESSION['user']) ? true : false;
    }

    public static function getUser()
    {
        return $_SESSION['user'];
    }

    public static function logOut()
    {
        unset($_SESSION['user']);
    }
}
