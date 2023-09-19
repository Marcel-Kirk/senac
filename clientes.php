<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    $sql = "SELECT clientes.id, clientes.nome, enderecos.cidade ".
        "FROM clientes INNER JOIN enderecos ON clientes.endereco_id ".
        "= enderecos.id;";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <?php include 'includes/css.php'; ?>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
        include 'includes/header.php';
    ?>
    <main>
        <div class="direita mt-10 mr-10">
            <a href="clientes_add.php" class="btn btn-sm btn-primary">Adicionar</a>
        </div>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linha = mysqli_fetch_array($res)){
                        $id = $linha['id'];
                ?>
                    <tr>
                        <td><?php echo $linha['id']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['cidade']; ?></td>
                        <td>
                            <a href="clientes_edit.php?id=<?php echo $id;?>" class="btn btn-sm btn-warning me-1">
                                Editar
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirma('clientes_processa.php?acao=excluir&id=<?php echo $id;?>')">
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