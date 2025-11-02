<?php
    error_reporting(0);
    session_start();
    if ($_SESSION['emailCliente'] != null) {
	    header("location: TelaCliente.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Ifood</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="cabecalho">
    <a id="voltar" href="../Menu Cliente/MenuCliente.html">Voltar</a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
  </div>

  <div class="corpo">
    <form class="form" action="Login.php" method="POST">
      <label>Email:</label>
      <input type="text" name="email" required> 

      <label>Senha:</label>
      <input type="password" name="senha" required> 

      <label>Confirmar Senha:</label>
      <input type="password" name="confirmar" required> 

      <a id="link-cadastro" href="../Menu Cliente/CadastroCliente.php">Não Possui uma Conta?</a>

      <p id="erro"></p>

      <input class="botao" type="submit" name="LogIn" value="Login">

      <?php if (isset($_GET['status']) && $_GET['status'] === 'senha'): ?>
      <script type="text/javascript">
        document.getElementById("erro").textContent = "Senha diferente";
      </script>
      <?php endif; ?>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'nao'): ?>
      <script type="text/javascript">
        document.getElementById("erro").textContent = "Verifique Email e/ou Senha";
      </script>
      <?php endif; ?>
    </form>
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>