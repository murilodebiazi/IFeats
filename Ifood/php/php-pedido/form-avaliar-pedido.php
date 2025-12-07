<?php
session_start();
include("../conectar.php");
require_once('../php-cliente/verificar-sessao-cliente.php');
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
    <?php
    $idPedido = $_POST['idPedido'];
    $sqlInfoPedido = "SELECT * FROM infoPedido WHERE idPedido = '$idPedido'";
    $resultadoInfoPedido = $conexao->query($sqlInfoPedido);
    $infoPedido = mysqli_fetch_assoc($resultadoInfoPedido);
    ?>

    <div class="cabecalho">
        <a id="voltar" href="../php-cliente/historico-pedidos-cliente.php">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
    </div>

    <div class="corpo">
        <form action="avaliar-pedido.php" method="post" class="form">
            <label>Nota para o Restaurante:</label>
            <select name="notaR">
                <option value="5">Excelente (5)</option>
                <option value="4">Ótimo (4)</option>
                <option value="3">Médio (3)</option>
                <option value="2">Ruim (2)</option>
                <option value="1">Terrível (1)</option>
            </select>
            <br>
            <label>Comentário para Restaurante:</label>
            <textarea name="descR" rows="5" col="30" placeholder="pode deixar em branco se quiser"></textarea>
            <br>
            <label>Nota para o Entregador:</label>
            <select name="notaE">
                <option value="5">Excelente (5)</option>
                <option value="4">Ótimo (4)</option>
                <option value="3">Médio (3)</option>
                <option value="2">Ruim (2)</option>
                <option value="1">Terrível (1)</option>
            </select>
            <br>
            <label>Comentário para Entregador:</label>
            <textarea name="descE" rows="5" col="30" placeholder="pode deixar em branco se quiser"></textarea>
            <br>
            <input type="hidden" name="idRestaurante" value="<?php echo $infoPedido['idRestaurante'] ?>">
            <input type="hidden" name="idEntregador" value="<?php echo $infoPedido['idEntregador'] ?>">
            <input type="hidden" name="idPedido" value="<?php echo $infoPedido['idPedido'] ?>">

            <input class="botao" type="submit" value="Avaliar Pedido" name="avaliar">
        </form>
    </div>

    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
</body>

</html>