<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="logo">
        <img src="../Logo.png" alt="Logo">
    </div>
    <form class="form" action="Cadastrar.php" method="POST">

        <div id="a-1">
            <label>Nome:</label>
            <input type="text" name="entregador" required><br><br>
        </div>
        <div id="a-2">
            <label>CPF:</label>
            <input type="text" name="cpf" required><br><br>
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
            <label>Veículo:</label>
            <input type="radio" name="veiculo" value="bicicleta" required>
            <label>Bicicleta</label>
            <input type="radio" name="veiculo" value="moto" required>
            <label>Moto</label>
            <input type="radio" name="veiculo" value="carro" required>
            <label>Carro</label>
        </div>
        <div id="a-2">
            <input type="submit" value="Cadastrar">
        </div>
        <div class="botao">
            <a href="../Menu Entregador/MenuEntregador.html">Voltar</a>
        </div>
    </form>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
    <script type="text/javascript">
        alert("Entregador cadastrado com sucesso!");
        window.location.href="MenuEntregador.html";
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