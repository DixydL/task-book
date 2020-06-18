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

        $taskParamsRequest = new TaskParamsRequest(
            $request->getQuery('page'),
            $request->getQuery('sort'),
            $request->getQuery('typeSort'),
        );

        $pagination = $this->taskService->index($taskParamsRequest);

        return $this->render("tasks/index", [
            'tasks' => $pagination->tasks,
            'page' => $pagination->page,
            'sort' => $pagination->sort
        ]);
    }

    public function update()
    {
        App::auth();

        $request = App::request();

        if ($request->getQuery('id') === null) {
            throw new Exception('not find task');
        }

        $task = App::DB()->find(Tasks::class, App::request()->getQuery('id'));

        if ($request->isMethod('POST')) {
            $this->validateEmail($request->getPost('email'));
            $task->user_name = $request->getPost('user_name');
            $task->email = $request->getPost('email');
            $task->text = $request->getPost('text');
            $task->status = $request->getPost('status');
            $this->taskService->update($task);
            $_SESSION['success'] = "Оновлено";
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
            $this->validateEmail($request->getPost('email'));
            $task = new Tasks();
            $task->user_name = $request->getPost('user_name');
            $task->email = $request->getPost('email');
            $task->text = $request->getPost('text');
            $task->status = $request->getPost('status') ? $request->getPost('status') : 0;
            $this->taskService->save($task);
            $_SESSION['success'] = "Створено";
            header('Location: /tasks/index');
            exit();
        }

        return $this->render("tasks/create");
    }

    public function delete()
    {
        App::auth();

        $request = App::request();

        $this->taskService->delete($request->getQuery('id'));
        $_SESSION['success'] = "Видалено";
        header('Location: /tasks/index');
        exit();
    }

    private function validateEmail($email)
    {
        if (!preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $email)) {
            $_SESSION['alert'] = "email не валиден";
            header('Location: /tasks/index');
            exit();
        }
    }
}
