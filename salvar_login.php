<?php

    include "conexao.php"; // conexão com  obanco de dados

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $sql = " INSERT INTO usuarios_login (`email`,`username`, `password`) VALUES (:email,:username,:password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam( ':username', $username);
        $stmt->bindParam( ':email', $email);
        $stmt->bindParam( ':password', $password);


        if($stmt-> execute()){
            echo(header("Location:home.php"));            
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