<?php
error_reporting(0);
session_start();
if ($_SESSION['emailCliente'] != null) {
  header("location: sessao-cliente.php");
}
?>

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
    <a id="voltar" href="../../html/menu-cliente.html">Voltar</a>
    <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
  </div>

  <div class="corpo">
    <form class="form" action="logar-cliente.php" method="POST">
      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <label>Confirmar Senha:</label>
      <input type="password" name="confirmar" required>

      <a id="link-cadastro" href="form-cadastrar-cliente.php">Não Possui uma Conta?</a>

      <p id="erro"></p>

      <input class="botao" type="submit" name="LogIn" value="Login">

      <?php if (isset($_GET['status']) && $_GET['status'] === 'senha'): ?>
        <script type="text/javascript">
          document.getElementById("erro").textContent = "Senha diferente";
        </script>
      <?php endif; ?>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'nao'): ?>
        <script type="text/javascript">
          document.getElementById("erro").textContent = "Verifique Email e Senha";
        </script>
      <?php endif; ?>
    </form>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>