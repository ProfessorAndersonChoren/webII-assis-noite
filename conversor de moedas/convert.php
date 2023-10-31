<?php
session_start();

if (!empty($_POST)) {
    $money = $_POST["money"];
    $coin = $_POST["coin"];

    switch ($coin) {
        case "dollar":
            $_SESSION["amount"] = convert_money($money, 5);
            break;
        case "euro":
            $_SESSION["amount_euro"] = convert_money($money, 5.30);
            break;
    }
    header("location:message.php");
} else {
    $_SESSION["error"] = "Ops. Houve um erro inesperado!!!";
    header("location:message.php");
}

function convert_money($money, $tax)
{
    return $money / $tax;
}
