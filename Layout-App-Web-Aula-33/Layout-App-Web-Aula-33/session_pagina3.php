<?php

session_start();

// Código PHP para PROTEGER uma página, só deve abrir SE FEZ LOGIN
if(!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    exit;
}

$titulo_pagina = "Página 3 de sessão";
require "cabecalho.php";

echo "<h3> Página 3 de sessão que apaga apenas uma variável <h3>";

?>

<br>

<p> Página que APAGA a variável de sessão NOME usando o comando unset($_SESSION["nome"]) </p>

<?php

unset($_SESSION["nome"]);

require "rodape.php";

?>