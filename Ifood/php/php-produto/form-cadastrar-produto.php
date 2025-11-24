<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/form.style.css">
</head>

<body>

    <div class="cabecalho">
        <a id="voltar" href="../php-restaurante/sessao-restaurante.php">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form class="form" action="cadastrar-produto.php" method="POST">
            <label>Nome do Produto:</label>
            <input type="text" name="produto" required>

            <label>Preço do Produto:</label>
            <input type="number" name="preco" min="0" step="0.01" placeholder="0.00" required>

            <label>Descrição do Produto:</label>
            <textarea name="descricao" rows="5" col="30" required> </textarea>

            <label>Categoria do Produto:</label>
            <input type="text" name="categoria" required>

            <label>Em Estoque?:</label>

            <div class="escolha">
                <input type="radio" name="estoque" value="1" required>
                <label>Sim</label>

                <input type="radio" name="estoque" value="0" required>
                <label>Não</label>
            </div>

            <p id="erro"></p>

            <input class="botao" type="submit" value="Cadastrar Produto">

            <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
                <script type="text/javascript">
                    alert("Produto cadastrado com sucesso!");
                    window.location.href = "../php-restaurante/sessao-restaurante.php";
                </script>
            <?php endif; ?>
        </form>
    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>