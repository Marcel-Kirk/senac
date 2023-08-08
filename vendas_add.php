<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $sqlCli = "SELECT * FROM clientes";
    $resCli = mysqli_query($conexao, $sqlCli);

    $sqlP = "SELECT * FROM produtos";
    $resP = mysqli_query($conexao, $sqlP);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas - Adicionar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="vendas_processa.php?acao=inserir" method="post"
            class="usuarioAddForm">
            <h3 class="tituloForm">Adicionar Venda</h3>
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" required>
                <option value="">Selecione um Cliente</option>
                <?php
                    while($linhaCli = mysqli_fetch_array($resCli)){
                        echo "<option value='".$linhaCli['id']."'>".$linhaCli['nome']."</option>";
                    }
                ?>
            </select>
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario">
                <option value="<?php echo $_SESSION["usuario_id"];?>" selected>
                    <?php echo $_SESSION["logado"]; ?>
                </option>                
            </select>
            <hr>
            <div style="width: 80%; margin: auto;">
                <label for="produto">Produto:</label>
                <select>
                    <option value="">Selecione um Produto</option>
                    <?php
                    while($linhaP = mysqli_fetch_array($resP)){
                        echo "<option value='".$linhaP['id']."'>".$linhaP['nome']."</option>";
                    }
                    ?>
                </select>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade">
                <button type="button">
                    Adicionar
                </button>
            </div>
            <hr>
            <label for="observacao">Observação:</label>
            <textarea name="observacao" id="observacao" rows="5"></textarea>
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>