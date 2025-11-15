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
    <form class="form" action="Cadastrar.php" method="POST">
      <label>Nome:</label>
      <input type="text" name="cliente" size="10" required> 

      <label>CPF:</label>
      <input type="text" name="cpf" required> 

      <label>Telefone:</label>
      <input type="number" name="telefone" required> 

      <label>Email:</label>
      <input type="text" name="email" required>

      <label>Senha:</label>
      <input type="password" name="senha" required> 

      <label>Confirmar Senha:</label>
      <input type="password" name="confirmar" required> 

      <p id="erro"> </p>

      <a id="link-cadastro" href="../Menu Cliente/LogarCliente.php">Já Possui uma Conta?</a>

      <input class="botao" type="submit" value="Cadastrar">
      
      <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
      <script type="text/javascript">
        alert("Cliente cadastrado com sucesso!");
        window.location.href="MenuCliente.html";
      </script>
      <?php endif; ?>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'senha'): ?>
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