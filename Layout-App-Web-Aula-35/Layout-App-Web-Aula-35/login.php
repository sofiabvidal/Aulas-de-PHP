<?php
session_start();
require("logica_autenticacao.php");

if(autenticado()){
    redireciona("index.php");
    die();
}

require "conexao.php";

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $sql = "select nome, senha from usuarios where email = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$email]);
    $row = $stmt->fetch();

    if(!empty($row["senha"])){

        if(password_verify($senha, $row["senha"])){
            // senha está OK
            $_SESSION["usuario_nome"] = $row["nome"];
            $_SESSION["usuario_email"] = $email;
            $_SESSION["usuario_result"] = true;
            redireciona("index.php");       
        } else{
            // senha está ERRADA
            $_SESSION["usuario_result"] = false;
            $_SESSION["erro"] = "Senha incorreta";
            redireciona("formulario-login.php");
        }
    } else{
        $_SESSION["usuario_result"] = false;
        $_SESSION["erro"] = "Nenhum usuário encontrado com este email.";
        redireciona("formulario-login.php");        
    }   

    require "rodape.php";
?> 