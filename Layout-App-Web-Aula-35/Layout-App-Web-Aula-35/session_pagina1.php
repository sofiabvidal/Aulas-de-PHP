<?php
session_start();
//codigo php para proteger uma pagina, só deve abir se fez login

if(!isset($_SESSION["email"]) && empty($_SESSION["email"])){
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    exit;
}
$titulo_pagina = "Página 1 de exemplo de sessões";
    require "cabecalho.php";

    echo"<h2> Página 1 de exemplo de sessões</h2>";

    echo "<p> O nome é : ".$_SESSION["nome"]."</p>";
    echo "<p> O email é : ".$_SESSION["email"]."</p>";
?>


<?php
    require "rodape.php";
?>
