<?php

namespace App\Services;

use App\Core\App;
use App\Models\Tasks;
use Exception;

class TaskService
{

    public function index()
    {
        $taskRepository = App::DB()->getRepository(Tasks::class);
        return $taskRepository->findAll();
    }
 
    public function save(Tasks $task)
    {
        App::DB()->persist($task);
        App::DB()->flush();
    }

    public function update(Tasks $task)
    {
        if ($task === null) {
            throw new Exception("Product $task->id does not exist.\n");
        }

        App::DB()->flush();
    }
}
