<?php
session_start();
require("logica_autenticacao.php");


$titulo_pagina = "Inserir Usuário";
    require "cabecalho.php";
    require "conexao.php";

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha");

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);


    $sql = "insert into usuarios (nome, email, senha) values (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$nome, $email, $senha_hash]);

    if($result == true){
    ?>
        <div class="alert alert-success" role="alert">
            <h4>Dados gravados com sucesso!</h4>
        </div>
    <?php            
    } else{
    ?>
        <div class="alert alert-success" role="alert">
            <h4> Falha ao efetuar gravação. </h4>
            <p><?php echo $stmt->error; ?></p>
        </div>
    <?php    
    }
    ?>
    <p>
        <a href="index.php">Ir para o início</a>
    </p>
   
<?php
 
    require "rodape.php";
?> 