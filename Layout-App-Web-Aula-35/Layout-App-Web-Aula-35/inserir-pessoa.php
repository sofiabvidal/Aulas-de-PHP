<?php
session_start();
require("logica_autenticacao.php");
if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

    require "conexao.php";

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $urlfoto = filter_input(INPUT_POST, "urlfoto", FILTER_SANITIZE_URL);
    $sobre = filter_input(INPUT_POST, "sobre", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "insert into pessoas (nome, urlfoto, sobre) values (?, ?, ?)";

try{
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$nome, $urlfoto, $sobre]);
}catch(Exception $e){
    $result = false;
    $error = $e->getMessage();
}

    if($result == true){
        $_SESSION["result"] = true; 
        $_SESSION["msg"] = "Dados gravados com sucesso!";        
    } else{
        $_SESSION["result"] = false; 
        $_SESSION["erro"] = $error; 
    }
    redireciona("formulario.php");
?> 