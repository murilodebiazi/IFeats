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
        <a id="voltar" href="../../html/menu-restaurante.html">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form class="form" action="cadastrar-restaurante.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="restaurante" placeholder="Morte Lenta" required>

            <label>CNPJ:</label>
            <input type="text" name="cnpj" placeholder="00.000.000/0000-00" pattern="[0-9]{2}\.[0-9]{3}\.[0-9]{3}/[0-9]{4}-[0-9]{2}" maxlength="18" minlength="18" title="Digite no formato: 00.000.000/0000-00" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="mortelenta@email.com" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" placeholder="Rua Padre Felipe, 821 - Centro, Esteio - RS." required>

            <label>Telefone:</label>
            <input type="tel" name="telefone" minlength="13" maxlength="13" placeholder="99 99999-9999" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" title="Digite no formato: 99 99999-9999" required>

            <label>Categoria:</label>
            <input type="text" name="categoria" placeholder="Fast Food" required>

            <label>Descrição:</label>
            <textarea name="descricao" rows="5" col="30" placeholder="descrição do restaurante" required></textarea>

            <label>Senha:</label>
            <input type="password" name="senha" minlength="6" placeholder="mortelenta123" required>

            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar" minlength="6" placeholder="mortelenta123" required>

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