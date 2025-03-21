<?php
    include "conexao.php";
    include "menu.php";
        // Verifica se os valores foram enviados pelo formulário e os captura
// Se não forem enviados, atribui uma string vazia para evitar erros
    $data_inicial = isset($_POST['data_inicial']) ? $_POST['data_inicial'] : '';
    $data_final = isset($_POST['data_final']) ? $_POST['data_final'] : '';

// Monta a query para buscar recebimentos e suas relações com fornecedores e tipos de pagamento
    $sql = "SELECT * FROM recebimentos 
        INNER JOIN clientes ON recebimentos.id_cliente = clientes.id_cliente 
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

        <form action="recebimentos.php" method="post">
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
            <a href="processa_incluir_recebiemnto.php" class="btn btn-primary">
                Incluir recebimento
            </a>
        </div>
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>

                    <th scope="col" class="text-white">nome_cliente</th>
                    <th scope="col" class="text-white">id</th>
                    <th scope="col" class="text-white">Descricao</th>
                    <th scope="col" class="text-white">valor</th>
                    <th scope="col" class="text-white">data venciemnto</th>
                    <th scope="col" class="text-white">Editar Pagamento</th>
                    <th scope="col" class="text-white">Excluir pagamento</th>

                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['nome_cliente']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['id_cliente']);?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['descricao']);?>
                    </th>        
                    <th scope="row" class="text-white">
                        <?php echo number_format($row["valor_recebido"],2,",",".");?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo htmlspecialchars($row['data_vcto']);?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-success" aria-current="page"
                            href="editar_pagamento.php?id_recebimento=<?php echo htmlspecialchars($row['id_recebimento']); ?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" href="#"
                            onclick="confirmarExclussao(<?php echo htmlspecialchars($id_pagamento);?>)">excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>

                <hr>
                <br>
 

        </table>
    </div>
</body>