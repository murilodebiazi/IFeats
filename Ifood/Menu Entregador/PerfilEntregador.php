<?php
    session_start();
    include("Login.php");
    require_once('VerificarSessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Ifood</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
    $email = $_SESSION['emailEntregador'];
    $sql = "SELECT * FROM Entregador WHERE emailEntregador = '$email'";
    $resultado = $conexao -> query($sql);
    $linha = $resultado->fetch_assoc();
  ?> 

  <div class="cabecalho">
    <a id="voltar" href="../Menu Entregador/PerfilEntregador.php"><?php echo $linha['nomeEntregador']?></a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
    <a id="logout" href="../Menu Entregador/Logout.php">Logout</a>
  </div>

  <div class="corpo">
    <form class="perfil" action="Editar.php" method="POST">
      <h1> Perfil </h1>
  
      <label>Nome:</label>
      <input type="text" name="entregador" value='<?php echo $linha['nomeEntregador']?>'required>

      <label>CPF:</label>
      <input type="text" name="cpf" value='<?php echo $linha['CPFEntregador']?>' required>

      <label>Email:</label>
      <input type="text" name="email" value='<?php echo $linha['emailEntregador']?>' required>

      <label>Senha:</label>
      <input type="password" name="senha" value='<?php echo $linha['senhaEntregador']?>' required>

      <label>Veículo:</label>

      <div class="escolha">
        <input type="radio" name="veiculo" value="bicicleta" required>
        <label>Bicicleta</label>
        <input type="radio" name="veiculo" value="moto" required>
        <label>Moto</label>
        <input type="radio" name="veiculo" value="carro" required>
        <label>Carro</label>
      </div>

      <input class="botao" type="submit" value="Editar">

      <a class="botao-excluir" href="Excluir.php">Excluir Perfil</a>
      
    </form>
</div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>