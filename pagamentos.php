<?php
    include "conexao.php";
    include "menu.php";
        // Verifica se os valores foram enviados pelo formulário e os captura
// Se não forem enviados, atribui uma string vazia para evitar erros
    $data_inicial = isset($_POST['data_inicial']) ? $_POST['data_inicial'] : '';
    $data_final = isset($_POST['data_final']) ? $_POST['data_final'] : '';

// Monta a query para buscar pagamentos e suas relações com fornecedores e tipos de pagamento
    $sql = "SELECT * FROM pagamentos 
        INNER JOIN fornecedores ON pagamentos.id_fornecedor = fornecedores.id_fornecedor 
        INNER JOIN tipo_pagamentos ON pagamentos.id_tipo_pagto = tipo_pagamentos.id_tipo_pagto 
        WHERE 1=1"; // O "WHERE 1=1" permite adicionar filtros dinamicamente depois

// Se ambas as datas foram informadas, adicionamos um filtro de intervalo de datas na consulta - BETWEN = Entre  - IF = Se 
if (!empty($data_inicial) && !empty($data_final)) {
    $sql .= " AND data_vcto BETWEEN :data_inicial AND :data_final";
}

// Ordenamos os resultados pela data de vencimento
$sql .= " ORDER BY data_vcto";

// Prepara a consulta para evitar SQL Injection
$stmt = $pdo->prepare($sql);

// Se as datas foram informadas, fazemos a ligação dos parâmetros para evitar injeção de SQL
if (!empty($data_inicial) && !empty($data_final)) {
    $stmt->bindParam(':data_inicial', $data_inicial);
    $stmt->bindParam(':data_final', $data_final);
}

// Executa a consulta
$stmt->execute();
?>

<body style="background-color: black">
    <div class="container-fluid mt-2">

        <form action="pagamentos.php" method="post">
            <div class="row">
                <div class="col-sm">
                    <label for="data_inicial">Data Inicial</label>
                    <!-- Campo para selecionar a data inicial -->
                    <input type="date" name="data_inicial" id="data_inicial" class="form-control"
                        value="<?php echo htmlspecialchars($data_inicial); ?>">
                </div>
                <div class="col-sm">
                    <label for="data_final">Data Final</label>
                    <!-- Campo para selecionar a data final -->
                    <input type="date" name="data_final" id="data_final" class="form-control"
                        value="<?php echo htmlspecialchars($data_final); ?>">
                </div>
                <div class="col-sm">
                    <br>
                    <!-- Botão para submeter a pesquisa -->
                    <button type="submit" id="botao" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-end">
            <a href="http://localhost/sistema/Fornecedores/processo_incluir_pagamento.php" class="btn btn-primary">
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
                    <th scope="col" class="text-white">data pgto</th>
                    <th scope="col" class="text-white">Editar Pagamento</th>
                    <th scope="col" class="text-white">Excluir pagamento</th>

                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['nome_fornecedor']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['id_pagamento']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['descricao']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['data_vcto']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo number_format($row["valor"],2,",",".");?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['data_pagto']);?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-success" aria-current="page"
                            href="editar_pagamento.php?id_pagamento=<?php echo htmlspecialchars($row['id_pagamento']); ?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" href="#"
                            onclick="confirmarExclussao(<?php echo htmlspecialchars($id_pagamento);?>)">excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <div class="container-fluid">
                
                <div class="col-sm">
                  
                    <table class="table table-striped">
                    <h1> Total de despesas </h1>
                        <thead>
                            <tr>
                                <th class="text-light">Tipo Despesa</th>
                                <th class="text-light">Valor</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php 
                             $sql2 = "SELECT tipo_pagamentos.descricao_tipo,sum(valor) as total FROM pagamentos inner join tipo_pagamentos on pagamentos.id_tipo_pagto=tipo_pagamentos.id_tipo_pagto group by tipo_pagamentos.id_tipo_pagto";
                             $stmt2 = $pdo->prepare($sql2);
                             $stmt2->execute();
                             while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td class="text-light"><?php echo htmlspecialchars($row['descricao_tipo']); ?></td>
                                <td class="text-light"><?php echo number_format($row['total'], 2, ",", "."); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
                <hr>
                <br>
                <div class="col-sm">
                    <?php include 'pagamento_grafico.php'; ?>
                </div>
            </div>

        </table>
    </div>
</body>