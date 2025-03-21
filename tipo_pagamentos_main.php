<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Tipo de Pagamentos</title>
</head>

<script>
function confirmarExclussao(id) {
    $('#confirmModal').modal('show');
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = "excluir_tipo_pagamentos.php?id_tipo_pagto=" + id;
    }
}
</script>

<body style="background-color: black">
    <?php
        include "conexao.php";
        include "menu.php";    
    ?>

    <div class="container-fluid mt-2">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="incluir_tipo_pagamentos.php"> Incluir tipo de pagamatento pagamento</a>
        </div>
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">id</th>
                    <th scope="col" class="text-white">Tipo de pagamentos</th>
                    <th scope="col" class="text-white">editar</th>
                    <th scope="col" class="text-white">Excluir</th>
                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "SELECT * FROM tipo_pagamentos ORDER BY descricao_tipo";
                    $stmt = $pdo->query($sql);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_tipo_pagto = $row['id_tipo_pagto'];
                        $descricao_tipo = $row['descricao_tipo'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_tipo_pagto)) ?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($descricao_tipo)) ?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page"
                            href="editar_pagamentos.php?id_tipo_pagto=<?php echo(htmlspecialchars($id_tipo_pagto)); ?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page"
                            onclick="confirmarExclussao(<?php echo(htmlspecialchars($id_tipo_pagto)) ;?>)">
                            excluir</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja excluir este tipo de pagamento?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>