<?php
session_start();
include("logar-Entregador.php");
require_once('verificar-sessao-Entregador.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <?php
    $email = $_SESSION['emailEntregador'];
    $sql = "SELECT * FROM Entregador WHERE emailEntregador = '$email'";
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch_assoc();
    $idEntregador = $linha['idEntregador'];

    $sqlPedido = "SELECT * FROM infoPedido WHERE status='Entregue' AND idEntregador='$idEntregador'";
    $resultadoPedido = $conexao->query($sqlPedido);

    ?>
    <div class="cabecalho">
        <a id="voltar" href="perfil-entregador.php"><?php echo $linha['nomeEntregador'] ?></a>
        <a id="verpedidos" href="sessao-entregador.php">Pedidos</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
        <a id="logout" href="deslogar-entregador.php">Logout</a>
    </div>
    <div class="corpo">  
        <h1>Histórico de Pedidos:</h1>
        <div class="cardapio">
            <?php while ($infoPedido= mysqli_fetch_assoc($resultadoPedido)) {
                $idPedido = $infoPedido['idPedido'];
                $sqlIP = "SELECT * FROM infoIP WHERE idPedido = '$idPedido'";
                $resultadoIP = $conexao->query($sqlIP);
            ?>
                <div class="pedido">
                    <p>Status: <?php echo $infoPedido['status']?></p>
                    <p>Horario Pedido: <?php echo $infoPedido['horarioPedido']?></p>
                    <p>Endereço Cliente: <?php echo $infoPedido['enderecoCliente']?></p>
                    <p>Endereço Restaurante: <?php echo $infoPedido['enderecoRestaurante']?></p>
                    
                    <?php while ($infoIP = mysqli_fetch_assoc($resultadoIP)) { ?>
                        <p><?php echo $infoIP['quantidade'] ?>x <?php echo $infoIP['nomeProduto'] ?> R$<?php echo $infoIP['precoPorProduto'] ?></p>
                    <?php } ?>
                    <a href="../php-pedido/mudar-status-pedido.php?id=<?php echo$idPedido?>&idE=<?php echo $idEntregador?>&acao=aceito">Aceitar Pedido<a>
                    <br>
                </div>
            <?php } ?>
        </div>

    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>