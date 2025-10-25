<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Ifood</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="../Icon.png" type="image/png">
</head>

<body>

  <div class="cabecalho">
    <a id="voltar" href="../Menu Entregador/MenuEntregador.html">Voltar</a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
  </div>

  <div class="corpo">
    <form class="form" action="Cadastrar.php" method="POST">
      <label>Nome:</label>
      <input type="text" name="entregador" required>

      <label>CPF:</label>
      <input type="text" name="cpf" required>

      <label>Email:</label>
      <input type="text" name="email" required>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <label>Confirmar Senha:</label>
      <input type="password" name="confirmar" required>

      <label>Veículo:</label>

      <div class="escolha">
        <input type="radio" name="veiculo" value="bicicleta" required>
        <label>Bicicleta</label>

        <input type="radio" name="veiculo" value="moto" required>
        <label>Moto</label>

        <input type="radio" name="veiculo" value="carro" required>
        <label>Carro</label>
      </div>

      <a id="link-cadastro" href="../Menu Entregador/LogarEntregador.php">Já Possui uma Conta?</a>

      <p id="erro"> </p>

      <input class="botao" type="submit" value="Cadastrar">

      <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
      <script type="text/javascript">
        alert("Entregador cadastrado com sucesso!");
        window.location.href = "MenuEntregador.html";
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