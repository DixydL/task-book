<?php

namespace App\Data;

use Doctrine\ORM\Tools\Pagination\Paginator;

class TaskPaginationData
{
    public Paginator $tasks;

    public PaginationData $page;

    public function __construct($tasks, $page)
    {
        $this->tasks = $tasks;
        $this->page = $page;
    }
}
