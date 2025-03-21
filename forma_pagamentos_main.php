<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Tipo de Pagamentos</title>
</head>

<script>
function confirmarExclussao(id) {
    $('#confirmModal').modal('show');
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = "excluir_tipo_pagamentos.php?id_forma_pagto=" + id;
    }
}
</script>

<body style="background-color: black">
    <?php
        include "conexao.php";
        include "menu.php";    
    ?>

    <div class="container-fluid mt-2">
        <li>
            <a href="processo_incluir_forma_pagamento.php"> forma de pagamentos</a>
        </li>
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">id</th>
                    <th scope="col" class="text-white">forma de pagamentos</th>
                    <th scope="col" class="text-white">editar</th>
                    <th scope="col" class="text-white">Excluir</th>
                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "SELECT * FROM forma_pagamentos ORDER BY descricao_forma";
                    $stmt = $pdo->query($sql);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_forma_pagto = $row['id_forma_pagto'];
                        $descricao_forma = $row['descricao_forma'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_forma_pagto)) ?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($descricao_forma)) ?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page"
                            href="editar_forma_pagamentos.php?id_forma_pagto=<?php echo(htmlspecialchars($id_forma_pagto)); ?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" 
                            onclick="confirmarExclussao(<?php echo(htmlspecialchars($id_forma_pagto)) ;?>)">
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
