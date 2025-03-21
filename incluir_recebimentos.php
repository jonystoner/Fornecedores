<?php

    include "conexao.php"; // conexão com  obanco de dados

    $id_cliente = $_POST['id_cliente'];
    $data_vcto = $_POST['data_vcto'];
    $descricao = $_POST['descricao'];
    $id_forma_recebimento = ['id_forma_recebimento'];
   
    try{
        $sql = "INSERT INTO recebimentos (`id_cliente`,`data_vcto`,`descricao`,id_forma_recebimento)
        VALUES(:id_cliente,:data_vcto,:descricao,:id_forma_recebimento)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam( ':id_cliente', $id_cliente);
        $stmt->bindParam( ':data_vcto', $data_vcto);
        $stmt->bindParam( ':descricao', $descricao);
        $stmt->bindParam( ':id_forma_recebimento', $id_forma_recebimento);
     

        if($stmt-> execute()){
            echo(header("Location:recebimentos_main.php"));            
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