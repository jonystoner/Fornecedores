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
    <div>
        <div class="col">
            <?php
            include "menu.php";
            ?>
            <form class="container-fluid mt-5" action="salvar_forma_pagametos.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-4 text-white">
                        <label for="descricao_forma">Descrição forma pagameto</label>
                        <input type="text" class="form-control" id="descricao_forma" name="descricao_forma"
                            placeholder="Descrição forma pagameto" required>
                    </div>
                    <div class=" container d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
            </form>
        </div>
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