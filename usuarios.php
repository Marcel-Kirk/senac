<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $sql = "SELECT * FROM usuarios";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <?php include 'includes/css.php'; ?>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
        include 'includes/header.php';
    ?>
    <main>
        <div class="direita mt-10 mr-10">
            <a href="usuarios_add.php" class="btnAdd">Adicionar</a>
        </div>
        <table class="tbUsuarios" rules="all">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Login</th>
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
                            <?php echo $linha['login']; ?>
                        </td>
                        <td>
                            <a href="usuarios_edit.php?id=<?php echo $id;?>" class="btnEditar mr-10">
                                Editar
                            </a>
                            <button type="button" class="btnExcluir" onclick="confirma('usuarios_processa.php?acao=excluir&id=<?php echo $id;?>')">
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