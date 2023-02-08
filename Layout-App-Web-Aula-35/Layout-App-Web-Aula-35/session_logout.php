<?php
session_start();

session_destroy();
$titulo_pagina = "Página de exemplo de sessões LOG-OUT";
    require "cabecalho.php";

    echo"<h2> Página de exemplo de sessões LOG-OUT</h2>";

    $_SESSION["nome"] = "Sofia Borges";
    $_SESSION["email"] = "sofia.borges@aluno.ifsp.edu.br";
 ?>
 <p> Esta é a página que quebra (ou fecha) a sessão usando o comando session_start();
     
 </p>
 
 <?php
 

     require "rodape.php";
 ?>
 