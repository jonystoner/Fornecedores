<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Fornecedores</title>
</head>

<body style="background-color: black">
    <?php
        include "conexao.php"      
    ?>
    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/cursosenac/sistema_de_fornecedores/home.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="/cursosenac/sistema_de_fornecedores/incluir_fornecedor.php">Incluir Fornecedor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/cursosenac/sistema_de_fornecedores/pagamentos.php">
                        Pagamentos Realizados</a>
                </li>
            </ul>
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </nav>
    <div class="container-fluid mt-2">
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Nome Fornecedor</th>
                    <th scope="col" class="text-white">Editar</th>
                    <th scope="col" class="text-white">Excluir</th>

                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "select * from fornecedores";
                    $stmt = $pdo->query($sql);
                    while($cu = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $id_fornecedor = $cu['id_fornecedor'];
                        $nome_fornecedor = $cu['nome_fornecedor'];
                    
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_fornecedor))?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($nome_fornecedor))?>
                    </th>
                    <td>
                        <button type="button" class="btn btn-primary">Editar</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>

                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>