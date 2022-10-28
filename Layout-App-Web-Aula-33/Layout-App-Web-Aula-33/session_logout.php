<?php

session_start();

session_destroy();

$titulo_pagina = "Página de sessão LOG-OUT";
require "cabecalho.php";

echo "<h3> Exemplo de sessão LOG-OUT <h3>";

?>

<br>

<p> 
    Essa é a página que QUEBRA(ou FECHA) a sessão usando o comando session_destroy()
</p>

<?php

require "rodape.php";

?>