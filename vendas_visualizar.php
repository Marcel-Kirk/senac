<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $id = (int)$_GET['id'];

    if (!isset($id) || $id == 0){
        echo "Erro ao receber Id";
        exit;
    }

    $sqlVenda = "SELECT vendas.*, usuarios.nome AS usuario,".
    " clientes.nome AS cliente FROM vendas ".
        " LEFT JOIN clientes ON clientes.id = vendas.cliente_id".
        " LEFT JOIN usuarios ON usuarios.id = vendas.usuario_id".
        " WHERE vendas.id = $id";
    $resVenda = mysqli_query($conexao, $sqlVenda);
    $venda = mysqli_fetch_array($resVenda);
    $vendaId = $venda["id"];

    $sqlItens = "SELECT itens_venda.*, produtos.nome as produto, ".
        " produtos.imagem as imagem ".
        " FROM itens_venda ".
        " LEFT JOIN produtos ON produtos.id = itens_venda.produto_id ".
        " WHERE venda_id = $vendaId";
    $resItens = mysqli_query($conexao, $sqlItens);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas - Visualizar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main style="padding: 15px;">
        <h3 class="tituloForm">Visualizar Venda</h3>
        <div>
            <strong>Cliente:</strong>
            <?php echo $venda["cliente_id"]." - ".$venda["cliente"]?>
        </div>
        <div>
            <strong>Usuário:</strong>
            <?php echo $venda["usuario_id"]." - ".$venda["usuario"]?>
        </div>
        <hr>
        <div><strong>Produtos:</strong></div>
        <table class="table table-hover table-sm" style="width: 94%; margin:auto;">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Un.</th>
                </tr>
            </thead>
            <tbody id="lista">
                <?php
                    while($linha = mysqli_fetch_array($resItens)) {
                        echo "<tr>";
                        if (isset($linha['imagem']) && $linha['imagem'] != null) {
                            echo "<td><img src='imagens/".$linha['imagem']."' style='width:80px'></td>";
                        } else {
                            echo "<td>&nbsp;</td>";
                        }
                        echo "<td>" . $linha['produto'] . "</td>";
                        echo "<td>" . $linha['quantidade'] . "</td>";
                        echo "<td>" . $linha['valor_item'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <hr>
        <div>
            <strong>Observação:</strong>
            <?php echo $venda['observacao'] ?>
        </div>
        <div style="text-align: right;">
            <a href="vendas.php" class="btn btn-secondary">
                voltar
            </a>
        </div>
        <div>&nbsp;</div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>