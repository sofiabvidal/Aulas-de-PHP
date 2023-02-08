<?php
session_start();
require("logica_autenticacao.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$titulo_pagina = "Formulário";
require "cabecalho.php";

?>
<style>
img{
    display: none;
}    
</style>
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


<form action="inserir-pessoa.php" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>    
            <div class="mb-3">
                <label for="poster" class="form-label">URL Foto</label>
                <input type="url" class="form-control" id="urlfoto" name="urlfoto" required
                     aria-describedby="posterHelp" required  onchange="imagePreview(this.value)">
                <div id="posterHelp" class="form-text">
                    Endereço http de uma imagem/foto da internet
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" class="sobre">Sobre a pessoa:</label>
                <textarea class="form-control" class="sobre" id="sobre" name="sobre"></textarea>
            </div>
        </div>
        <div class="col-4">
            <img src="..." class="img-thumbnail" id="img-preview" alt="...">
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
            <p>Dados gravados com sucesso.</p>
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