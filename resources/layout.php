
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
        <a href="/auth">Авторизація</a>
    </div>
    <div class="main">
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