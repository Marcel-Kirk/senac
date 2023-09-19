<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');
    $sql = "SELECT * FROM produtos";
    $res = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <main>
        <div class="text-end pe-2">
            <span style="font-size: 12px;">
                <?php echo date('d/m/Y h:i:s'); ?>
            </span>
        </div>    
        <div class="mb-3 text-center">
            <span class="fw-bold" style="font-size: 20px;">
                Relatório de Produtos
            </span>
        </div>        
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
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
                            <?php echo formataValor($linha['preco']); ?>
                        </td>
                        <td>
                            <?php echo $linha['descricao']; ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>