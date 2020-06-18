<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\Tasks;
use Doctrine\ORM\Tools\Pagination\Paginator;

class TaskRepository
{
    public function indexPagination($currentPage, $pageSize, $dbal)
    {
        $query = App::DB()->createQuery($dbal)
                       ->setFirstResult(($currentPage - 1) * $pageSize)
                       ->setMaxResults($currentPage * $pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);

        return $paginator;
    }
}
