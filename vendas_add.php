<?php
    include 'includes/valida.php';
    require_once('banco.php');
    require_once('includes/funcoes.php');

    $sqlCli = "SELECT * FROM clientes";
    $resCli = mysqli_query($conexao, $sqlCli);
    

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
            
            
            <div class="direita mt-10">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>