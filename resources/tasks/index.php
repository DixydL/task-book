<?php

use App\Data\PaginationData;
use App\Models\Tasks;

    /**
     * @var Tasks[] $tasks
     * @var PaginationData $page
     */
?>
<div class="content-block">
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <a href="/tasks/create">Створити нову задачу</a>
            <?php foreach ($tasks as $task) : ?>
                <p>Назва користувача: <?=$task->user_name?></p>
                <p>Емейл: <?=$task->email?></p>
                <p>Текст задачи: <?=$task->text?></p>
                <p>Статус: <?=$task->text?></p>
                <a href="/tasks/update?id=<?=$task->id?>">Редагувати</a>
                <a href="/tasks/delete?id=<?=$task->id?>">Видалити</a>
                <hr>
            <?php endforeach?>
            <?php if ($page->previousPage) :?>
                <a href="/tasks/index?page=<?=$page->previousPage?>">Попередня сторінка</a>
            <?php endif;?>
            <?php if ($page->nextPage) :?>
                <a href="/tasks/index?page=<?=$page->nextPage?>">Наступна сторінка</a>
            <?php endif;?>
            </div>
        </div>
    </div>
</div>