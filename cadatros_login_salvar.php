<?php
include 'conexao.php'; // Certifique-se de que este arquivo define corretamente $pdo
 
$nome_usuario = $_POST['nome_usuario'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['password'] ?? '';
if (empty($nome_usuario) || empty($email) || empty($senha)) {
    die("Erro: Todos os campos são obrigatórios.");
}
$hashed_senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografando a senha
 
try {
    // Removida a vírgula extra após a coluna senha
    $sql = "INSERT INTO usuarios (nome_usuario, email, password)
            VALUES (:nome_usuario, :email, :password)";
 
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_senha); // Corrigido para corresponder à query
 
    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); // Encerra a execução após o redirecionamento
    } else {
        echo "Erro ao inserir registro.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>