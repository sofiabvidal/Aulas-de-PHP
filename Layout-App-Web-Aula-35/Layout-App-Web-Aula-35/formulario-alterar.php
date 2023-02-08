<?php
session_start();
require("logica_autenticacao.php");
if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$titulo_pagina = "Formulário (alteração)";
require "cabecalho.php";
require "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if(empty($id)){
?>
    <div class="alert alert-danger" role="alert">
        <h4> Falha ao abrir formulário para edição. </h4>
        <p>ID de pessoa está vazio.</p>
    </div>
<?php  
    exit;
}
$sql = "select nome, urlfoto, sobre FROM pessoas where id = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id]);
$pessoa = $stmt->fetch();

?>
<script>
    function imagePreview(valor){

        var img = document.getElementById('img-preview');
        if(valor){
            img.setAttribute('src', valor);
            img.style.display = 'inline';
        }else{
            img.style.display = 'none';
        }
    }
</script> 
<form action="alterar-pessoa.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>" required>

    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required 
                value="<?=$pessoa['nome']?>">
            </div>
            <div class="mb-3">
                <label for="urlfoto" class="form-label">URL Foto</label>
                <input type="url" class="form-control" id="urlfoto" name="urlfoto" aria-describedby="urlfotoHelp" required
                value="<?=$pessoa['urlfoto']?>"  onchange="imagePreview(this.value)">
                <div class="urlfotoHelp" class="form-text">
                    Endereço http de uma imagem/foto da internet
                </div>
            </div>
            <div class="mb-3">
                <label for="sobre" class="form-label">Sobre a pessoa:</label>
                <textarea class="form-control" name="sobre" id="sobre"><?=$pessoa['sobre']?></textarea>
            </div>
        </div>
        <div class="col-4">
            <img src="<?=$pessoa['urlfoto']?>" class="img-thumbnail" id="img-preview" alt="...">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Gravar</button>
    <button type="reset" class="btn btn-warning">Cancelar</button>

</form>
<br>
<?php

if(isset($_SESSION["result"])){
    if($_SESSION["result"]){
        //inseriu com sucesso
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Dados alterados com sucesso.</p>
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