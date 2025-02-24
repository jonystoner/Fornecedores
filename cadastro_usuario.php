<?php
include 'conexao.php';

$username = $_POST['username'];
$password = $_POST['password'];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO usuarios_login (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $passwordHash]);

echo "Usuário cadastrado com sucesso!";
?>