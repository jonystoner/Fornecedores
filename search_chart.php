<?php
include 'conexao.php';

$sql = "SELECT * FROM fornecedores";

$query = $pdo->prepare($sql);
$query->execute();  // 🔹 Adicionei esta linha para executar a consulta

$data = $query->fetchAll(PDO::FETCH_ASSOC);

// 🔹 Percorre os resultados corretamente
foreach ($data as $row) {
   // echo $row['nome_fornecedor'] . "<br>";
   echo json_encode($row['nome_fornecedor']);
}

?>