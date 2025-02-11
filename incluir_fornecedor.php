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

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="/cursosenac/sistema_de_fornecedores/home.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="/cursosenac/sistema_de_fornecedores/fornecedores_main.php">Fornecedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/cursosenac/sistema_de_fornecedores/pagamentos.php">
                        Pagamentos Realizados</a>
                </li>
            </ul>
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </nav>
    <form class="container-fluid mt-5" action="salvar_fornecedor.php" method="POST">
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="nome_fornecedor">Nome Fornecedor</label>
                <input type="text" class="form-control" id="nome_fornecedor" name="nome_fornecedor"
                    placeholder="Nome Fornecedor" required>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="cpf_cnpj">CPF ou CNPJ</label>
                <input type="text" class="form-control cpfOuCnpj" id="cpf_cnpj" name="cpf_cnpj" placeholder="cpf_cnpj"
                    required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 t text-white ">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="cep">Cep</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="cep">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="logradouro">logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="logradouro	">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="numero">numero</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="numero">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="complemento">coplemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="complemento">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="bairro">bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="bairro">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="cidade">cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="cidade">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                <label for="estado">estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="estado">
            </div>
            <div class="form-group col-md-4 col-12 col-md-6 col-lg-4 text-white">
                <label for="contato">contato</label>
                <input type="text" class="form-control" id="contato" name="contato" placeholder="contato">
            </div>
        </div>
        <div class=" container d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Salvar</button>
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