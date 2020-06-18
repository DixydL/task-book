<?php

namespace App\Data;

use Doctrine\ORM\Tools\Pagination\Paginator;

class TaskPaginationData
{
    public Paginator $tasks;

    public PaginationData $page;

    public SortData $sort;

    public function __construct(Paginator $tasks, PaginationData $page, SortData $sort)
    {
        $this->tasks = $tasks;
        $this->page = $page;
        $this->sort = $sort;
    }
}
