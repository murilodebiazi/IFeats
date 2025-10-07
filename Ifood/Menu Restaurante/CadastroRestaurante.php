<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="layoutstylesheet0.css">
</head>

<body>
    <div class="logo">
        <img src="../Logo.png" alt="Logo">
    </div>
    <form class="form" action="Cadastrar.php" method="POST">

        <div id="a-1">
            <label>Nome:</label>
            <input type="text" name="restaurante" required><br><br>
        </div>
        <div id="a-2">
            <label>CNPJ:</label>
            <input type="text" name="cnpj" required><br><br>
        </div>
        <div id="a-2">
            <label>Email:</label>
            <input type="text" name="email" required><br><br>
        </div>
        <div id="a-2">
            <label>Senha:</label>
            <input type="password" name="senha" required><br><br>
        </div>
        <div id="a-2">
            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar" required><br><br>
        </div>
        <div id="a-2">
            <input type="submit" value="Cadastrar">
        </div>
        <div id="a-2">
            <button onclick="history.go(-1)">Voltar</button>
        </div>
    </form>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
    <script type="text/javascript">
        alert("Restaurante cadastrado com sucesso!");
        window.location.href="MenuRestaurante.html";
    </script>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'erro'): ?>
    <script type="text/javascript">
        alert("Senha diferente");
    </script>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'email'): ?>
    <script type="text/javascript">
        alert("Email já existe");
    </script>
    <?php endif; ?>

</body>