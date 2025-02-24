<?php
session_start(); // Deve ser a primeira linha
include 'auth.php';
// Se o usuário não estiver logado, redirecione para a página de login 
if (!isset($_SESSION['user_id'])) {
    //header('Location: http://localhost/cursosenac/sistema_de_fornecedores/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <title>Inclusão de Fornecedores</title>
</head>

<body style="background-color: black">
    <div class="container-fluid mt-5">
        <form action="salvar_pagamentos.php" method="POST">
            <!-- Campo de seleção de fornecedor -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="id_fornecedor">Fornecedor</label>
                    <?php 
                    $sql_formas_pagto = "SELECT nome_fornecedor, id_fornecedor FROM fornecedores;";
                    $stmt_formas_pagto = $pdo->query($sql_formas_pagto);
                    $formas_pagto = $stmt_formas_pagto->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <select class="form-control" id="id_fornecedor" name="id_fornecedor" required>
                        <option value="">Selecione um fornecedor</option>
                        <?php foreach ($formas_pagto as $forma): ?>
                        <option value="<?php echo $forma['id_fornecedor']; ?>">
                            <?php echo $forma['id_fornecedor'] . "-" . $forma['nome_fornecedor'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            

            </div>

            <!-- Campos de data e valor -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="data_vcto">Data de Vencimento</label>
                    <input type="date" class="form-control" id="data_vcto" name="data_vcto" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" required>
                </div>
            </div>

            <!-- Campos de data de pagamento e valor pago -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="data_pagto">Data de Pagamento</label>
                    <input type="date" class="form-control" id="data_pagto" name="data_pagto">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="valor_pago">Valor Pago</label>
                    <input type="text" class="form-control" id="valor_pago" name="valor_pago" placeholder="Valor Pago"
                        required>
                </div>
            </div>

            <!-- Campos de descrição, tipo de pagamento e forma de pagamento -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="text-white" for="id_tipo_pagto">tipo pagamento</label>
                    <?php 
                    $sql_tipos_pagto = "SELECT id_tipo_pagto , descricao_tipo FROM tipo_pagamentos;";
                    $stmt_tipos_pagto = $pdo->query($sql_tipos_pagto);
                    $tipos_pagto = $stmt_tipos_pagto->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <select class="form-control" id="id_tipo_pagto" name="id_tipo_pagto" required>
                        <option value="">Selecione o tipode de pagamento</option>
                        <?php foreach ($tipos_pagto as $tipo): ?>
                        <option value="<?php echo $tipo['id_tipo_pagto']; ?>">
                            <?php echo $tipo['descricao_tipo']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Botão de salvar -->
            <div class="form-row">
                <div class="form-group col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>