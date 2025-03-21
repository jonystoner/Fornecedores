<?php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_forma_pagto = $_POST['id_forma_pagto'];
$descricao_forma = $_POST['descricao_forma'];

 
try {
    $sql="
        update forma_pagamentos set descricao_forma = :descricao_forma where id_forma_pagto = :id_forma_pagto";
 
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL
    $stmt->bindParam(':id_forma_pagto', $id_forma_pagto, PDO::PARAM_INT);
    $stmt->bindParam(':descricao_forma', $descricao_forma);
   
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