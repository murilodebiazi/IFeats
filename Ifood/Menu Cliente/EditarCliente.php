<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="logo">
        <img src="../Logo.png" alt="Logo">
    </div>

    <form class="form" action="Editar.php" method="POST">
        <div id="a-1">
            <label>Email Atual:</label>
            <input type="email" name="emailA" required><br><br>
        </div>
        <div id="a-2">
            <label>Email Novo:</label>
            <input type="email" name="emailN" required><br><br>
        </div>
        <div id="a-2">
            <label>Senha Atual:</label>
            <input type="password" name="senhaA" required><br><br>
        </div>
        <div id="a-2">
            <label>Senha Nova:</label>
            <input type="password" name="senhaN" required><br><br>
        </div>
        <div id="a-2">
            <input type="submit">
        </div>
        <div class="botao">
            <a href="../Menu Cliente/MenuCliente.html">Voltar</a>
        </div>
    </form>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
        <script type="text/javascript">
            alert("Email e senha atualizados!");
            window.location.href="MenuCliente.html";
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'erro'): ?>
        <script type="text/javascript">
            alert("Email e Senha inseridos são iguais aos antigos!");
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'emailsenha'): ?>
    <script type="text/javascript">
        alert("Verifique se email ou senha estão corretos!");
    </script>
<?php endif; ?>

</body>