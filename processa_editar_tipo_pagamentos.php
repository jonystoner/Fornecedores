<?php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_tipo_pagto = $_POST['id_tipo_pagto'];
$descricao_tipo = $_POST['descricao_tipo'];

 
try {
    $sql="
        update tipo_pagamentos set descricao_tipo = :descricao_tipo where id_tipo_pagto = :id_tipo_pagto";
 
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL
    $stmt->bindParam(':id_tipo_pagto', $id_tipo_pagto, PDO::PARAM_INT);
    $stmt->bindParam(':descricao_tipo', $descricao_tipo);
   
    if ($stmt->execute()) {
        header("Location: forma_pagamentos_main.php");
        
    } else {
        echo "Erro ao alterar registro.";
    }
} catch (PDOException $e) {
    // Exceção, onde é exibido o erro segundo o PHP
    echo "Erro: " . $e->getMessage();
}
?>