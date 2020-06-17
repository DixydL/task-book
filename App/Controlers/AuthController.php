<?php

namespace App\Controlers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Users;

class AuthController extends Controller
{
    //Хранилище для юзера
    private Users $user;

    public function __construct()
    {
        $this->user = new Users('admin', '123', 'admin');
    }

    //Базова якась авторизація
    public function index()
    {
        $request = App::request();

        if ($request->isMethod('POST')) {
            if ($request->getPost('email') === $this->user->email
            && $request->getPost('password') === $this->user->password) {
                App::login($this->user);
                header('Location: /tasks/index');
                exit();
            }
            $_SESSION['alert'] = "Пароль чи логін не коректний";
        }

        return $this->render("auth/index");
    }

    public function logOut()
    {
        App::logOut();
        header('Location: /tasks/index');
        exit();
    }
}
