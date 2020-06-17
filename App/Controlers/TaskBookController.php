<?php

namespace App\Controlers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Tasks;
use App\Repositories\TaskRepository;
use App\Services\TaskService;
use App\Requests\TaskParamsRequest;
use Exception;

class TaskBookController extends Controller
{
    public TaskService $taskService;
    public TaskRepository $taskRepository;

    public function __construct()
    {
        $this->taskService = new TaskService();
        $this->taskRepository = new TaskRepository();
    }

    public function index()
    {
        $request = App::request();
        var_dump($_SESSION['user']);

        $taskParamsRequest = new TaskParamsRequest($request->getQuery('page'));

        $pagination = $this->taskService->index($taskParamsRequest);

        return $this->render("tasks/index", [
            'tasks' => $pagination->tasks,
            'page' => $pagination->page
        ]);
    }

    public function update()
    {
        $request = App::request();

        if ($request->getQuery('id') === null) {
            throw new Exception('not find task');
        }

        $task = App::DB()->find(Tasks::class, App::request()->getQuery('id'));

        if ($request->isMethod('POST')) {
            $task->user_name = $request->getPost('user_name');
            $task->email = $request->getPost('email');
            $task->text = $request->getPost('text');
            $task->status = $request->getPost('status');
            $this->taskService->update($task);
            header('Location: /tasks/index');
            exit();
        }

        return $this->render("tasks/update", [
            'task' => $task
        ]);
    }

    public function create()
    {
        $request = App::request();

        if ($request->isMethod('POST')) {
            $task = new Tasks();
            $task->user_name = $request->getPost('user_name');
            $task->email = $request->getPost('email');
            $task->text = $request->getPost('text');
            $task->status = $request->getPost('status');
            $this->taskService->save($task);
            header('Location: /tasks/index');
            exit();
        }

        return $this->render("tasks/create");
    }
}
