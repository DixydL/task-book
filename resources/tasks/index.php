<?php
    use App\Models\Tasks;

    /**
     * @var Tasks[] $tasks
     */
?>
<div class="content-block">
    <div class="container">
        <div class="row">
            <div class="col-sm">
            <a href="/task/create">Створити нову задачу</a>
            <?php foreach ($tasks as $task) : ?>
                <p>Назва користувача: <?=$task->user_name?></p>
                <p>Текст задачи: <?=$task->text?></p>
                <p>Статус: <?=$task->text?></p>
                <hr>
            <?php endforeach?>
            </div>
        </div>
    </div>
</div>