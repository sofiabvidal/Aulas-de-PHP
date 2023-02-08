<?php

function autenticado(){
    // Coódigo PHP para proteger uma pagina, so deve abrir se fez login
    if (!isset($_SESSION["email"]) || empty($_SESSION["email"])){
        return false;
    }else{
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
    return $_SESSION["nome"];
}