<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Home</title>
</head>

<body style="background-color: black">
    <nav class="navbar navbar-light navbar-expand-lg bg-light bg-light">
        <a class="navbar-brand" href="/cursosenac/sistema_de_fornecedores/login.php">Login</a>
    </nav>
    <div class="card-body">
        <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <div class="container-fluid ">
            <div class="login-box mt-5">
                <div class="row ">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="logo-section">
                            <img src="F.jpg" alt="Logo">
                            <h2 class="mt-3"></h2>
                        </div>
                    </div>

                    <div class="col-md-5 mt-5">
                        <h2 class="text-center text-white mb-4">Login</h2>
                        <form action="auth.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label text-white">Usuário</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-info w-100 text-white mt-3">Logar</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
</body>

</html>