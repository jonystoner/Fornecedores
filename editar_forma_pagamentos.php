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
    $id_forma_pagto = $_GET['id_forma_pagto']; 
    $sql = 'select * from forma_pagamentos where id_forma_pagto = :id_forma_pagto';
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id_forma_pagto',$id_forma_pagto,PDO::PARAM_INT);
    $stmt-> execute();
    $forma_pagamentos = $stmt->fetch(PDO::FETCH_ASSOC);{
    if($forma_pagamentos){
        $id_forma_pagto = $forma_pagamentos['id_forma_pagto'];
        $descricao_forma = $forma_pagamentos['descricao_forma'];
      
    }          
    }
    ?>
    <form action="processo_editar_forma_pagamentos.php" class="container-fluid" method="post">
        <input type="hidden" id="id_forma_pagto" name="id_forma_pagto" value="<?php echo $id_forma_pagto ?>">
        <label for="descricao_tipo">Forma de pagamentos</label>
        <input type="text" id="descricao_forma" name="descricao_forma" class="form-control" placeholder="Entre com o nome" value="<?php echo $descricao_forma ?>" required>
        <button type="submit" id="botao" class="btn btn-primary"> alterar pagamentos</button>
    </form>

</body>

</html>