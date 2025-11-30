<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>
    <link rel="stylesheet" href="../../../css/style-admin.css">
    <link rel="icon" href="../../../img/Icon_restrito.png" type="image/png">
</head>

<body>
    <div class="container" style="text-align:center; margin-top:50px;">
        <main>
            <h2>Tem certeza que deseja excluir este cliente?</h2>

            <form action="exec-excluir-cliente.php" method="post" style="display:inline-block; margin:10px;">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="confirmar" value="sim" class="btn">Sim, excluir</button>
                <button type="button" name="cancelar"
                    onclick="window.location.href='listar-cliente.php?retorno=Exclusão%20cancelada!'">
                    Cancelar
                </button>

            </form>
        </main>
    </div>
</body>

</html>