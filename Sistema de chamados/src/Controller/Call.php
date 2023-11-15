<?php

namespace QI\SistemaDeChamados\Controller;

use QI\SistemaDeChamados\Model\Call;
use QI\SistemaDeChamados\Model\Equipment;
use QI\SistemaDeChamados\Model\User;

require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";

session_start();
switch ($_GET["operation"]){
    case "insert":
        insert();
        break;
    default:
        $_SESSION["msg_error"] = "Operação inválida!!!";
        header("location:../View/message.php");
        exit;
} // Switch

function insert(){
    if(empty($_POST)){
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado!!!";
        header("location:../View/message.php");
        exit;
    }

    $user = new User();
    $equipment = new Equipment();
    $call = new Call();
}
