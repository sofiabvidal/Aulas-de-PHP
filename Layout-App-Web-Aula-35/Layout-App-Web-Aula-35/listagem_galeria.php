<?php
session_start();
require("logica_autenticacao.php");

$titulo_pagina = "Listagem (galeria) de pessoas importantes";
    require "cabecalho.php";
    require "conexao.php";

    $sql = "select id, nome, urlfoto, sobre FROM pessoas order by id";
    $stmt = $conn->query($sql);
?>
<style>
    .card-text{
        text-indent: 1.5em;
        text-align: justify;
        line-height: 1.6;
    }
</style>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
                while($row = $stmt->fetch()){
            ?>   
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?=$row['urlfoto']?>" alt="<?=$row['nome']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nome']?></h5>
                            <p class="card-text"><?= $row['sobre']?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
</div>
            </div>
            </div>
<?php
    require "rodape.php";
?>