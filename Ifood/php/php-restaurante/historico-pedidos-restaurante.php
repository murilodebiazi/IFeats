<?php
session_start();
include "../conectar.php";
require_once "verificar-sessao-restaurante.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/historicopedido.style.css">
</head>

<body>
    <?php
    $email = $_SESSION['emailRestaurante'];
    $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch_assoc();
    $nomeRestaurante = $linha['nomeRestaurante'];

    $sqlPedido = "SELECT * FROM infoPedido WHERE nomeRestaurante = '$nomeRestaurante' AND status='Entregue'";
    $resultadoPedido = $conexao->query($sqlPedido);

    ?>
    <div class="cabecalho">
        <a id="voltar" href="perfil-restaurante.php">
            <?php echo $linha['nomeRestaurante'] ?>
        </a>
        <a id="verpedidos" href="menu-pedidos-restaurante.php">Pedidos</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
        <a id="verrestaurantes" href="sessao-restaurante.php">Restaurantes</a>
        <a id="logout" href="deslogar-restaurante.php">Logout</a>
    </div>
    <div class="corpo">
        <h1>Histórico de Pedidos:</h1>
        <div class="cardapio">
            <?php while ($infoPedido = mysqli_fetch_assoc($resultadoPedido)) {
                $idPedido = $infoPedido['idPedido'];
                $sqlIP = "SELECT * FROM infoIP WHERE idPedido = '$idPedido'";
                $resultadoIP = $conexao->query($sqlIP);
                ?>
                <div class="pedido">
                    <p><b>N° do pedido:</b>
                        <?php echo $infoPedido['idPedido'] ?>
                    </p>
                    <p><b>Status:</b>
                        <?php echo $infoPedido['status'] ?>
                    </p>
                    <p><b>Horario Pedido:</b>
                        <?php echo $infoPedido['horarioPedido'] ?>
                    </p>
                    <p><b>Horario Entregue:</b>
                        <?php echo $infoPedido['horarioEntregue'] ?>
                    </p>
                    <p><b>Cliente:</b>
                        <?php echo $infoPedido['nomeCliente'] ?>
                    </p>
                    <p><b>Endereço Cliente:</b>
                        <?php echo $infoPedido['enderecoCliente'] ?>
                    </p>
                    <p><b>Preço: </b>R$
                        <?php echo $infoPedido['precoPedido'] ?>
                    </p>
                    <?php while ($infoIP = mysqli_fetch_assoc($resultadoIP)) { ?>
                        <p>
                            <?php echo $infoIP['quantidade'] ?>x
                            <?php echo $infoIP['nomeProduto'] ?> R$
                            <?php echo $infoIP['precoPorProduto'] ?>
                        </p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>