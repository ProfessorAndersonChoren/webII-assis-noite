<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Desk Helper - Mensagem do sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php session_start(); ?>
    <?php
    if (!empty($_SESSION["msg_error"])) :
    ?>
        <div class="alert alert-danger">
            <p><?= $_SESSION["msg_error"]; ?></p>
        </div>
    <?php
        unset($_SESSION["msg_error"]);
    endif;
    ?>
    <?php
    if (!empty($_SESSION["msg_warning"])) :
    ?>
        <div class="alert alert-warning">
            <p><?= $_SESSION["msg_warning"] ?></p>
        </div>
    <?php
        unset($_SESSION["msg_warning"]);
    endif;
    ?>
    <?php
        if(!empty($_SESSION["msg_success"])):
    ?>
    <div class="alert alert-success">
        <p><?= $_SESSION["msg_success"] ?></p>
    </div>
    <?php
    unset($_SESSION["msg_success"]);
    endif;
    ?>
</body>

</html>