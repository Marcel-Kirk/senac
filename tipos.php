<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    $sql = "SELECT * FROM tipos_produto";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Produto</title>
    <?php include 'includes/css.php'; ?>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
        include 'includes/header.php';
    ?>
    <main>
        <div class="direita mt-10 mr-10">
            <a href="tipos_add.php" class="btnAdd">Adicionar</a>
        </div>
        <table class="tbUsuarios" rules="all">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data</th>
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
                            <?php echo $linha['nome']; ?>
                        </td>
                        <td>
                            <?php echo reData($linha['created_at']); ?>
                        </td>
                        <td>
                            <a href="tipos_edit.php?id=<?php echo $id;?>" class="btnEditar mr-10">
                                Editar
                            </a>
                            <button type="button" class="btnExcluir" onclick="confirma('tipos_processa.php?acao=excluir&id=<?php echo $id;?>')">
                                Excluir
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