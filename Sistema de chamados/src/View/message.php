<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Help Desk - Mensagem do sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="p-5">
    <?php
    session_start();
    if (!empty($_SESSION["msg_error"])) :
    ?>
        <div class="alert alert-danger">
            <p><?= $_SESSION["msg_error"] ?></p>
            <a href="#" class="alert-link" onclick="history.back()"></a>Voltar</a>
        </div>
    <?php
        unset($_SESSION["msg_error"]);
    endif;
    ?>
    <?php
    if (!empty($_SESSION["msg_warning"])) :
    ?>
        <div class="alert alert-warning">
            <p><?= $_SESSION["msg_warning"]; ?></p>
            <a href="#" class="alert-link" onclick="history.back()">Voltar</a>
        </div>
    <?php
        unset($_SESSION["msg_warning"]);
    endif;
    ?>
    <?php
    if (!empty($_SESSION["msg_success"])) :
    ?>
        <div class="alert alert-success">
            <p><?= $_SESSION["msg_success"] ?></p>
            <a href="#" class="alert-link" onclick="history.back()">Voltar</a>
        </div>
    <?php
        unset($_SESSION["msg_success"]);
    endif;
    ?>
</body>

</html>