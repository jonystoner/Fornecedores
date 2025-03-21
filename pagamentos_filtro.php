<?php
// Inclui os arquivos de conexão com o banco de dados e o menu da aplicação
include 'conexao.php'; 

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