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
    $id_tipo_pagto = $_GET['id_tipo_pagto']; 
    $sql = 'select * from tipo_pagamentos where id_tipo_pagto = :id_tipo_pagto';
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id_tipo_pagto',$id_tipo_pagto,PDO::PARAM_INT);
    $stmt-> execute();
    $tipo_pagto = $stmt->fetch(PDO::FETCH_ASSOC);{
    if($tipo_pagto){
        $id_tipo_pagto = $tipo_pagto['id_tipo_pagto'];
        $descricao_tipo = $tipo_pagto['descricao_tipo'];
      
    }          
    }
    ?>
    <form action="processa_editar_tipo_pagamentos.php" class="container-fluid" method="post">
        <input type="hidden" id="id_tipo_pagto" name="id_tipo_pagto" value="<?php echo $id_tipo_pagto ?>">
        <label for="descricao_tipo">Tipo Pagamento</label>
        <input type="text" id="descricao_tipo" name="descricao_tipo" class="form-control" placeholder="Entre com o nome" value="<?php echo $descricao_tipo ?>" required>
        <button type="submit" id="botao" class="btn btn-primary">Alterar</button>
    </form>

</body>

</html>