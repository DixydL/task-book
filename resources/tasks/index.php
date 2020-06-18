<?php

use App\Core\App;
use App\Data\PaginationData;
use App\Data\SortData;
use App\Models\Tasks;

    /**
     * @var Tasks[] $tasks
     * @var PaginationData $page
     * @var SortData $sort
     */
?>
<div class="content-block">
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <p><a href="/tasks/create">Створити нову задачу</a></p>
            <a href="/tasks/index?sort=user_name&typeSort=<?=$sort->nextTypeSort?>">По-назві</a>
            <a href="/tasks/index?sort=email&typeSort=<?=$sort->nextTypeSort?>">По-емейлу</a>
            <a href="/tasks/index?sort=status&typeSort=<?=$sort->nextTypeSort?>">По-статусу</a>
            <?php foreach ($tasks as $task) : ?>
                <p>Назва користувача: <?=$task->user_name?></p>
                <p>Емейл: <?=$task->email?></p>
                <p>Текст задачи: <?=$task->text?></p>
                <p>Статус: <?=$task->getStatus()?></p>
                <?php if (App::isAuth()) : ?>
                    <a href="/tasks/update?id=<?=$task->id?>">Редагувати</a>
                    <a href="/tasks/delete?id=<?=$task->id?>">Видалити</a>
                <?php endif; ?>
                <hr>
            <?php endforeach?>
            <?php if ($page->previousPage) :?>
                <a href="/tasks/index?page=<?=$page->previousPage?><?=$sort->sortQuery?>">
                    Попередня сторінка - <?=$page->previousPage?></a>
            <?php endif;?>
            <?php if ($page->nextPage) :?>
                <a href="/tasks/index?page=<?=$page->nextPage?><?=$sort->sortQuery?>">
                    Наступна сторінка - <?=$page->nextPage?></a>
            <?php endif;?>
            </div>
        </div>
    </div>
</div>