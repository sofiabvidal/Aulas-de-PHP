<?php

function autenticado()
{
    if(!isset($_SESSION["usuario_email"]) || empty($_SESSION["usuario_email"])){
        return false;
    } else{
        return true;
    }
}

function redireciona($pagina){
    if(empty($pagina)){
        $pagina = "index.php";
    }
    header("Location: ".$pagina);
}
function nome_usuario(){
    return $_SESSION["usuario_nome"];
}
function email_usuario(){
    return $_SESSION["usuario_email"];
}