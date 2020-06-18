<?php
    use App\Core\App;
?>

<!DOCTYPE html>
<html lang="ua">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"/>
<link rel="stylesheet" href="/css/index.css"/>
<meta charset="utf-8" />
<title>Задачник</title>
</head>
<body>
    <div class="header">
        <a href="/tasks/index">Задачник</a>
        <?php if (!App::isAuth()) : ?>
            <a href="/auth">Авторизація</a>
        <?php else : ?>
            <a href="/log-out">Вихід(<?=App::getUser()->email?>)</a>
        <?php endif;?>
    </div>
    <div class="main">
    <?php if (isset($_SESSION['success'])) :?>
        <div class="success alert-success" role="success">
             <?=$_SESSION['success']?>
        </div>
        <?php unset($_SESSION['success']);
    endif;?>
    <?php if (isset($_SESSION['alert'])) :?>
        <div class="alert alert-danger" role="alert">
             <?=$_SESSION['alert']?>
        </div>
        <?php unset($_SESSION['alert']);
    endif;?>
    <?php include __DIR__ . "/" . $viewName . ".php" ?>
    </div>
</body>
</html>