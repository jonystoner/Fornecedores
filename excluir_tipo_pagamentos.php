<?php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_fornecedor = $_GET['id_tipo_pagto'];

$sql = "delete from tipo_pagamentos where id_tipo_pagto = :id_tipo_pagto";

$stmt = $pdo->prepare($sql); // Prepara a declaração SQL
$stmt->bindParam(':id_tipo_pagto', $id_tipo_pagto, PDO::PARAM_INT);

if($stmt-> execute()){
    echo(header("Location:tipo_pagamentos_main.php"));            
}

?>