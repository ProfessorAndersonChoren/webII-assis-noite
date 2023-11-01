<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Desk Helper - Mensagem do sistema</title>
</head>
<body>
    <?php session_start(); ?>
    <?php
    if(!empty($_SESSION["msg_error"])):
    ?>
    <div class="alert alert-danger">
        <p><?= $_SESSION["msg_error"]; ?></p>
    </div>
    <?php
    unset($_SESSION["msg_error"]);
    endif;
    ?>
</body>
</html>