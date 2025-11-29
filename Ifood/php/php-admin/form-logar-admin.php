<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Login - Área Restrita</title>
  <link rel="stylesheet" href="../../css/style-admin.css">
</head>

<body>

  <div class="container">

    <div class="card">
      <h1 class="h1 text-center" style="text-align: center">Acesso à Área Restrita</h1>
      <p class="lead text-center" style="text-align: center">Informe seu usuário e senha para continuar.</p>
      <hr style="margin: 16px 0; border: none; border-top: 1px dashed rgba(0,0,0,0.1);">

      <form action="logar-admin.php" method="post" class="form" style="width: 400px">

        <div class="form-group">
          <label for="use">Usuário</label>
          <input type="text" id="use" name="nome" placeholder="Digite seu usuário" required>
        </div>

        <div class="form-group">
          <label for="pas">Senha</label>
          <input type="password" id="pas" name="senha" placeholder="Digite sua senha" required>
        </div>

        <div class="form-group text-center mt-6">
          <input type="submit" name="sub" value="Entrar" class="btn">
          <a class="voltar" href="../../html/menu-principal.html">Voltar</a>
        </div>
      </form>

      <?php
      if (isset($_GET['retorno']) && !empty($_GET['retorno'])) {
        echo '<div class="mensagem-erro">' . htmlspecialchars($_GET['retorno']) . '</div>';
      }
      ?>

    </div>

    <footer class="footer text-center">
      <p> Sistema de Cadastro de Produtos 2025&copy;</p>
    </footer>

  </div>

</body>

</html>