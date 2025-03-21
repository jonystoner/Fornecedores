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
    <title> Editar Fornecedores</title>
</head>

<body style="background-color: black">
    <?php
    include 'conexao.php';
    include 'menu.php'; 
    $id_fornecedor = $_GET['id_fornecedor']; 
    $sql = 'select * from fornecedores where id_fornecedor = :id_fornecedor';
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id_fornecedor',$id_fornecedor,PDO::PARAM_INT);
    $stmt-> execute();
    $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);{
    if($fornecedor){
        $id_fornecedor = $fornecedor['id_fornecedor'];
        $cpf_cnpj = $fornecedor['cpf_cnpj'];
        $nome_fornecedor = $fornecedor['nome_fornecedor'];
        $celular = $fornecedor['celular'];
        $email = $fornecedor['email'];
        $cep = $fornecedor['cep'];
        $logradouro = $fornecedor['logradouro'];
        $bairro = $fornecedor['bairro'];
        $cidade = $fornecedor['cidade']; 
        $estado = $fornecedor['estado'];
        $numero = $fornecedor['numero'];
        $complemento = $fornecedor['complemento'];
        $contato = $fornecedor['contato'];    
    }          
    }
    ?>
    <form class="container-fluid mt-5" action="processo_editar_fornecedor.php" method="post">
        <div class="form-row">
        <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <inpunt type="hiden"for="id_fornecedor" name="id_fornecedor" value="<?php echo $id_fornecedor ?>" required>                            
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="nome_fornecedor">Nome Fornecedor</label>
                <input type="text" class="form-control" id="nome_fornecedor" name="nome_fornecedor"
                    placeholder="Nome Fornecedor" value="<?php echo($nome_fornecedor)?>" required>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="cpf_cnpj">CPF ou CNPJ</label>
                <input type="text" class="form-control cpfOuCnpj" id="cpf_cnpj" name="cpf_cnpj" placeholder="cpf_cnpj"
                    value="<?php echo($cpf_cnpj)?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 t text-white ">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo($celular)?>"
                    placeholder="Celular">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                    value="<?php echo($email)?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="cep">Cep</label>
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo($cep)?>"
                    placeholder="cep">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="logradouro">logradouro</label>
                <input type="text" class="form-control" id="logradouro" value="<?php echo($logradouro)?>"
                    name="logradouro" placeholder="logradouro	">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="numero">numero</label>
                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo($numero)?>"
                    placeholder="numero">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="complemento">coplemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento"
                    value="<?php echo($complemento)?>" placeholder="complemento">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="bairro">bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo($bairro)?>"
                    placeholder="bairro">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="cidade">cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo($cidade)?>"
                    placeholder="cidade">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="estado">estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo($estado)?>"
                    placeholder="estado">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="contato">contato</label>
                <input type="text" class="form-control" id="contato" name="contato" value="<?php echo($contato)?>"
                    placeholder="contato">
            </div>
        </div>
        <div class=" container d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </form>

    <script type="text/javascript">
    var options = {
        onKeyPress: function(cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask(
        '000.000.000-00#', options);
    </script>
</body>

</html>