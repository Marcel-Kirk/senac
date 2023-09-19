<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    $sql = "SELECT * FROM vendas WHERE status != 'C' ";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <?php include 'includes/css.php'; ?>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
        include 'includes/header.php';
    ?>
    <main>
        <div class="direita mt-10 mr-10">
            <a href="vendas_add.php" class="btn btn-sm btn-primary">Adicionar</a>
        </div>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linha = mysqli_fetch_array($res)){
                        $id = $linha['id'];
                ?>
                    <tr>
                        <td>
                            <?php echo $linha['id']; ?>
                        </td>
                        <td>
                            <?php echo reData($linha['datahora']); ?>
                        </td>
                        <td>
                            <?php echo $linha['valor']; ?>
                        </td>
                        <td>
                            <a href="vendas_visualizar.php?id=<?php echo $id;?>" class="btn btn-sm btn-success me-1">
                                Visualizar
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirma('vendas_processa.php?acao=cancelar&id=<?php echo $id;?>')">
                                Cancelar
                            </button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>