<?php

namespace App\Controlers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Tasks;
use App\Services\TaskService;

class TaskBookController extends Controller
{
    public TaskService $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function index()
    {
        $taskRepository = App::DB()->getRepository(Tasks::class);
        $tasks = $taskRepository->findAll();

        return $this->render("tasks/index", [
            'tasks' => $tasks
        ]);
    }

    public function update()
    {
        $task = App::DB()->find(Tasks::class, 1);
        $task->user_name = "nameUpdate";
        var_dump($task);
        $this->taskService->update($task);
    }

    public function create()
    {
        // $task = new Tasks();
        // $task->user_name = 'name';
        // $task->email = 'name';
        // $task->text = 'text';
        // $task->status = 1;


        // App::DB()->persist($task);
        // App::DB()->flush();
        echo "xz";
        return $this->render("tasks/create");
    }
}
