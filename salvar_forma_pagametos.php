<?php

    include "conexao.php"; // conexão com  o banco de dados

    $descricao_forma = $_POST['descricao_forma'];

    try {
        $sql = "INSERT INTO forma_pagamentos (descricao_forma) VALUES (:descricao_forma)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':descricao_forma', $descricao_forma);

        if ($stmt->execute()) {
            header("Location: forma_pagamentos_main.php");  // Redireciona para a página
            exit();  // Garante que o código pare de ser executado
        } else {
            echo "Erro ao inserir o registro no banco de dados";
        }
    } catch (PDOException $e) {
        // Exceção, onde é exibido o erro segundo o PHP
        echo "Erro: " . $e->getMessage();
    }

?>
