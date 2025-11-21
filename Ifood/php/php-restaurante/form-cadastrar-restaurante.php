<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <div class="cabecalho">
        <a id="voltar" href="../../html/menu-restaurante.html">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form class="form" action="cadastrar-restaurante.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="restaurante" required>

            <label>CNPJ:</label>
            <input type="text" name="cnpj" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" required>

            <label>Categoria:</label>
            <input type="text" name="categoria" required>

            <label>Descrição:</label>
            <textarea name="descricao" rows="5" col="30" required> </textarea>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar" required>

            <p id="erro"></p>

            <input class="botao" type="submit" value="Cadastrar">

            <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
                <script type="text/javascript">
                    alert("Restaurante cadastrado com sucesso!");
                    window.location.href = "../../html/menu-restaurante.html";
                </script>
            <?php endif; ?>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'erro'): ?>
                <script type="text/javascript">
                    document.getElementById("erro").textContent = "Senha diferente";
                </script>
            <?php endif; ?>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'email'): ?>
                <script type="text/javascript">
                    document.getElementById("erro").textContent = "Email já existe";
                </script>
            <?php endif; ?>
        </form>
    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>