<?php

$titulo_pagina = "Formulário (alteração)";
require "cabecalho.php";

require "conexao.php";

$id = filter_input(INPUT_GET, "id");

if(empty($id)){
    ?>
    <div class="alert alert-danger" role="alert">
        <h4> Falha ao abrir formulário para edição. </h4>
        <p> ID de pessoa está vazio. </p>
    </div>
<?php
    exit;
}

$sql = "select id, nome, urlfoto, sobre FROM pessoas where ID = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$pessoa = $stmt->fetch();
?>

<script>
    function imagePreview(valor) {

        var img = document.getElementById('img-preview');

        if(valor) {
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
                <label for="nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" id="nome" name="nome" 
                value="<?=$pessoa['nome']?>" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label"> URL foto </label>
                <input type="url" class="form-control" id="urlfoto" name="urlfoto"
                aria-describedby="posterHelp" 
                value="<?=$pessoa['urlfoto']?>" required
                onchange="imagePreview(this.value)">
                <div id="posterHelp" class="form-text">
                    Endereço http de uma imagem/foto da internet
                </div>
            </div>
            <div class="mb-3">
                <label class="form label" for="sobre"> Sobre a pessoa: </label>
                <textarea class="form-control" name="sobre" id="sobre"><?=$pessoa['sobre']?></textarea>
            </div>
            <div class="col-4">
        <img src="<?=$pessoa['urlfoto']?>" class="img-thumbnail" id="img-preview" alt="...">
        </div>
    </div>


<button type="submit" class="btn btn-primary"> Gravar </button>
<button type="reset" class="btn btn-primary"> Cancelar </button>


  
</form>
<?php

require "rodape.php";

?>