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

    $email = $_SESSION['emailCliente'];
    $sql = "SELECT * FROM Cliente WHERE emailCliente = '$email'";
    $resultado = $conexao -> query($sql);
    $linha = $resultado->fetch_assoc();

    $sqlRestaurante = "SELECT * FROM Restaurante";
    $resultadoRestaurante = $conexao -> query($sqlRestaurante);
  ?> 
  <div class="cabecalho">
    <a id="voltar" href="../Menu Cliente/PerfilCliente.php"><?php echo $linha['nomeCliente']?></a>
    <a id="logo" href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
    <a id="logout" href="../Menu Cliente/Logout.php">Logout</a>
  </div>

  <div class="restaurantes">
    <div id="m">
    <?php while ($linhaR = mysqli_fetch_assoc($resultadoRestaurante)) { ?>
      <div class='restaurante'>
        <br>
        <a href='PaginaRestaurante?status=<?php echo $linhaR['nomeRestaurante']?>'><img class='demo' src=' ' alt='<?php echo $linhaR['nomeRestaurante']?>'></a>
        <a class='titulo' href='PaginaRestaurante?status=<?php echo $linhaR['nomeRestaurante']?>'><b><?php echo $linhaR['nomeRestaurante']?></b></a>
        <br> <br>
        <p><?php echo $linhaR['avaliacao']?></p>
        <br>
      </div>
      <br>
    <?php } ?>
    </div>
  </div>

  <div class="rodape-movel">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>