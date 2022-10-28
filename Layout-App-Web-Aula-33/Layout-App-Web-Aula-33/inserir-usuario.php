<?php

$titulo_pagina = "Inserir Usuário";
require "cabecalho.php";

require "conexao.php";

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

/*
echo "<p> Nome: $nome </p>";
echo "<p> Email: $email </p>";
echo "<p> Senha: $senha </p>";
echo "<p> Senha com hash: $senha_hash </p>";
*/

$sql = "insert into usuarios (nome, email, senha) values (?, ?, ?)";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([$nome, $email, $senha]);

if ($result == true) {
?>
    <div class="alert alert-sucess" role="alert">
        <h4> Dados gravados com sucesso! </h4>
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