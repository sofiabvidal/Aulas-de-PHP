<?php
session_start();
require("logica_autenticacao.php");
if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$titulo_pagina = "Excluir Usuário";
    require "cabecalho.php";
    require "conexao.php";

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    

    echo "<p>ID: $id</p>";

    $sql = "delete from usuarios where id = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);

    if($result == true){
    ?>
        <div class="alert alert-success" role="alert">
            <h4>Dados excluídos com sucesso!</h4>
        </div>
    <?php            
    } else{
    ?>
        <div class="alert alert-danger" role="alert">
            <h4> Falha ao efetuar gravação. </h4>
            <p><?php echo $stmt->error; ?></p>
        </div>
    <?php    
    }
    ?>
    <p>
        <a href="listagem-usuarios.php">Voltar para a listagem</a>
    </p>
<?php    
    require "rodape.php";
?> 