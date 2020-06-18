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

        $posts = [];
        
        foreach ($_POST as $key => $post) {
            $posts[$key] = htmlspecialchars($post);
        }

        self::$request = new Request(
            new UrlScript($_SERVER['REQUEST_URI']),
            $posts,
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
        $_SESSION['user'] = serialize($user);
    }

    public static function isAuth(): bool
    {
        return isset($_SESSION['user']) ? true : false;
    }

    public static function auth()
    {
        if (!self::isAuth()) {
            $_SESSION['alert'] = "спочатку авторизуйтеся";
            header('Location: /auth');
            exit();
        }
    }

    public static function getUser()
    {
        return unserialize($_SESSION['user']);
    }

    public static function logOut()
    {
        unset($_SESSION['user']);
    }
}
