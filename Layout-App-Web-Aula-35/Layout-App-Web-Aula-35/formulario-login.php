<?php
session_start();
require "logica-autenticacao.php";
$titulo_pagina = "";
require "cabecalho.php";

if(!autenticado()){
?>

<div class="row justify-content-md-center">
    <div class="col-3">
        <br><br><br>
        <form action="login.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Por favor identifique-se</h1>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder=>
                <label for="floatingInput">Endereço de email</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder=>
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit"> Entrar</button>
        </form>
    </div>
</div>
<?php
}
?>
<br>
<div class="row justify-content-md-center ">
    <div class="col-6">
        <?php
        if(isset($_SESSION["usuario_result"])) {
            if($_SESSION["usuario_result"]){
            ?>
            <div class="alert alert-sucess" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>Usuário já está autenticado.</p>
            </div>    
            <?php
        } else{
            $erro = $_SESSION["erro"];
            unset($_SESSION["erro"]);
            ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"> Erro.</h4>
                <p><?= $erro ?></p>
            </div>
            <?php
            unset($_SESSION["usuario_result"]);
        }
    }
    ?>
   </div> 
<?php

require "rodape.php";

?>