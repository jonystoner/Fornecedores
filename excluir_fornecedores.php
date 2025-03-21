<?php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_fornecedor = $_GET['id_fornecedor'];

$sql = "delete from fornecedores where id_fornecedor = :id_fornecedor";

$stmt = $pdo->prepare($sql); // Prepara a declaração SQL
$stmt->bindParam(':id_fornecedor', $id_fornecedor, PDO::PARAM_INT);

if($stmt-> execute()){
    echo(header("Location:fornecedores_main.php"));            
}

?>