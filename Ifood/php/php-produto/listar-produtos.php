<?php
session_start();
include("../conectar.php");
require_once('../php-restaurante/verificar-sessao-restaurante.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../img/Icon.png" type="image/png">
    <title>Ifood</title>
    <link rel="stylesheet" href="../../css/vercardapio.style.css">
</head>

<body>
    <?php
    $email = $_SESSION['emailRestaurante'];
    $sql = "SELECT * FROM Restaurante WHERE emailRestaurante = '$email'";
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch_assoc();
    $idRestaurante = $linha['idRestaurante'];
    ?>
    <div class="cabecalho">
        <a id="voltar" href="../php-restaurante/sessao-restaurante.php">Voltar</a>
        <a id="logo" href="../../html/menu-principal.html"><img src="../../img/Logo.png" alt="Logo"></a>
        <a id="logout" href="../php-restaurante/deslogar-restaurante.php">Logout</a>
    </div>
    <div class="corpo">
        <h1>Produtos:</h1>
        <form method="POST" action="listar-produtos.php">
            <select name="filtro" id="filtro">
                <option value="" disabled selected>--Filtrar Produtos--</option>
                <option value="maiorPreco">Maior Preço</option>
                <option value="menorPreco">Menor Preço</option>
                <option value="alfabetica">Alfabética</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
        <br>
        <div class="produtos">
            <?php
            $sql = "SELECT * FROM Produto WHERE idRestaurante = '$idRestaurante'";
            if (isset($_POST['filtro'])) {
                $filtro = $_POST['filtro'];
                switch ($filtro) {
                    case "maiorPreco":
                        $sql = "SELECT * FROM produtosMaiorPreco WHERE idRestaurante = '$idRestaurante';";
                        break;
                    case "menorPreco":
                        $sql = "SELECT * FROM produtosMenorPreco WHERE idRestaurante = '$idRestaurante';";
                        break;
                    default:
                        $sql = "SELECT * FROM produtosAlfabetico WHERE idRestaurante = '$idRestaurante';";
                        break;
                }
            } 
            $produtosListados = $conexao->query($sql);
            while ($linhaP = mysqli_fetch_assoc($produtosListados)) { ?>
                <div class="produto">
                    <p> <?php echo $linhaP['nomeProduto']; ?> </p>
                    <p> R$ <?php echo $linhaP['preco']; ?> </p>
                    <p> <?php echo $linhaP['categoria']; ?> </p>
                    <a href="form-editar-produto.php?id=<?php echo $linhaP['idProduto'] ?>">Editar</a>
                    <a href="excluir-produto.php?id=<?php echo $linhaP['idProduto'] ?>">Excluir</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="rodape">
        <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
        <script type="text/javascript">
            alert("Produto editado com sucesso!");
        </script>
    <?php endif; ?>
</body>

</html>