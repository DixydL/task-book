<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Tasks")
 */
class Tasks
{
    const DONE = 1;
    const UNDONE = 0;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;
    /**
     * @ORM\Column(type="string")
     */
    public $user_name;

    /**
     * @ORM\Column(type="string")
     */
    public $email;

    /**
     * @ORM\Column(type="string")
     */
    public $text;

    /**
     * @ORM\Column(type="smallint")
     */
    public $status;

    public function getId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->user_name;
    }

    public function getStatus()
    {
        if ($this->status === self::DONE) {
            return 'виконано';
        } else {
            return 'не виконано';
        }
    }
}
