<?php

$titulo_pagina = "Alterar Pessoa";
require "cabecalho.php";

require "conexao.php";

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$urlfoto = filter_input(INPUT_POST, "urlfoto", FILTER_SANITIZE_SPECIAL_CHARS);
$sobre = filter_input(INPUT_POST, "sobre", FILTER_SANITIZE_SPECIAL_CHARS);

echo "<p> ID: $id </p>";
echo "<p> Nome: $nome </p>";
echo "<p> URL Foto: $urlfoto </p>";
echo "<p> Sobre Pessoa: $sobre </p>";

$sql = "update pessoas set 
                nome = ?,
                urlfoto = ?,
                sobre = ?
                where id = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $urlfoto, $sobre, $id]);

if ($result == true) {
?>
    <div class="alert alert-sucess" role="alert">
        <h4> Dados alterados com sucesso! </h4>
    </div>
<?php
} else {
?>
    <div class="alert alert-danger" role="alert">
        <h4> Falha ao efetuar a gravação. </h4>
        <p> <?php echo $stmt->error; ?> </p>
    </div>
<?php    
}

require "rodape.php";

?>