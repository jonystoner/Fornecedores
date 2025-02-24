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
    <title> Inclussão Fornecedores</title>
</head>

<body style="background-color: black">
    <!-- Menu -->
    <?php include 'menu.php'; ?>

    <!-- Formulário de inclusão de fornecedores -->
    <div class="container mt-5">
        <form action="salvar.php" method="POST">
            <!-- Nome e CPF/CNPJ -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="nome_fornecedor">Nome Fornecedor</label>
                    <input type="text" class="form-control" id="nome_fornecedor" name="nome_fornecedor"
                        placeholder="Nome Fornecedor" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="cpfcnpj">CPF/CNPJ</label>
                    <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control cpfOuCnpj"
                        placeholder="Entre com o CPF/CNPJ" required>
                </div>
            </div>

            <!-- Celular e Email -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>

            <!-- CEP e Logradouro -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro">
                </div>
            </div>

            <!-- Número e Complemento -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Complemento">
                </div>
            </div>

            <!-- Bairro e Cidade -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                </div>
            </div>

            <!-- Estado e Contato -->
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="contato">Contato</label>
                    <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato">
                </div>
            </div>

            <!-- Botão de Salvar -->
            <div class="form-row">
                <div class="form-group col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Carregando bibliotecas corretamente -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js">
    <!-- Script para máscaras de CPF/CNPJ 
    -->
    </script>


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