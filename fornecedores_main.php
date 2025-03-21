<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <title>Fornecedores</title>
</head>

<script>
    function confirmarExclussao(id) {
        $('#confirmModal').modal('show');  // Certifique-se de que o modal é referenciado corretamente
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
 
    <div class="container-fluid mt-2">
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Nome Fornecedor</th>
                    <th scope="col" class="text-white">Editar</th>
                    <th scope="col" class="text-white">Excluir</th>
                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "select * from fornecedores";
                    $stmt = $pdo->query($sql);
                    while($cu = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $id_fornecedor = $cu['id_fornecedor'];
                        $nome_fornecedor = $cu['nome_fornecedor'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_fornecedor))?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($nome_fornecedor))?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page"
                            href="editar_fornecedores.php?id_fornecedor=<?php echo(htmlspecialchars($id_fornecedor));?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page" href="#"
                            onclick="confirmarExclussao(<?php echo(htmlspecialchars($id_fornecedor)) ;?>)">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
