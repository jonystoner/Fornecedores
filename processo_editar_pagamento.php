<?php
// processa_editar_fornecedores.php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_pagamento = $_POST['id_pagamento'];
$id_fornecedor = $_POST['id_fornecedor'];
$data_vcto = $_POST['data_vcto'];
$valor = $_POST['valor'];
$data_pagto = $_POST['data_pagto'];
$valor_pago = $_POST['valor_pago'];
$descricao = $_POST['descricao'];
$id_tipo_pagto = $_POST['id_tipo_pagto'];
$id_forma_pagto = $_POST['id_forma_pagto']; 

try {
    $sql = "UPDATE pagamentos SET
        id_fornecedor = :id_fornecedor,
        data_vcto = :data_vcto,
        valor = :valor,
        data_pagto = :data_pagto,
        valor_pago = :valor_pago,
        descricao = :descricao,
        id_tipo_pagto = :id_tipo_pagto,
        id_forma_pagto = :id_forma_pagto
        where id_pagamento = :id_pagamento";
 
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL

    $stmt->bindParam(':id_pagamento', $id_pagamento, PDO::PARAM_INT);
    $stmt->bindParam(':id_fornecedor', $id_fornecedor);
    $stmt->bindParam(':data_vcto', $data_vcto);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':data_pagto', $data_pagto);
    $stmt->bindParam(':valor_pago', $valor_pago);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_tipo_pagto', $id_tipo_pagto);
    $stmt->bindParam(':id_forma_pagto', $id_forma_pagto);
   
    if ($stmt->execute()) {
        header("Location: pagamentos.php");
    } else {
        echo "Erro ao alterar registro.";
    }
} catch (PDOException $e) {
    // Exceção, onde é exibido o erro segundo o PHP
    echo "Erro: " . $e->getMessage();
}
?>