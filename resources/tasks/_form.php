<?php
    use App\Models\Tasks;

    /**
     * @var Tasks $task
     */
?>
<div class="form-group">
    <label for="exampleFormControlInput1">Емейл:</label>
    <input name="email" type="email" value="<?= isset($task) ? $task->email : ''?>" 
        class="form-control" placeholder="name@example.com">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Ім'я користувача:</label>
    <input name="user_name" type="text" value="<?=isset($task)  ? $task->user_name: ''?>"
        class="form-control" id="exampleFormControlInput1">
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Статус:</label>
    <select name="status" class="form-control" id="exampleFormControlSelect1">
        <option value="0" 
            <?=isset($task) ? $task->status ? 'selected' : '' : ''?>>не виконано</option>
        <option value="1" 
            <?=isset($task) ? $task->status ? 'selected' : '' : ''?>>виконано</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Текст задачи:</label>
    <textarea name="text"
         class="form-control" id="exampleFormControlTextarea1" rows="3"><?=isset($task) ? $task->text: ''?></textarea>
</div>