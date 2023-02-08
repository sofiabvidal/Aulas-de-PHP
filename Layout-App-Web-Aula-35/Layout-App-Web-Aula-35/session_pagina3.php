<?php
session_start();
//codigo php para proteger uma pagina, só deve abir se fez login
if(!isset($_SESSION["email"]) && empty($_SESSION["email"])){
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    exit;
}
$titulo_pagina = "Página 2 de exemplo de sessões ";
    require "cabecalho.php";

 ?>
 <h2> Página 3 de exemplo de sessões apaga apenas uma variável</h2>
 <br>
 <p> Página que apaga apenas a variável de sessão nome usando o comando  unset($_SESSION["nome"]);</p>

 <?php
 unset($_SESSION["nome"]);
     require "rodape.php";
 ?>
 