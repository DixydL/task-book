<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\Tasks;
use Doctrine\ORM\Tools\Pagination\Paginator;

class TaskRepository
{
    public function indexPagination($currentPage, $pageSize)
    {
        $dql = "SELECT t FROM " . Tasks::class . " t";
        $query = App::DB()->createQuery($dql)
                       ->setFirstResult(($currentPage - 1) * $pageSize)
                       ->setMaxResults($currentPage * $pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);

        return $paginator;
    }
}
