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
    <title> Editar pagamento</title>
</head>

<body style="background-color: black">
    <?php
    include 'menu.php'; 
    include 'conexao.php';
    $id_pagamento = $_GET['id_pagamento']; 
    $sql = 'select * from pagamentos where id_pagamento = :id_pagamento';
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id_pagamento',$id_pagamento,PDO::PARAM_INT);
    $stmt-> execute();
    $pagamentos = $stmt->fetch(PDO::FETCH_ASSOC);{
    if($pagamentos){
        $id_pagamento = $pagamentos['id_pagamento'];
        $descricao = $pagamentos['descricao'];
        $id_fornecedor = $pagamentos['id_fornecedor'];
        $data_vcto = $pagamentos['data_vcto'];
        $valor = $pagamentos['valor'];
        $data_pagto = $pagamentos['data_pagto'];
        $valor_pago = $pagamentos['valor_pago'];
        $id_tipo_pagto = $pagamentos['id_tipo_pagto'];
        $id_forma_pagto = $pagamentos['id_forma_pagto'];
        
    }          
    }
    ?>

    <form class="container-fluid mt-5" action="processo_editar_pagamento.php" method="POST">
        <div class="form-row">
            <input type="hidden" for="id_pagamento" name="id_pagamento" value="<?php echo($id_pagamento)?>" required>
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="descricao">Descricao</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao"
                    value="<?php echo($descricao)?>" required>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="id_fornecedor">CPF ou CNPJ</label>
                <input type="text" class="form-control id_fornecedor" id="id_fornecedor" name="id_fornecedor" placeholder="id_fornecedor"
                    value="<?php echo($id_fornecedor)?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 t text-white ">
                <label for="celular">data_vcto</label>
                <input type="date" class="form-control" id="data_vcto" name="data_vcto" value="<?php echo($data_vcto)?>"
                    placeholder="data_vcto">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="valor">valor</label>
                <input type="text" class="form-control" id="valor" name="valor" placeholder="valor"
                    value="<?php echo($valor)?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="data_pagto">data_pagto</label>
                <input type="date" class="form-control" id="data_pagto" name="data_pagto" value="<?php echo($data_pagto)?>"
                    placeholder="data_pagto">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="valor_pago">Valor Pago</label>
                <input type="text" class="form-control" id="valor_pago" value="<?php echo($valor_pago)?>"
                    name="valor_pago" placeholder="valor_pago	">
            </div>
        </div>
        <div class="form-row">
              <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <input type="hidden" class="form-control" id="id_tipo_pagto" name="id_tipo_pagto"
                    value="<?php echo($id_tipo_pagto)?>" placeholder="id_tipo_pagto">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <input type="hidden" class="form-control" id="id_forma_pagto" name="id_forma_pagto"
                    value="<?php echo($id_forma_pagto)?>" placeholder="id_tipo_pagto">
            </div>
        </div>
        <div class=" container d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </form>
</body>
</html>