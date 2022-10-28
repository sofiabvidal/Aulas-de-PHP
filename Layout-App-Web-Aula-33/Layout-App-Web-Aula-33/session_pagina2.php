<?php

session_start();

// Código PHP para PROTEGER uma página, só deve abrir SE FEZ LOGIN
if(!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    exit;
}

$titulo_pagina = "Página 2 de sessão";
require "cabecalho.php";

echo "<h3> Página 2 de sessão <h3>";

echo "<p> O nome é: " .$_SESSION["nome"]. "</p>";
echo "<p> O email é: " .$_SESSION["email"]. "</p>";

require "rodape.php";

?>