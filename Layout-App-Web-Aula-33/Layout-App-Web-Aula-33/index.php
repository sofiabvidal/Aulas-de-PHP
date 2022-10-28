<?php

session_start();

$titulo_pagina = "Página inicial da Aplicação";
require "cabecalho.php";

echo "<h3> Teste de Conexão com o PostegreSQL <h3>";

require "conexao.php";

echo "<p> URL atual: <b>".$_SERVER["PHP_SELF"]."</b><p>";
echo "<p> Nome da página atual: <b>". basename($_SERVER["PHP_SELF"])."</b><p>";

?>

<p> Olá, esta é a página inicial da aplicação </p>

<?php

if(isset($_SESSION["restrito"]) && $_SESSION["restrito"]) {
?>    
    <br>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading"> Alerta! </h4>
        <p> Você está tentando acessar conteúdo restrito. </p>
</div>

<?php

unset($_SESSION["restrito"]);
}    

require "rodape.php";

?>