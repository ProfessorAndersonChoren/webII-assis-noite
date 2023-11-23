<?php

namespace QI\SistemaDeChamados\Controller;

use Exception;
use QI\SistemaDeChamados\Model\Call;
use QI\SistemaDeChamados\Model\Equipment;
use QI\SistemaDeChamados\Model\Repository\CallRepository;
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

    // TODO Validar os dados vindo do Front-end

    $user = new User($_POST["user_email"]);
    $user->id = 1;
    $user->name = $_POST["user_name"];
    $equipment = new Equipment(
        $_POST["pc_number"],
        $_POST["floor"],
        $_POST["room"]
    );
    $call = new Call(
        $user,
        $equipment,
        $_POST["classification"],
        $_POST["description"]
    );
    if(!empty($_POST["notes"])){
        $call->notes = $_POST["notes"];
    }
    try{
        $call_repository = new CallRepository();
        $result = $call_repository->insert($call);
        if($result){
            $_SESSION["msg_success"] = "Chamado registrado com sucesso!!!";
        }else{
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar o chamado!!!";
        }
    }catch(Exception $e){
        $_SESSION["msg_error"] = "Ops, houve um erro insperado em nossa base de dados!!!";
        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    }finally{
        header("location:../View/message.php");
        exit;
    }
}
