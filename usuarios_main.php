<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<script>
function confirmarExclussao(id) {
    $('#confirmModal').modal('show');
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = "excluir_usuarios.php?id_tipo_pagto=" + id;
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
            <a class="btn btn-primary" href="cadastrar_usuario.php"> icnluir usuario </a>
        </div>
        <table class="table active gap-1">
            <thead>
                <br />
                <tr>
                    <th scope="col" class="text-white">id_user</th>
                    <th scope="col" class="text-white">Nome de usuario </th>
                    <th scope="col" class="text-white">Email </th>
                    <th scope="col" class="text-white">foto</th>
                    <th scope="col" class="text-white">Editar</th>
                    <th scope="col" class="text-white">Excluir</th>
                </tr>
            </thead>
            <tbody class="container-fluid">
                <?php
                    $sql = "SELECT * FROM usuarios ORDER BY nome_usuario";
                    $stmt = $pdo->query($sql);
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_user = $row['id_user'];
                        $nome_usuario = $row['nome_usuario'];
                        $email = $row['email'];
                        $foto = $row['foto'];
                ?>
                <tr>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($id_user)) ?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($nome_usuario)) ?>
                    </th>
                    <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($email)) ?>
                    </th>
                       <th scope="row" class="text-white">
                        <?php echo(htmlspecialchars($foto)) ?>
                    </th>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-success" aria-current="page"
                            href="editar_usuarios.php?id_user=<?php echo(htmlspecialchars($id_user)); ?>">Editar</a>
                    </td>
                    <td>
                        <a style="width: 78px;" class="nav-link active btn btn-danger" aria-current="page"
                            onclick="confirmarExclussao(<?php echo(htmlspecialchars($id_user)) ;?>)">
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
                        Você tem certeza que deseja excluir este usuarios?
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