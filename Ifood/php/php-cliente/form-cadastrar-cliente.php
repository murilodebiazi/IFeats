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
    <form class="form" action="cadastrar-cliente.php" method="POST">
      <label>Nome:</label>
      <input type="text" name="cliente" placeholder="João Barros" required>

      <label>CPF:</label>
      <input type="text" name="cpf" minlength="14" maxlength="14" placeholder="999.999.999-99" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" title="Digite no formato: 000.000.000-00" required>

      <label>Telefone:</label>
      <input type="tel" name="telefone" minlength="13" maxlength="13" placeholder="99 99999-9999" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" title="Digite no formato: 99 99999-9999" required>

      <label>Email:</label>
      <input type="text" name="email" placeholder="joaobarros@email.com" required>

      <label>Endereço:</label>
      <input type="text" name="endereco" placeholder="Avenida Copacabana, 100, COHAB, Sapucaia do Sul - RS" required>

      <label>Senha:</label>
      <input type="password" name="senha" minlength="6" placeholder="joaobarros123" required>

      <label>Confirmar Senha:</label>
      <input type="password" name="confirmar" minlength="6" placeholder="joaobarros123" required>

      <p id="erro"> </p>

      <input class="botao" type="submit" value="Cadastrar">

      <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
        <script type="text/javascript">
          alert("Cliente cadastrado com sucesso!");
          window.location.href = "../../html/menu-cliente.html";
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