<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Pagamentos</title>
</head>

<body style="background-color: black">
    <?php
        include "conexao.php";
        include "menu.php";
    ?>
    <div class="container-fluid mt-2">
        <div class="d-flex justify-content-end">
            <a href="processa_incluir_pagamento.php" class="btn btn-primary">
                Incluir Pagamento
            </a>
        </div>
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">fornecedor</th>
                    <th scope="col" class="text-white">id</th>
                    <th scope="col" class="text-white">Descricao</th>
                    <th scope="col" class="text-white">Data,vcto</th>
                    <th scope="col" class="text-white">Valor</th>
                    <th scope="col" class="text-white">descricao tipo</th>
                    <th scope="col" class="text-white">Editar Pagamento</th>
                    <th scope="col" class="text-white">Excluir pagamento</th>

                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php                  
                    $sql = "SELECT * from pagamentos inner join fornecedores on fornecedores.id_fornecedor = pagamentos.id_fornecedor inner join tipo_pagamentos on pagamentos.id_tipo_pagto = tipo_pagamentos.id_tipo_pagto order by data_vcto;";
                    $stmt = $pdo->query($sql);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $id_pagamento = $row['id_pagamento'];
                    $nome_fornecedor = $row['nome_fornecedor'];
                    $descricao = $row['descricao'];
                    $valor = $row['valor'];
                    $data_vcto = $row['data_vcto'];
                    $descricao_tipo = $row['descricao_tipo'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($nome_fornecedor))?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo($id_pagamento)?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo($descricao)?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(date('d/m/y',strtotime($data_vcto)))?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo number_format($valor,2,",",".");?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo($descricao_tipo)?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-success" aria-current="page"
                            href="editar_pagamento.php?id_pagamento=<?php echo(htmlspecialchars($id_pagamento));?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" href="#"
                            onclick="confirmarExclussao(<?php echo htmlspecialchars($id_pagamento);?>)">excluir</a>
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