<?php

$titulo_pagina = "Listagem da Aplicação";
require "cabecalho.php";

require "conexao.php";

$sql = "select id, nome, urlfoto, sobre FROM pessoas order by id";
$stmt = $conn->query($sql);


?>

<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
            <tr>

                <th scope="col" style="width: 10%;">ID</th>
                <th scope="col" style="width: 25%;">Nome</th>
                <th scope="col" style="width: 15%;">Foto</th>
                <th scope="col" style="width: 25%;">Sobre</th>
                <th scope="col" style="width: 25%;" colspan="2"></th>

            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = $stmt->fetch()) {
                ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td>
                    <a href="<?= $row['urlfoto'] ?>" target="_blank">
                        <?= $row['urlfoto'] ?>
                    </a>
                </td>
                <td><?= $row['sobre'] ?></td>
                <td>

                    <a class="btn btn-sm btn-warning" 
                    href="formulario-alterar.php?id=<?= $row['id']; ?>">
                        <span data-feather="edit"></span>

                        Editar
                    </a>
                </td>
                <td>
                    <a class="btn btn-sm btn-danger" 
                    href="excluir-pessoa.php?id=<?= $row['id']; ?>"
                    onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                        <span data-feather="trash-2"> </span>
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