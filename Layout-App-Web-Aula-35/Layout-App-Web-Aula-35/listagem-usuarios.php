<?php
session_start();
require("logica_autenticacao.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$titulo_pagina = "Listagem de Usuários";
    require "cabecalho.php";
    require "conexao.php";

    $sql = "select id, nome, email FROM usuarios order by id";
    $stmt = $conn->query($sql);
?>

<div class="table-reponsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 10%;">ID</th>
                <th scope="col" style="width: 25%;">Nome</th>
                <th scope="col" style="width: 25%;">Email</th>
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
                <td><?=$row['email']?></td>
                <td>
                    <a class="btn btn-sm btn-warning" href="formulario-alterar.php?id=<?=$row['id']?>">
                        <span data feather="edit"></span>
                        Editar
                    </a> 
                </td>
                <td>
                    <a class="btn btn-sm btn-danger" href="excluir-usuario.php?id=<?=$row['id']?>>"
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

<?php
    require "rodape.php";
?>