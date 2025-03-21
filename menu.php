//<?php
//session_start(); // Deve ser a primeira linha
//include 'auth.php';
//// Se o usuário não estiver logado, redirecione para a página de login 
//if (!isset($_SESSION['user_id'])) {
//    header('Location: http://localhost/cursosenac/sistema_de_fornecedores/index.php');
//    exit;
//
//}
//?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        /* Estilos personalizados */
        .navbar-brand {
            font-weight: bold;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
        .welcome-message {
            margin-right: auto; /* Alinha à esquerda */
            padding: 0 15px; /* Espaçamento interno */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Mensagem de boas-vindas -->
            <span class="welcome-message navbar-text text-dark">
               Bem-vindo, <?php echo isset($_SESSION['nome_usuario']) ? htmlspecialchars($_SESSION['nome_usuario']) : 'Visitante'; ?>!
            </span>

            <!-- Links da navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="fornecedores_main.php">Fornecedores</a>
                </li>
            </ul>

            <!-- Dropdown de opções -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pagamentos.php">Pagamentos</a>
                        <a class="dropdown-item" href="forma_pagamentos_main.php">Forma de Pagamentos</a>
                        <a class="dropdown-item" href="tipo_pagamentos_main.php">Tipo de Pagamentos</a>
                        <a class="dropdown-item" href="clientes_main.php">Clientes</a>
                        <a class="dropdown-item" href="recebimentos_main.php">Recebiemntos</a>
                        <a class="dropdown-item" href="usuarios_main.php">Usuarios</a>
                    </div>
                </li>
            </ul>

            <!-- Formulário de pesquisa -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <div> <a class="btn btn-danger" href="logoff.php"> deslogar </a> </div>

        </div>
    </nav>

    <!-- Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>