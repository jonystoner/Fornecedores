<?php
include 'conexao.php'; // Conectamos ao banco de dados
 
$id_user = $_POST['id_user'];
$nome_usuario = $_POST['nome_usuario'];
$email =  $_POST['email'];
$foto = $_POST['foto']; 
try {
    $sql= " update usuarios set 
    nome_usuario = :nome_usuario, 
    email = :email, 
    foto = :foto  where id_user = :id_user";
 
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':foto', $foto);
   
    if ($stmt->execute()) {
        header("Location: usuarios_main.php");
        
    } else {
        echo "Erro ao alterar registro.";
    }
} catch (PDOException $e) {
    // Exceção, onde é exibido o erro segundo o PHP
    echo "Erro: " . $e->getMessage();
}
?>