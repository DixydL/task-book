<?php

namespace App\Models;

class Users
{
    const ADMIN = 'admin';
    
    public $email;
    
    public $password;

    public $role;

    public function __construct($email, $password, $role)
    {
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    //перевірка чи адмін
    public function isAdmin() : bool
    {
        return self::ADMIN  === $this->role;
    }
}
