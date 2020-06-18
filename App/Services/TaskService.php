<?php

namespace App\Services;

use App\Core\App;
use App\Data\PaginationData;
use App\Data\SortData;
use App\Data\TaskPaginationData;
use App\Models\Tasks;
use App\Repositories\TaskRepository;
use App\Requests\TaskParamsRequest;
use Exception;

class TaskService
{
    
    public TaskRepository $taskRepository;
    
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }
    
    //Отримуємо всі елементи, і робимо пагінацію
    public function index(TaskParamsRequest $request) : TaskPaginationData
    {
        $pageSize = 3;
        $nextPage = null;
        $previousPage = null;
        $sort = "";
        $typeSort = "ASC";
        $nextTypeSort = "";
        $sortQuery = "";
        
        if ($request->currentPage === null) {
            $request->currentPage = 1;
        }

                
        if (isset($request->sort)) {
            $sort = " ORDER BY t." . $request->sort;
            if (isset($request->typeSort)) {
                $sort  .= " ".$request->typeSort;
            } else {
                $sort  .= " ". $typeSort;
            }
            $sortQuery .="&sort=$request->sort";
        }

        if ($request->typeSort == "ASC") {
            $nextTypeSort = "DESC";
            $sortQuery .="&typeSort=ASC";
        } else {
            $nextTypeSort = "ASC";
            $sortQuery .="&typeSort=DESC";
        }
        

        $dql = "SELECT t FROM " . Tasks::class . " t" . $sort;

        $tasks = $this->taskRepository->indexPagination($request->currentPage, $pageSize, $dql);

        $coutItems = count($tasks);

        if ($coutItems/$pageSize > $request->currentPage) {
            $nextPage = $request->currentPage + 1;
        }

        if ($request->currentPage - 1 !== 0) {
            $previousPage = $request->currentPage - 1;
        }
        
        return new TaskPaginationData(
            $tasks,
            new PaginationData($request->currentPage, $coutItems, $previousPage, $nextPage),
            new SortData($request->sort, $request->typeSort, $nextTypeSort, $sortQuery)
        );
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

    public function delete($id)
    {
        if ($id === null || !$task = App::DB()->find(Tasks::class, $id)) {
            throw new Exception('not find task');
        }

        App::DB()->remove($task);
        App::DB()->flush();
    }
}
