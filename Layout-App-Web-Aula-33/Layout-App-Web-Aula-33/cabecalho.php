<!DOCTYPE html>
<html lang="pt-br">
    <?php
        function ativa($pagina) {
            if (basename($_SERVER["PHP_SELF"]) == $pagina) {
                return " active ";
            }else {
                return null;
            }
        }
    ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pessoas importantes</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .font-1 {
            color: #000 !important;
            font-weight: bolder;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="dist/dashboard.css" rel="stylesheet">


</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
            Pessoas importantes
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto px-3 pb-2">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formulario.php">Formulário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-light btn-sm btn-block font-1 my-1">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger btn-sm btn-block font-1 my-1">Sair</a>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start pe-3 d-none d-sm-block">
            <div class="text-end">
                <a href="formulario-login.php" class="btn btn-light me-2"> 
                <span data-feather="log-in"></span>
                    Entrar
                </a>
                <a href="formulario-usuarios.php" class="btn btn-info me-2"> 
                    <span data-feather="user-plus"></span>
                    Cadastrar
                </a>    
                <button type="button" class="btn btn-danger">
                    <span data-feather="log-out"></span>
                    Sair
                </button>
            </div>
        </div>

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky mt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('index.php'); ?>" aria-current="page" href="index.php">
                                <span data-feather="home"></span>
                                Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('formulario.php'); ?>" aria-current="page" href="formulario.php">
                                <span data-feather="file-text"></span>
                                Formulário
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('listagem.php'); ?>" aria-current="page" href="listagem.php">
                                <span data-feather="list"></span>
                                Listagem
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('listagem-usuarios.php'); ?>" aria-current="page" href="listagem-usuarios.php">
                                <span data-feather="users"></span>
                                Usuários
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between
                    align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"> 
                    <span> .. Sessões ... </span>
                    <span data-feather="key"></span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('session_login.php'); ?>" 
                            aria-current="page" href="session_login.php">
                                <span data-feather="log-in"></span>
                                Autenticar-se (Log-in)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('session_pagina1.php'); ?>" 
                            aria-current="page" href="session_pagina1.php">
                            <?php
                                if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                                    //fez login, está autenticado corretamente
                                    ?> 
                                    <span data-feather="unlock"></span>
                                    <?php 
                                }else{
                                    //não fez login, não pode VER/ACESSAR o conteúdo
                                    ?> 
                                    <span data-feather="lock"></span>
                                    <?php 
                                }
                            ?>
                                Página 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('session_pagina2.php'); ?>" 
                            aria-current="page" href="session_pagina2.php">
                            <?php
                                if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                                    //fez login, está autenticado corretamente
                                    ?> 
                                    <span data-feather="unlock"></span>
                                    <?php 
                                }else{
                                    //não fez login, não pode VER/ACESSAR o conteúdo
                                    ?> 
                                    <span data-feather="lock"></span>
                                    <?php 
                                }
                            ?>
                                Página 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('session_pagina3.php'); ?>" 
                            aria-current="page" href="session_pagina3.php">
                            <?php
                                if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                                    //fez login, está autenticado corretamente
                                    ?> 
                                    <span data-feather="unlock"></span>
                                    <?php 
                                }else{
                                    //não fez login, não pode VER/ACESSAR o conteúdo
                                    ?> 
                                    <span data-feather="lock"></span>
                                    <?php 
                                }
                            ?>
                                Página 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ativa ('session_logout.php'); ?>" 
                            aria-current="page" href="session_logout.php">
                                <span data-feather="log-in"></span>
                                Sair (Log-out)
                            </a>
                        </li>
                        </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?=$titulo_pagina?></h1>
                </div>