<?php
session_start();

$titulo_pagina = "Página de exemplo de sessões LOGIN";
    require "cabecalho.php";

    echo"<h2> Página de exemplo de sessões LOGIN</h2>";

   $_SESSION["nome"] = "Sofia Borges";
   $_SESSION["email"] = "sofia.borges@aluno.ifsp.edu.br";
?>
<p> Esta é a página que cria a sessão usando o comando session_start();
    
</p>

<?php
    require "rodape.php";
?>
