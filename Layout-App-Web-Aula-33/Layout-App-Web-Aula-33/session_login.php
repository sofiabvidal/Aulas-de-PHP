<?php

session_start();

$titulo_pagina = "Página de sessão LOG-IN";
require "cabecalho.php";

echo "<h3> Exemplo de sessão LOG-IN <h3>";

$_SESSION["nome"] = "Sofia Borges";
$_SESSION["email"] = "sofiaborges262@gmail.com";

?>

<br>

<p> 
    Essa é a página que CRIA a sessão usando o comando session_start()
</p>

<?php

require "rodape.php";

?>