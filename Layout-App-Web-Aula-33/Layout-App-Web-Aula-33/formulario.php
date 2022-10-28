<?php

$titulo_pagina = "Formulário da Aplicação";
require "cabecalho.php";

?>

<style>
    img {
        display: none;
    }
</style>

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

<form action="inserir-pessoa.php" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label"> URL foto </label>
                <input type="url" class="form-control" id="urlfoto" name="urlfoto"
                aria-describedby="posterHelp" required
                onchange="imagePreview(this.value)">
                <div id="posterHelp" class="form-text">
                    Endereço http de uma imagem/foto da internet
                </div>
            </div>
            <div class="mb-3">
                <label class="form label" for="sobre"> Sobre a pessoa: </label>
                <textarea class="form-control" name="sobre" id="sobre"> </textarea>
            </div>
        </div>
        <div class="col-4">
        <img src="..." class="img-thumbnail" id="img-preview" alt="...">
    </div>
    </div>


<button type="submit" class="btn btn-primary"> Gravar </button>
<button type="reset" class="btn btn-primary"> Cancelar </button>


  
</form>
<?php

require "rodape.php";

?>