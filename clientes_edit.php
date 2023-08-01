<?php
    include 'includes/valida.php';
    require_once('banco.php');
    $id = $_GET['id'];

    $sql    = "SELECT clientes.*, logradouro, numero, cep, cidade FROM clientes INNER JOIN enderecos ON clientes.endereco_id = enderecos.id WHERE clientes.id = $id";
    $rs     = mysqli_query($conexao, $sql);
    $dados  = mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Editar</title>
    <?php include 'includes/css.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <form action="clientes_processa.php?acao=editar" method="post"
            class="usuarioAddForm">
            <h3 class="tituloForm">Editar o Cliente</h3>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome"
                value="<?php echo $dados["nome"]; ?>" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf"
                value="<?php echo $dados['cpf']; ?>" required>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro"
                value="<?php echo $dados['logradouro']; ?>" required>
            
            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero"
                value="<?php echo $dados['numero']; ?>" required>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep"
                value="<?php echo $dados['cep']; ?>" required>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade"
                value="<?php echo $dados['cidade']; ?>" required>
            
            <div class="direita mt-10">
                <input type="hidden" name="id" id="id"
                    value="<?php echo $dados['id']; ?>">
                <button type="submit">Editar</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>