<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <title> Editar tipo pagamento</title>
</head>

<body style="background-color: black">
    <?php
    include 'conexao.php';
    include 'menu.php'; 

    
    $id_user = $_GET['id_user']; 
    $sql = 'select * from usuarios where id_user = :id_user';
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id_user',$id_user,PDO::PARAM_INT);
    $stmt-> execute();
    $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);{
    if($usuarios){
        $id_user = $usuarios['id_user'];
        $nome_usuario = $usuarios['nome_usuario'];
        $email = $usuarios['email'];
        $foto = $usuarios['foto'];     
    }          
    }
    ?>
    <form action="processa_usuario.php" class="container-fluid d-flex flex-column" method="post">
        <input type="hidden" id="id_user" name="id_user" value="<?php echo $id_user ?>">
        <label for="nome_usuario">T</label>
        <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Entre com o nome"
            value="<?php echo $nome_usuario ?>" required>
        <input type="text" id="email" name="email" value="<?php echo $email ?>">
        <?php if (!empty($foto)): ?>
        <div class="circle">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" alt="Foto do usuário" width="200px" />
        </div>
        <?php endif; ?>
        <button type="submit" id="botao" class="btn btn-primary">Alterar</button>
    </form>

</body>

</html>