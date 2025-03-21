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


    <title>Clientes</title>
</head>

<script>
function confirmarExclussao(id) {
    $('#confirmModal').modal('show'); // Certifique-se de que o modal é referenciado corretamente
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = "excluir_fornecedores.php?id_fornecedor=" + id;
    }
}
</script>

<body style="background-color: black">
    <?php
        include "conexao.php";
        include "menu.php";    
    ?>
    <li>
        <a class="nav-link active btn btn-success w-25" href="incluir_clientes.php">Incluir Clientes</a>
    </li>
    <div class="container-fluid mt-2">
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Nome Cliente</th>
                    <th scope="col" class="text-white">Editar</th>
                    <th scope="col" class="text-white">Excluir</th>
                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "select * from clientes";
                    $stmt = $pdo->query($sql);
                    while($cu = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $id_cliente = $cu['id_cliente'];
                        $nome_cliente = $cu['nome_cliente'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_cliente))?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($nome_cliente))?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-success" aria-current="page"
                            href="editar_clientes.php?id_cliente=<?php echo(htmlspecialchars($id_cliente));?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" href="#"
                            onclick="confirmarExclussao(<?php echo(htmlspecialchars($id_cliente)) ;?>)">
                            excluir</a>
                    </td>

                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <!-- Modal de confirmação -->
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
                        Você tem certeza que deseja excluir este fornecedor?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>