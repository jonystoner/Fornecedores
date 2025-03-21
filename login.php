<?php
session_start();

include 'conexao.php';

$usuario = $_POST['email'];
$senha = $_POST['password'];


try {

    $sql = "select * from usuarios where email = :email";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':email', $usuario, PDO::PARAM_STR);

    $stmt->execute();

    $usuarioEcontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuarioEcontrado) {
        $id_user = $usuarioEcontrado['id_user'];
        $hashed_password = $usuarioEcontrado['password'];
        $nome_usuario = $usuarioEcontrado['nome_usuario'];
    }

    if(password_verify($senha,$hashed_password)) {
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nome_usuario'] = $nome_usuario;

        // Redirecionar para principal.php
        header('location: home.php');
        exit();

    }  header('location:usuario_recusado.php');
    exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>