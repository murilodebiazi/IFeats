<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="layoutstylesheet0.css">
</head>

<body>
    <div id="logo">
        <img src="../Logo.png" alt="Logo">
    </div>

    <form action="Logar.php" method="POST">

        <div id="a-1">
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
            <input type="submit" value="Logar">
        </div>
    </form>

    <div id="a-2">
        <button onclick="history.go(-1)">Voltar</button>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'email'): ?>
    <script type="text/javascript">
        alert("Email Não Encontrado");
    </script>
    <?php endif; ?>

</body>
</html>