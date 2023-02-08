<?php
session_start();
require("logica_autenticacao.php");

$titulo_pagina = "Página inicial de aplicação";
    require "cabecalho.php";
echo "<h2>Essa é a página inicial (INDEX.PHP).</h2>";

if(!autenticado()){
?>
    <br>
    <p class="fs-4">
        Seja bem vindo à aplicação "Pessoas Importantes"
        <a href="formulario-login.php"> autentique-se</a> para começar.
    </p> 
<?php       
}
?>


<?php
    if(isset($_SESSION["restrito"]) && $_SESSION["restrito"]){
?> 
    <br>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Alerta!</h4>
        <p>Você está tentando acessar conteúdo restrito.</p>
    </div>   
<?php
    unset($_SESSION["restrito"]);        
    }

    require "rodape.php";
?>
