<?php
session_start();
require("logica_autenticacao.php");
if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

    require "conexao.php";

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $sql = "delete from pessoas where id = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);

    if($result == true){
        $_SESSION["result"] = true; 
        $_SESSION["msg"] = "Registro excluído com sucesso.";           
    } else{
        $_SESSION["result"] = false; 
        $_SESSION["erro"] = $error; 
    }
    redireciona("listagem.php");
?> 