<?php
session_start();
require("logica_autenticacao.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$titulo_pagina = "Listagem";
    require "cabecalho.php";
    require "conexao.php";

    $sql = "select id, nome, urlfoto, sobre FROM pessoas order by id";
    $stmt = $conn->query($sql);
?>

<div class="table-reponsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 10%;">ID</th>
                <th scope="col" style="width: 25%;">Nome</th>
                <th scope="col" style="width: 25%;">Foto</th>
                <th scope="col" style="width: 25%;">Sobre</th>
                <th scope="col" style="width: 25%;" colpsan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmt->fetch()){
            ?>        
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nome']?></td>
                <td>
                    <a href="<?=$row['urlfoto']?>" target="_blank">
                        <?= $row['urlfoto']?>
                    </a>
                </td>
                <td>
                    <a href="listagem_detalhe.php?id=<?=$row['id']?>">
                        Detalhes (sobre)
                    </a> 
                </td>
                <td>
                    <a class="btn btn-sm btn-warning" href="formulario-alterar.php?id=<?=$row['id']?>">
                        <span data feather="edit"></span>
                        Editar
                    </a> 
                </td>
                <td>
                    <a class="btn btn-sm btn-danger" href="excluir-pessoa.php?id=<?=$row['id']?>>"
                        onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                        <span data feather="trash-2"></span>
                        Excluir
                    </a> 
                </td>
            </tr>
            <?php
                }
            ?>    
        </tbody>
    </table>
</div>
<br>
<?php

if(isset($_SESSION["result"])){
    if($_SESSION["result"]){
        //inseriu com sucesso
        $msg = $_SESSION["msg"];
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p><?=$msg?></p>
        </div>
        <?php
    }else{
        //deu erro
        $erro = $_SESSION["erro"];
        unset($_SESSION["erro"]);
        ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Falha ao efetuar gravação.</h4>
            <p>Erro: <?=$erro?></p>
        </div>
    <?php
        }
        unset($_SESSION["result"]);
}

    require "rodape.php";
?>