<?php
session_start();
if (empty($_POST)) {
    $_SESSION["msg_error"] = "Ops, houve um erro inesperado!!!";
    header("location:message.php");
    exit;
}

$email = $_POST["user_email"];
$password = $_POST["user_password"];

$users = array(
    array(
        "name" => "Maria",
        "email" => "maria@gmail.com",
        "password" => password_hash("123456", PASSWORD_DEFAULT)
    ),
    array(
        "name" => "João",
        "email" => "joao@gmail.com",
        "password" => password_hash("123456", PASSWORD_DEFAULT)
    ),
);

foreach ($users as $user) {
    if (
        $user["email"] == $email &&
        password_verify($password, $user["password"])
    ) {
        $_SESSION["name"] = $user["name"];
        header("location:dashboard.php");
        exit;
    }
}

$_SESSION["msg_warning"] = "Usuário ou senha inválidos!!!";
header("location:message.php");
exit;
