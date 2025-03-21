<?php

    include "conexao.php"; // conexão com  obanco de dados

    $descricao_tipo = $_POST['descricao_tipo'];
 

    try{
        $sql = "INSERT INTO tipo_pagamentos (descricao_tipo) VALUES (:descricao_tipo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam( ':descricao_tipo', $descricao_tipo);
    

        if($stmt-> execute()){
            echo(header("Location:tipo_pagamentos_main.php"));            
        }
        else{
            echo("Erro ao inserir o registro no banco de dados");
            
        }
    } 
    catch (PDOException $e) {
        // Excessão, onde é exibido o erro segundo o PHP
        echo "Erro: " . $e->getMessage();
    }


?>