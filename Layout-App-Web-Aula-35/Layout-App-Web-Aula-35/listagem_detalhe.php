<?php
session_start();
require("logica_autenticacao.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}
require "conexao.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "select id, nome, urlfoto, sobre FROM pessoas where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$pessoa = $stmt->fetch();

$nome_pagina = "Detalhe de " . $pessoa['nome'];

$titulo_pagina = "Listagem";
    require "cabecalho.php";
?>
<style>
    p{
        text-indent: 1.5em;
        text-align: justify;
        line-height: 1.8;
        font-size: 1.2em;
    }
</style>
<div class="container">
    <h4><?=$pessoa['nome']?></h4>
    <img class="rounded float-end m-4" 
    src="<?=$pessoa['urlfoto']?>" alt="<?=$pessoa['nome']?>">
    <p><?= $pessoa['sobre'] ?></p>
    <a href="listagem.php">Voltar à listagem</a>
</div>



<?php
    require "rodape.php";
?>