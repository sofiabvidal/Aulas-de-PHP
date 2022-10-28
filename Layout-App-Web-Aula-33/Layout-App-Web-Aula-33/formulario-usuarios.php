<?php

$titulo_pagina = "Formulário de Usuários";
require "cabecalho.php";

?>

<script>
    function verifica_senhas() {
        var senha = document.getElementById("senha");
        var confsenha = document.getElementById("confsenha");

        if (senha.value && confsenha.value) {
            if (senha.value != confsenha.value) {
                senha.classList.add("is-invalid");
                confsenha.classList.add("is-invalid");
                confsenha.value = null;
            } else {
                senha.classList.add("is-invalid");
                confsenha.classList.add("is-invalid");
            }
        }
    }
</script>

<form action="inserir-usuario.php" method="POST">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label for="nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> E-mail: </label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label"> Senha: </label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="mb-3">
                <label for="confsenha" class="form-label"> Confirme sua Senha: </label>
                <input type="password" class="form-control" id="confsenha" name="confsenha" required onblur="verifica_senhas">
            </div>
        </div>
        <div class="col-3">
        <img src="https://cdn-icons-png.flaticon.com/512/3462/3462172.png" class="img-thumbnail" id="img-preview" alt="...">
    </div>
    </div>


<button type="submit" class="btn btn-primary"> Gravar </button>
<button type="reset" class="btn btn-primary"> Cancelar </button>


  
</form>
<?php

require "rodape.php";

?>