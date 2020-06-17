<?php
    use App\Models\Tasks;

    /**
     * @var Tasks $task
     */
?>
<div class="content-block">
    <form action="/tasks/update?id=<?=$task->id?>" method="post">
        <?php include "_form.php"?>
        <input type="hidden" name='id' value="<?=$task->id?>">
        <input type="submit" value="Оновити">
    </form>
</div>