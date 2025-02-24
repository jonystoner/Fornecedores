<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios_login  WHERE username  = :username ");
    $stmt-> execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Autenticação bem-sucedida
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location:home.php');
        exit();
    } else {
                
        echo ($_SESSION['error'] = 'Usuário ou senha incorretos.');
       header('Location: voltar_login.php');
        exit();
    }
}
?>